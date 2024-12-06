Windows vm :

choper iso win11

Choisir une édition pro.

Puis installation personnalisée.

Désactiver la carte réseau pour couper court la recherche de mise à jour.

Une fois démarré, pas de Un réseau IP = un VLAN

Le serveur DHCP utilise le broadcast pour distribuer les adresses IP. Si le serveur est dans un vlan, les trames ne sortiront pas du vlan.

*DTP* : Dynamic Trame Protocol, les switchs s'informent de quels appareils sont connectés à leur vlan  
*CDP* : Cisco Discovery Protocol  
*VTP* : Vlan Trunk Protocol, trames envoyées sur un port pour le signaler en tant que trunk

Contre-mesure contre les attaques de ce vlan natif :

- tagger tous les ports non trunk en mode access
- configurer tous les ports non utilisés sur un vlan vide (même si le port s'allume, il ne mènera nulle part)
- Vlan hopping/double tagging : quand un port est taggé sur deux vlan, il n'en traite alors qu'un.

### VTP :

Définir le commutateur au port trunk en tant que serveur et les autres en tant que clients.

### DTP :

## TP :

Un seul vlan d'administration. Doit être différent du vlan natif. On n'assigne d'adresses aux commutateurs que dans le vlan administratif.

- vlan 2 production 192.168.2.0/24
- vlan 3 ventes 192.168.3.0/24
- vlan 4 compta 192.168.4.0/24
- vlan 10 serveurs (administratif) 192.168.10.0/24
- vlan 99 natif
- vlan 22 blackhole

créer les vlan :  
vlan 2  
name production

#### Assigner un port à un vlan

`interface fa0/1`

`switchport mode access`

`switchport access vlan 1`

#### Le routeur sera la passerelle de plusieurs vlans

On virtualise une interface sur une interface physique :

`interface gigabitEthernet 0/0.10 !interface virtuelle 10 sur l'interface physique 0`

`encapsulation dot1q 10`

`ip address 192.168.10.254 255.255.255.0 ! addresse de la passerelle et masque`

#### On crée le vlan natif sur tous les switchs

switchport trunk allowed vlan 2,3,4,10,22,99

switchport trunk native vlan 99

à garder plus tard :

sur tous les switchs :

`interface fa0/24`

`int range fa0/23-24, fa0/1, gig0/1`

`switchport trunk allowed vlan 2,3,4,10,22,99`  
`switchport trunk native vlan 99`

`switchport trunk native vlan 99`

#### VTP sur le serveur

`VTP version 2`  
`VTP mode server`  
`VTP domain domVTP`  
VTP `password mdpvtp`

#### VTP sur les clients

`VTP version 2`  
`VTP mode client`  
`VTP domain domVTP`  
VTP `password mdpvtp`

#### Création des VLANs sur le serveur

#### Paramétrage des ports des switchs

```
int fa0/2  
s m a  
s a vlan 2  
int fa0/3  
s m a  
s a vlan 3

int fa0/4  
switchport mode access  
switchport access vlan 4

int fa0/1, range fa0/5-23, gig0/1-2  
switchport mode access  
switchport access vlan 22  
```

shutdown compte MS, choisir « joindre un domaine à la place ».

Refuser toutes les propositions de suivis de Windows (« non —> accepter »)

Création des comptes :

Administrateur (droits d’administration)

Client (utilisateur standard)

Ajouter utilisateur sans compte MS...
