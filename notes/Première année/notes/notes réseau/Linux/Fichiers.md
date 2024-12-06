# Fichiers

pwd : print working directory

ls : *lister*

- -l : avec les permissions

- -a : all (les fichiers cachés)

cp : copier

- -r : récursivement (copie le dossier et son contenu)

mv : move

## permissions :

Les permissions sont encodées sur trois bits (tiercet). sortie de ls -l :

drwxr-w--- user1 group1 4096 sep. 13 10:00 document  
drwx------ user1 group1 4096 sep. 13 10:00 private  
drwxr-xr-x user1 group1 4096 sep. 13 10:00 public

- : fichier  
  d : répertoire  
  b : périphérique bloc (disque dur, cd)  
  c : périphérique de caractères (bande magnétique,…)  
  l : lien symbolique  

pour se déplacer dans le dossier, on le met en 750 par chmod. Il faut qu’il soit x (execute).

*d :* directory  
*r :* read  
*w :* write  
*x :* execute  

cat *fichier* : affiche le contenu du fichier  
touch *fichier* : crée un fichier ou change sa date de modification s’il existe.  
chown *utilisateur:groupe fichier* : change le propriétaire du fichier.

chmod : ajoute des permissions

## Exemple avec Apache

Apache crée un utilisateur www-data qui doit accéder aux fichiers à servir, stockés dans /var/www. On a créé un autre dossier html/ qui appartient à *etudiant.*

## Comment :

En tant que root :

```bash
chown www-data:www-data /var/www/
chmod 755 /var/www

chown etudiant:etudiant /var/www/html/
chmod 755 /var/www/html/
```
