# Mise en place du NAT dynamique

*Créer un pool d'adresses :*

```
ip nat pool POOL-NAT-LAN2 201.49.10.17 201.49.10.30 netmask
255.255.255.240
```

*Créer une access-list :*

```
access-list 2 permit 192.168.0.0 0.0.0.255
```

*Configuration du NAT :*

```
ip nat inside source list 1 pool POOL-NAT-LAN2
```

S'il y a plus d'adresses sources que d'adresses publiques disponibles :

```
ip nat inside source list 2 interface serial 0/0 overload
```

remplacer l’adresse IP source par celle configurée sur l’interface Serial 0/0 en la surchargeant pour permettre à plus d’une machine de communiquer avec l’extérieur. Au lieu d'adresses privées, c'est sur des ports sur l'adresse du routeur que sont redirigées les requêtes.

C'est du PAT.
