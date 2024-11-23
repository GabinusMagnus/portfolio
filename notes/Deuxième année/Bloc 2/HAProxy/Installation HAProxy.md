# Installation d'HAProxy

> High-Availability Proxy. Un service répartiteur de charge.

## Installation

### Dans l'infrastructure

HAProxy s'installe sur Debian. En admettant que les serveurs web soient dans une DMZ, la machine exécutant HAProxy servira de passerelle à la DMZ.

La machine HAProxy aura donc deux interfaces réseau : une dans le LAN, une dans la DMZ.

### Paquet

`apt install haproxy`

## Configuration

Le fichier de configuration se situe dans `/etc/haproxy/haproxy.cfg`. Il est constitué de plusieurs sections :

- global : paramètres globaux préconfigurés.

- defaults : paramètres appliqués aux backends et frontends.

Selon le raisonnement derrière HAProxy, *frontend* correspond au réseau LAN et *backend* au réseau DMZ.

Ajouter à la fin du fichier :

```bash
listen httpProxy
    bind 172.16.0.13:80
    balance roundrobin
    option httplose # ferme la connexion entre chaque requête. Les cookies sont donc perdus.
    option httpchk HEAD / HTTP/1.0
    server srv-web1 192.168.0.1:80 check
    server srv-web2 192.168.0.2:80 check
```

Le paquet HAProxy fournit aussi une commande haproxy, à laquelle on peut ajouter les options -c et -f pour vérifier la configuration (-c) du fichier (-f).

`haproxy -c -f /etc/haproxy/haproxy.cfg`

## Test

Se rendre à l'adresse du service HAProxy. Ayant choisi la méthode Round-Robin, chaque nœud répondra à tour de rôle.

## Meilleure configuration

La configuration s'écrit idéalement en sections.

```bash
global
        log /dev/log    local0
        log /dev/log    local1 notice
        chroot /var/lib/haproxy
        stats socket /run/haproxy/admin.sock mode 660 level admin
        stats timeout 30s
        user haproxy
        group haproxy
        daemon

        # Default SSL material locations
        ca-base /etc/ssl/certs
        crt-base /etc/ssl/private

        # See: https://ssl-config.mozilla.org/#server=haproxy&server-version=2.0.3&co>
        ssl-default-bind-ciphers ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES128-GCM-S>
        ssl-default-bind-ciphersuites TLS_AES_128_GCM_SHA256:TLS_AES_256_GCM_SHA384:T>
        ssl-default-bind-options ssl-min-ver TLSv1.2 no-tls-tickets

defaults
        log     global
        mode    http
        option  httplog
        option  dontlognull
        timeout connect 5000
        timeout client  50000
        timeout server  50000
        errorfile 400 /etc/haproxy/errors/400.http
        errorfile 403 /etc/haproxy/errors/403.http
        errorfile 408 /etc/haproxy/errors/408.http
        errorfile 500 /etc/haproxy/errors/500.http
        errorfile 502 /etc/haproxy/errors/502.http
        errorfile 503 /etc/haproxy/errors/503.http
        errorfile 504 /etc/haproxy/errors/504.http

frontend proxypublic
        bind 172.16.0.13:80
        http-request redirect scheme https unless { ssl_fc }
        default_backend fermeweb

frontend https-in
        bind 172.16.0.13:443 ssl crt /etc/haproxy/cert/sodecaf.pem
        default_backend fermeweb

backend fermeweb
        balance roundrobin
        option httpclose
        option httpchk HEAD / HTTP/1.0
        server srv-web1 192.168.0.1:80 check weight 100 check
        server srv-web2 192.168.0.2:80 check weight 50 check
        stats uri /statsHaproxy
        stats auth root:Btssio2017
        stats refresh 30s
```

## HTTPS

Le problème avec HTTPS, est le déchiffrement du traffic.

Le traffic sera déchiffré par la machine HAProxy. Ainsi, les paquets ne seront déchiffrés qu'entre le répartiteur de charge et les serveurs web.

*Générer la clé privée :*

`openssl genrsa -out privatKey.pm 4096`

*Générer le certificat :*

`openssl req -new -x509 -days 365 -key privateKey.pem -out cert.pm`

La configuration d'HAProxy n'acceptera qu'un seul fichier, correspondant au certificat **et** à la clé.

`cat cert.pem privateKey.pem > sodecaf.pem`

Puis se référer au fichier de configuration plus haut.
