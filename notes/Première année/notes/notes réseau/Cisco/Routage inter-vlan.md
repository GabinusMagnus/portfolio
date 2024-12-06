# Routage inter-vlan

Vlans : 20, 30, 99

- 20 : vlan clients

- 30 : vlan admin

- 99 : vlan natif

activer les vlans 20 et 30 sur, chacun son interface, sur le commutateur.

Une troisième interface sur le switch à laquelle est branchée le routeur, en mode trunk pour acheminer tous les vlans au routeur, le vlan natif sera activé sur l’interface trunk.

```
switchport mode trunk
switchport trunk allowed vlan 99, 30, 20
switchport trunk native vlan 99
no shutdown
```

Configuration routeur :

```
interface gig0/0/0.10
encapsulation dot1Q 10
ip address 192.168.10.254
% 253 s'il y a une passerelle en 254
ip helper-address %adresse du serveur DHCP

% route
ip route 0.0.0.0 0.0.0.0 192.168.10.254
```
