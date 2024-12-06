# Sauvegarde avec Duplicati

Duplicati est disponible pour Windows, MacOS et Linux.



Trois disques en GPT

Formater les disques en NTFS

Nommer le disque DATA



Installation Duplicati :

installateur simple



Duplicati :

L'interface web : **localhost:8200**\/ngax/index.html/#

ajouter une sauvegarde --> chiffrement AES-256

type de stockage : dossier local 

nom d'utilisateur : etudiant

mdp : Btsssio2017

exclure : toutes les cases



jours sauvegardés : tous
heure : 09h02



rétention de la sauvegarde : en conserver 3

pas d'options avancées



Duplicati peut aussi sauvegarder depuis les clouds comme Google Drive.

Reprendre l'étape interface web, puis au lieu de dossier local, choisir comme type de stockage "Google Drive".
La page d'authentification au compte Google s'ouvrira. S'authentifier.



Après quoi la rapidité de la sauvegarde dépend évidemment de la bande passante.

## Supprimer une sauvegarde
Les sauvegardes comptent plusieurs versions. Pour en supprime une, cliquer le nom de la sauvegarde dans poste de travail, puis "ligne de commande". Sélectionner la commande delete, puis dans les arguments de la ligne de commande, `--version=<la-version>`

