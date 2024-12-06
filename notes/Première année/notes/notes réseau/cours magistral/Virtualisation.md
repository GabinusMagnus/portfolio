# Virtualisation

Types d'hyperviseurs :

1. Type 1 : Le système invité communique avec le matériel physique
2. Type 2 : émulation du matériel, le système invité communique avec le matériel émulé

## Avantages

- Epargne l'achat de machines supplémentaires
- Economie d'énergie
- Economie d'espace
- Pas de nuisances sonores
- Epargne la maintenance matérielle

En moyenne, la charge d'un processeur s'élève jusqu'à 12%. On utilise les pleines capacités du matériel en virtualisant plusieurs systèmes. Les unités multiprocesseurs sont de plus en plus communes.

## Inconvénients

- performances réduites
- Les machines virtuelles dépendent de la machine hôte
- Configuration complexe

## Accès réseau

- NAT : Le système invité est doté d'une carte réseau virtuelle qui communique avec la carte physique de l'hôte.  

- natif : Le système hôte agit comme pont ethernet, par lequel la carte virtuelle se connecte au réseau physique externe.

## conteneur

Le conteneur se sert du système de base hôte. Ce pourquoi Docker n'existe que pour Linux (les distros utilisant le même noyau et la même arborescence de fichiers). Sous FreeBSD on retrouve les jails.

Chroot compte comme conteneur.

Gain de performance.

## Services

- Service de messagerie : nécessite un service DNS
- Service DNS : pour attribuer un nom de domaine
- Service de base de données : PostGreSQL, MySQL, mariaDB,...

### Services importants Windows

- WSUS (Windows Server Update Services) : *déployer des mises à jour système*
- WAPT/ensible : *déployer des mises à jours logicielles*
