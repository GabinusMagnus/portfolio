modèle à choisir sur Packet Tracer : 2960+24-tcl

# Premier démarrage

Connecter port console avec adaptateur série-usb.  
Dans MobaXterm, lancer une session *serial*

Être vraiment patient. *Ne pas paniquer.*

Une invite invite à configurer un truc nommé *enable secret*, le refuser.

```
en
erase nvram:
erase running-config
dir flash:
delete flash:vlan.dat
delete flash:config.text
reload
```

La nvram est une mémoire qui peut contenir des données même éteinte.  
Le routeur comporte la running-config, qui est la config en cours d’utilisation, et la nvram-config, stockée dans la nvram.

Pour vérifier la configuration en cours :  
`show runnning-config`  
Pour modifier la configuration :  
`conf t`  
Puis configurer l’ip du switch

```
conf t
interface vlan 1
ip address 172.17.2 255.255.0.0
exit
```

Pour empêcher un utilisateur de niveau 1 d’exécuter la commande *enable* :

`privilege exec level 2 enable`
