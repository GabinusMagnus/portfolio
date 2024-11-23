# Réplication de l'Active Directory

Renommer le PC SRV-WIN1, rester dans le WORKGROUP.

Configuration réseau :

- IP : 172.16.0.1

- Masque : 255.255.255.0

- passerelle : 172.16.0.254

- DNS préféré : 127.0.0.1

- DNS secondaire : 172.16.0.2

## Ajouter le rôle AD

Gérer --> ajouter des rôles --> cocher Services AD DS

Une fois le service installé, cliquer dans les notifications de la console d'administration, et cliquer "promouvoir ce serveur en contrôleur de domaine."

"Ajouter une nouvelle forêt". Nom de la forêt : sodecaf.local

Laisser coché Serveur DNS et Catalogue global.

Installer le rôle DHCP.

## Second serveur

Rentrer le second serveur dans le domaine.

Installer aussi le rôle DHCP. Sans configurer.

## premier serveur

Cliquer-droit "DHCP" et ajouter un serveur autorisé. Ajouter le second serveur.

Cliquer-droit sur IPv4, puis configurer un basculement.

Renseigner le nom du second serveur, trouvable dans l'annuaire Active Directory. Confirmer. Passer en mode Serveur de secours, en veille avec une réservation de 10%, et avec un délai de basculement à 10 minutes ainsi qu'un mot de passe ("secret partagé"). Terminer.

## Second Serveur

Terminer la configuration du DHCP.

Dans "autorisation", cliquer "spécifier" puis entrer le compte administrateur (du domaine) puis valider et fermer.

## Premier serveur

Dans la console DHCP, clic-droit sur IPv4, puis "répliquer les étendues de basculement".
