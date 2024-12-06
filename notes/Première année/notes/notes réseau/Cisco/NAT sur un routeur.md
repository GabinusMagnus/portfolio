# NAT sur un routeur

R1(config)#int fa0/0 
R1(config-if)#exit
R1(config-if)#ip nat inside 
R1(config)#int s0/0
R1(config-if)#exit 
R1(config-if)#ip nat outside
R1(config)#int fa0/1 
R1(config-if)#exit
R1(config-if)#ip nat inside

## Configurer du NAT statique

R1(config)#ip nat inside source static 192.168.1.100 201.49.10.30

## Visualiser la table de translations NAT

R1#show ip nat translations

## Commandes Cisco

Exemple de configuration du NAT dynamique pour C2.
Donner au routeur une plage d’adresses publiques (un pool
d’adresse) dans laquelle il peut piocher pour créer dynamiquement
les translations.

## Créer le pool d’adresses

`ip nat pool <nom du pool> <première adresse de la plage> <dernière adresse de la plage> netmask 255.255.255.240`

R1(config)#ip nat pool POOL-NAT-LAN2 201.49.10.17 201.49.10.30 netmask
255.255.255.240

Comme n'importe qui au sein du réseau interne pourrait se voir assigner une ip publique, on configure une Access Control List :

R1(config)#access-list 1 deny 192.168.1.100
R1(config)#access-list 1 permit 192.168.1.0 0.0.0.255

## Configuration du NAT

R1(config)#ip nat inside source list 1 pool POOL-NAT-LAN2
ou R1(config)#ip nat inside source list 1 pool POOL-NAT-LAN2 overload
