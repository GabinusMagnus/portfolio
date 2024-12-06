# Groupes et utilisateurs

- **groupadd/useradd :** ajouter un groupe/utilisateur

- groupadd -g 1001 mapromo : *ajouter un groupe primaire, identifiant (user id) 1001 dont le nom est mapromo*

- useradd -d /home/alf -m -g mapromo -G users -u 101 alf : *ajouter un utilisateur dont le répertoire (directory) est /home/alf, le créer s’il n’existe pas (-m make), groupe primaire mapromo, groupe secondaire mapromo et users, dont l’uid sera 101, dont le nom sera alf*

- **groupdel/userdel :** supprimer groupe/utilisateur

- userdel -r alf : *supprimer alf et son répertoire*
