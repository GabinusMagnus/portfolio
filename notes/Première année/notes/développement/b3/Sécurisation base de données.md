### Sécurisation base de données

On peut ajouter des utilisateurs à une base de données.
En tant que root, on peut créer des utilisateurs et leur accorder des permissions.

Créer un utilisateur internaute :  `CREATE USER 'internaute'@'localhost' IDENTIFIED BY 'Tramadol_22';`

Supprimer l'utilisateur internaute : `DROP USER 'internaute'@'localhost';`

Modifier le mot de passe d'internaute : `SET PASSWORD FOR 'internaute'@'localhost' = PASSWORD('Xanax_22');`

Pour leur accorder le droit d'afficher (SELECT) toutes les tables de la base Dutoit à internaute : `GRANT SELECT ON Dutoit.* TO 'internaute'@'localhost';`

Pour accorder le droit à internaute d'afficher l'attribut ident de la table utilsateur de la base Dutoit : `FLUSH PRIVILEGES GRANT SELECT (ident) ON Dutoit.utilisateur TO 'internaute'@'localhost';`

Pour retirer le droit de modifier la table utilisateur de la base Dutoit : `FLUSH PRIVILEGES REVOKE UPDATE ON Dutoit.utilisateur FROM 'administrateur'@'localhost';`

> FLUSH PRIVILEGES sert à rafraîchir les privilèges des utilisateurs
