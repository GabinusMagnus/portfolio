# Test du service

## Configuration d'Apache

- /etc/apache2/sites-available

- /etc/apache2/sites-enabled

sites-enabled est un lien vers sites-available. Il suffit donc d'éditer sites-available/lesite.conf

### /etc/apache2/sites-available/exemple.conf

Arguments :

- **DocumentRoot :** Dossier racine du site web

- **DirectoryIndex** : Fichier racine, à spécifier s'il n'est pas index.html ou index.php

### Droits

L'installation du paquet apache2 crée automatiquement un utilisateur www-data appartenant au groupe www-data. Lui accorder les droits sur le dossier /var/www/lesite/.

``chown www-data:www-data lesite`` ou ``chmod 755 lesite``

## Sécurisation

Avec Kali Linux, la commande whatweb retourne la version d'apache, l'OS du serveur...

Un attaquant se base sur ces informations (entre autres) pour rechercher des failles de sécurité. La première précaution est donc de cacher les informations de version.

### /etc/apache2/conf-available/security.conf

**Arguments** :

- **ServerTokens :** Remplacer "OS" par "Prod"

- **ServerSignature :** Remplacer "On" par "Off""

Maintenant, sous Linux, les scripts CGI sont automatiquement supportés par apache lors de son installation.

### /etc/apache2/sites-available/exemple.conf

Les options et les autorisations de consultation du dossier du site web par les clients se définissent entre les balises `<Directory>`. L'ouverture de la balise se fait avec le chemin du dossier du site en argument.

```bash
<Directory "chemin/du/site">

# Désactiver l'affichage de l'arborescence du site chez le client et l'exécution de scripts CGI :

Options -Indexes -ExecCGI

# Restreindre l'accès au site aux clients du réseau 172.160.0.0

Require ip 172.160.0.0/24

</Directory>
```

## Sync flooding

Le sync flooding repose sur le fonctionnement d'une requête tcp. La première étape d'une requête tcp demande au serveur s'il accepte la connexion du client. En temps normal, le serveur répond positivement et le client poursuit. L'attaque consiste à ignorer la réponse du serveur et le saturer en renouvelant sans cesse la demande.

Sur une machine Kali, on peut attaquer avec hping3 : `hping3 --flood -d 120 --rand-source -S -p 80 $adresse_serveur_web`

## Inspection des logs d'Apache

Soit on a défini le répertoire des journaux dans /etc/apache2.conf, soit il est par défaut défini selon la variable $Apache_log_dir dans /etc/apache2/envvars.

Dans /var/log/apache/access.log.1, on retrouve tous les clients qui se sont connectés au serveur.
On peut y retrouver un même client qui répète beaucoup de requêtes successives.

On peut inspecter ce fichier en direct avec `tail -f`

## Fail2Ban

Pour l'installation et la configuration de fail2ban, voir les pages 3 et 4 du TP.

Pour voir le statut du blocage sur Apache, taper la commande `fail2ban-client status apache-get-dos`

## Attaque DOS

Sur Kali, utiliser l'utilitaire slowhttptest.

`slowhttptest -c 200 -H -g -o slowhttp -i 10 -r 200 -t GET -u http://172.16.0.10 -x 24 -p 80`

## IPTables

Debian comporte un pare-feu intégré, comme le Windows Defender Firewall, nommé iptables.

Pour lister les règles de pare-feu du systèmes, taper `iptables -L`. On y verra l'ip de l'attaquant bloquée.

Pour "débannir" le client, taper `fail2ban-client unban 172.16.0.30`.

## Certificat HTTPS

Voir la note dédiée.
