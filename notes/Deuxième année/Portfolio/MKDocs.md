# MKDocs

> Les notes prises en cours sont stockées dans des fichiers .md dans le répertoire /var/www/notes_markdown. J'ai créé un service pour gérer mkdocs via systemd.

Le script `/root/mkdocs.sh` permet de démarrer le serveur mkdocs à partir du dossier `/var/www/notes_markdown`. Dans ce dernier répertoire se trouve un fichier *mkdocs.yaml* contenant la configuration du serveur.

J'ai créé un fichier *mkdocs.service* dans `/etc/systemd/system/` qui pointe vers le script *mkdocs.sh*.
