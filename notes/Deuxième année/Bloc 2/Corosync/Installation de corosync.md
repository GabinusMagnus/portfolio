# Corosync

S'installe sur Linux.

`apt install corosync pacemaker crmsh`

Le paquet corosync s'installe sur chaque machine du cluster. Pour lier ces machines, générer une clé qui chiffrera les échanges entre elles.

`corosync-keygen`

La clé sera stockée dans `/etc/corosync/authkey`. La clé doit être la même sur les deux machines. Dans le cas d'une machine virtuelle, on peut la cloner (à vrai dire, la configuration devant être identique sur les deux machines, on pourra cloner la machine quand on aura fini de configurer corosync.)

Désactiver Quorum :

`crm configure property no-quorum-policy="ignore"`

Ensuite, sauvegarder le fichier de configuration pré-existant `/etc/corosync/corosync.conf` et l'éditer.

```bash
totem {
version: 2
cluster_name: cluster_web
crypto_cipher: aes256
crypto_hash: sha1
clear_node_high_bit:yes
}
logging {
fileline: off
to_logfile: yes
logfile: /var/log/corosync/corosync.log
to_syslog: no
debug: off
timestamp: on
logger_subsys {
subsys: QUORUM
debug: off
}
}
quorum {
provider: corosync_votequorum
expected_votes: 2
two_nodes: 1
}
nodelist {
node {
name: serv1
nodeid: 1
ring0_addr: 172.16.0.10
}
node {
name: serv2
nodeid: 2
ring0_addr: 172.16.0.11
}
}
service {
ver: 0
name: pacemaker
}
```

corosync comprend une commande interactive pour agir avec la configuration. Afficher la configuration :

`corosync-cfgtool -s`

Crmsh permet d'utiliser des commandes interactives de corosync dans le shell.
Pour vérifier le statut du service, on peut faire appel à systemd ou à crm.

`crm status
crm configure show`

La configuration de corosync est aussi inscrite dans un fichier xml (que `crm configure show` affiche lisiblement). On peut en vérifier la validité avec la commande : `crm_verify -L -V` qui remonte les erreurs 

`crm configure property stonith-enabled=false`

Ensuite, définir le failover : quelle ip le service occupe et sur quel est le nœud esclave.

`crm configure primitive IPFailover ocf:heartbeat:IPaddr2 params ip=172.16.0.12 cidr_netmask=24 nic=eth0 iflabel=VIP`

Après quoi, il faut configurer la ressource.

`crm configure primitive serviceWeb lsb:apache2 op monitor interval=60s op start interval=0 timeout=60s op stop interval=0 timeout=60s`

Créer une groupe comprenant les serveurs Apache :

`crm configure group servweb IPFailover serviceWeb meta migration-threshold="5"`

Maintenant que les serveurs apache des serveurs 1 et 2 sont considérés comme un groupe (comme un même service), définir le nœud maître (nœud sur lequel le service sera accessible par défaut).

`crm resource move IPFailover srv-web1`

# Base de données

Dans une relation maître-esclave, le serveur esclave doit pouvoir se connecter à la base de données du maître en tant qu'utilisateur spécifique, afin d'en copier les tables sur la sienne.

## Sur le maître

```sql
CREATE USER 'replication_user'@'%' IDENTIFIED BY 'bigs3cret';
GRANT REPLICATION SLAVE ON *.* TO 'replication_user'@'%';
```

*remarque :* La valeur de l'hôte peut être égale à l'adresse ip du serveur esclave.

On pourra ensuite restreindre le droit de réplication à la base de données concernée.
Editer le fichier /etc/mysql/mariadb.conf.d/50-server.cnf :

```bash
#bind-adress = 127.0.0.1
log_error = /var/log/mysql/error.log
server-id = 10 # valeur complètement arbitraire. Identifiant du serveur maître
log_bin = /var/log/mysql/mysql-bin.log
expire_log_days = 10
max_binlog_size = 100M
binlog_do_db = include_database_name # nom de la base à répliquer.
```

Si besoin, verrouiller les tables en lecture-seule. Dans la console msyql : `FLUSH TABLES WITH READ LOCK;`

## Sur l'esclave

Editer le fichier /etc/mysql/mariadb.conf.d/50-server.cnf :

```bash
log_error = /var/log/mysql/error.log
server-id = 104
expire_logs_days = 10
max_binlog_size = 100M
master-retry-count = 20
replicate-do-db = include_database_name
```

## Sur le maître

Dans la console mysql, `show master status;`. Cela renverra les valeurs nécessaires à la configuration de l'esclave.

- *file* : Le fichier contenant ce qu'il y a à répliquer de la base de données.

- *position* : une valeur qui augmente, chaque fois qu'une requête est exécutée.

- *binlog_do_db* : La base de données répliquée.

Sur l'esclave, `stop slave;`

Il faut maintenant indiquer à l'esclave qui est le maître.

```sql
change master to master_host='172.16.0.10',master_user='replicateur',master_password='mdp_du_replicateur',master_log_file='mysql-bin.000001',master_log_pos=3921;
```

> Important !
> 
> Une bizarrerie est que pour que les requêtes soient prises en compte lors de la réplication, elles doivent être effectuées directement "dans la base", c'est-à-dire en exécutant `use la_base;` avant la requête.

Ensuite, on peut relancer l'"esclavage". `start slave;`

Si les tables étaient verrouillées, dans la console mysql : `UNLOCK TABLES;`

## Test

Le réplicateur n'a que les droits de lecture. Donc sur le serveur maître, exécuter une requête comme UPDATE pour modifier la base de données.
Vérifier avec SELECT si la base du serveur esclave est modifiée.

> **Remarque :** Toute modification sur la table du serveur esclave sera perdue, car ce dernier répliquera la base du serveur maître.
