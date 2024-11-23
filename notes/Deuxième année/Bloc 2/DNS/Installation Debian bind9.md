# Installation d'un serveur DNS Debian 12 avec bind9

## Configuration :

/etc/hosts :

```bash
srv-dns1
```

/etc/hostname :

```bash
127.0.0.1 localhost
127.0.0.1 srv-dns1
```

/etc/network/interfaces :

```bash
address 172.16.0.3
gateway 172.16.0.254 # (gateway de la Sodecaf)
```

/etc/resolv.conf :

```bash
domain sodecaf.local
search sodecaf.local
nameserver 8.8.8.8
```

## Installation

```bash
apt install bind9
```

## Configuration

/etc/bind/named.conf.local :

```bash
zone "sodecaf.local" {
    type master;
    file "db.sodecaf.local";
};
```

/etc/bind/named.conf.options :

```bash
directory /var/cache/bind
```

Dans /var/cache/bind, créer le fichier db.sodecaf.local. Il s'agira d'un fichier de zone.

```bash
$TTL 86400
@       IN      SOA     srv-dns1.sodecaf.local. hostmaster.sodecaf.local. (

                        2024092301      ;serial
                        86400           ;refresh
                        21600           ;retry
                        3600000         ;expire
                        3600 ) ;negative caching ttl
@       IN      NS              srv-dns1.sodecaf.local.
@       IN      NS              srv-dns2.sodecaf.local.


srv-dns1        IN      A       172.16.0.3
srv-dns2        IN      A       172.16.0.4
srv-web1        IN      A       172.16.0.10
srv-web2        IN      A       172.16.0.11
srv-web         IN      A       172.16.0.12 ; Il s'agit de l'adresse à laquelle répond Corosync, car srv-web1 et srv-web2 sont en cluster

www             IN      CNAME   srv-web.sodecaf.local. ; alias
IN CNAME servftp
```

### 

### Types d'enregistrements :

| type | définition                                                         |
| ---- | ------------------------------------------------------------------ |
| SOA  | zone d'autorité                                                    |
| A    | adresse IPv4                                                       |
| AAAA | adresse IPv6                                                       |
| NS   | NameServer                                                         |
| PTR  | Pointeur : pointe une adresse IP vers un nom dans la zone inversée |

### Vérification de la configuration

Des commandes sont prévues pour vérifier les fichiers de configurations.

`named-checkconf`

Vérifier le fichier de zone : `named-checkzone`. Syntaxe : named-checkzone nom_de_la_zone fichier_zone

` sodecaf.local db.sodecaf.local`

La configuration effectuée, redémarrer le service bind9 : `systemctl restart bind9`

> Redémarrer le service bind9 sera nécessaire à chaque modification, autant pour un fichier de configuration qu'une base d'enregistrements de zone (comme db.sodecaf.local), inversée ou non.

## Test avec une requête DNS

On peut utiliser nslookup et dig. Dig est recommandé.

`dig www.sodecaf.local`

## Zone inversée

ajouter la zone inversée à /etc/bind/named.conf.local :

```bash
zone "0.16.172.in-addr.arpa" {
    type master;
    file "db.172.16.0.rev";
}
```

Créer */var/cache/bind/db.172.16.0.rev* et y renseigner l'inverse de db.sodecaf.local. Les enregistrements sont des pointeurs, qui partent pointent une ip vers un nom.

> En règle générale, le nom de la base de la zone inversée suit la syntaxe suivante : db.NetID.rev

```bash
$TTL 86400
@       IN      SOA     srv-dns1.sodecaf.local. hostmaster.sodecaf.local. (

                        2024092301      ;serial
                        86400           ;refresh
                        21600           ;retry
                        3600000         ;expire
                        3600 ) ;negative caching ttl
@       IN      NS              srv-dns1.sodecaf.local.
@       IN      NS              srv-dns2.sodecaf.local.


3        IN      PTR       srv-dns1
4        IN      PTR       srv-dns2
10       IN      PTR       srv-web1
11       IN      PTR       srv-web2
12       IN      PTR       srv-web
```

## Redondance

Sur le serveur maître, ajouter à named.conf.local, pour chaque zone concernée (entre les accolades des sections) :

`allow-transfer { 172.16.0.4; };`

Sur le serveur esclave, copier-coller le contenu de named.conf.local dans le fichier éponyme, puis l'adapter ainsi :

```bash
zone "sodecaf.local" {
    type slave;
    file "slave/db.sodecaf.local";
    masters { 172.16.0.3; };
};

zone "0.16.172.in-addr.arpa" {
    type slave;
    file "slave/db.172.16.0.rev";
    masters { 172.16.0.3; };
}
```

Créer un répertoire "slave" dans `/var/cache/bind/slave`

Redémarrer le service sur les deux serveurs.

Si la synchronisation des bases de données des zones est effective, les fichiers des bases en questions seront automatiquement récupérés par le serveur DNS secondaire, dans `/var/cache/bind/slave`

## Forwarder

Configurer le forwarder. Le forwarder est le serveur DNS auquel le serveur DNS sollicité renvoie la requête s'il ne peut y répondre.

dans /etc/bind/named.conf.options :

```bash
forwarders {
    8.8.8.8;
};
```
