# Diverses commandes

## Utilisateurs

username etudiant password Btssio2017  
username admin privilege 15 secret Rootsio2017

## Réseau

switch>en
switch#conf t  
switch(config)#ip default-gateway 172.17.255.253  
switch(config)#ip name-server 172.17.0 .1  
switch(config)#int vlan 1
switch(config-if)#ip address 172.17.1.X 255.255.0.0  
switch(config-if)#no sh

line con 0  
speed 9600

interface <nom interface>  
ip address 192.168.1.1 255.255.255.0  
no shutdown

ip default-gateway 192.168.1.254 (dernière ip disponible)

## Système

`hostname :  
``username <nom> password <mdp>`

*secret* au lieu de *password* hash le mot de passe avec MD5, qui reste faillible.  
*créer un administrateur :*  
`username <nom> privilege 15 secret <mdp>`

`banner motd <caractère encadreur><mot><caractère encadreur>` : définir une bannière  
exemple : `banner motd |ATTENTION !|`

## Configurer ssh

ip domain-name bts-sio.local

*histoires de masque inversé : dans la config, le masque se lit à l’envers (tous les bits à 0 sont ramenés à 1)*. 
Dans `permit tcp` : indiquer une ip au lieu du masque. Mais seulement une ip sera autorisée.

access-list 1 permit 172.16.0.0 0.0.255.255  
Le masque est lu à l’envers.

## Adresses MAC

`show mac-address-table count`

Renvoyer le nombre d’adresses MAC.

## Créer une route

route par défaut :

`ip route 0.0.0.0 0.0.0.0`

`ip route réseau_cible masque passerelle`

# Configurer le RIP

```
router rip
version 2
network <réseau>
no auto summary
! si besoin de bloquer le rip sur une interface
passive-interface fa0/0
```

# Privilèges

pour empêcher un utilisateur de niveau 1 d’exécuter la commande *enable* :

`privilege exec level 2 enable`
