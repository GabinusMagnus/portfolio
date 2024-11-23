# Corosync + SQL Maître-Maître

En admettant que serveur1 soit le maître et serveur2 l'esclave.

## Sur le serveur 1 maître :

Editer /etc/mysql/mariadb.conf.d/50-server.conf, ajouter les lignes suivantes :

```bash
replicate-do-db = gsb_valide
master-retry-count = 20
log-slave-updatesag = 1
```

## Sur le serveur 2 précédemment esclave :

```bash
binlog_do_db = gsb_valide
log_bin = /var/log/mysql/mysql-bin.log
```

# Corosync

Maintenant, cloner les services apache et SQL.

> Le service SQL ne doit pas faire partie d'un groupe, sinon on ne pourra pas le cloner sans générer des conflits.

résultat de `crm configure show` :

```bash
clone cServiceMySQL serviceSQL
clone cServiceWeb serviceWeb \
    meta target-role=started
location cli-prefer-IPFailover IPFailover role=Started inf: srv-web1
property cib-bootstrap-options: \
    have-watchdog=false \
    dc-version=2.1.5-a3f44794f94 \
    cluster-infrastructure=corosync \
    cluster-name=debian \
    stonith-enabled=false \
    no-quorum-policy=ignore
```
