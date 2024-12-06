# Mise en place du NAT statique

Vérifier que le routeur ne fasse déjà du NAT :
`show ip route`

# mise en place

*Indiquer quel port est dans le réseau privé et quel port est dans le réseau public :*

```
interface gig 0/0
ip nat inside

interface Serial0/0

ip nat outside
```

*Indiquer vers quelle adresse privée redirige une adresse publique. Avec un machine interne 172.16.16.1 et le port Serial0/0 209.165.128.128*

```
ip nat inside source static 172.16.16.1 209.165.128.128
! vérifier la table des traductions
show ip nat translations
```

Utilisez les commandes suivantes pour vérifier la configuration de la NAT statique.

```
show running-config
show ip nat translations
show ip nat statistics
```
