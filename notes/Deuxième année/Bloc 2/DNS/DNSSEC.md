# DNSSEC

DNSSEC joint une clé d'authenticité aux réponses aux requêtes du client. Cette clé correspond à l'adresse IP que le client a demandé à résoudre. Ainsi, si un attaquant altère la résolution du nom en le faisant correspondre à une autre IP, la réponse sera refusée car elle ne comportera pas la clé d'authenticité.

Avec Wireshark, on peut inspecter les trames sur le réseau et voir que les requêtes DNS ne sont pas chiffrées ni signées.

## Mise en place de DNSSEC

### Génération des clés

Créer un répertoire /etc/bind/keys. Ce répertoire contiendra les clés. Le serveur DNS utilisera deux paires de clés : une pour la zone, une pour le chiffrement des clés (ouf).

Génération des clés *de la zone (ZSK)* :

`dnssec-keygen -a rsasha1 -b 1024 -n zone sodecaf.local`

Génération des clés *pour chiffrer les clés (KSK)* :

`dnssesc-keygen -a rsasha1 -b 1024 -f KSK -n zone sodecaf.local`

**Noter quelle paire de clés correspond à quoi !**

Ajouter au le fichier de zone, en l'occurrence `/var/cache/bind/db.sodecaf.local` :

```bash
; KSK
$include "/etc/keys/KcleKSK.key";
; ZSK
$include "/etc/keys/KcleZSK.key";
```

### Signature du fichier de zone

La signature se fait par la commande suivante :

```bash
dnssec-signzone -o sodecaf.local -t -k /etc/bind/keys/Ksodecaf.KSK.key /var/cache/bind/db.sodecaf.local /etc/bind/keys/Ksodecaf.ZSK.key
```

> La commande dnssec-signzone se tape selon la syntaxe suivante :
> 
> dnssec-signzone -o zone -t -k clé_KSK fichier_zone cle_ZSK

A l'issue de la commande, est généré un fichier du nom du fichier de zone, au nom duquel est ajouté ".signed". En l'occurrence, db.sodecaf.local.signed.

Ce fichier contient les signatures des zones.

Editer /etc/bind/named.conf.local, de sorte à indiquer le fichier de zone signé :

```bash
zone "sodecaf.local" {
    type master;
    file "db.sodecaf.local.signed";
    allow-transfer { 172.16.0.3; };
};

zone "0.16.172.in-addr.arpa" {
    type master;
    file "db.172.16.0.rev";
    allow-transfer { 172.16.0.3; };
};
```

Et bien sûr, pour finir, redémarrer le service bind9.
