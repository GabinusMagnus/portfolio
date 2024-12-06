# Sécurisation des switch

Les switch font de l'unicast (d'un seul port à un seul autre port).

**<u>Attaques :</u>**

La table d'adresse mac est saturée. Le commutateur plante, se met en déni de service ou communique en broadcast.

- *MAC flooding* : la table mac est saturée de fausses adresses.

- DHCP :
  
  - *DHCP Starvation* :
    
    L'attaquant utilise un logiciel capable de générer des adresses MAC aléatoires et des requêtes en broadcast de demandes d'adresses IP. --> Epuisement du pool d'adresses IP.
  
  - *DHCP Spoofing* : L'attaquant usurpe l'ip d'un client. On parle de DHCP rogue, le protocole DHCP est corrompu.

- *STP Attacks* : Protection contre les boucles

- *MAC spoofing* : usurpation d'adresse MAC

- Attaques ARP : L'attaquant altère la table ARP pour rediriger le trafic vers sa machine.

**<u>Contre-attaques :</u>**

- DHCP Snooping : Le commutateur ne transmet le trafic qu'à un seul port

| Attaques          | contre-mesure   |
| ----------------- | --------------- |
| *MAC flooding*    | IP source guard |
| *DHCP Starvation* | DHCP Snooping   |
| DHCP Spoofing     |                 |
|                   |                 |
|                   |                 |

# DHCP Snooping

```
interface gig 0/1
switchport mode access
ip dhcp snooping
ip dhcp snooping trust
ip dhcp snooping limit rate 20
! limite le nombre de requêtes à 20 par secondes sur l'interface gig 0/1
```

limite les requêtes à 20 par secondes sur l'interface gig 0/1

# MAC Spoofing

```
interface range fa 0/1-24, gig 0/1-2
switchport mode access
switchport port-security

switchport port-security mac-address sticky
! sticky n'autorise que des addresses spécifiques
switchport port-security aging time 1440
! Vider la table ARP toutes les 1440 minutes
switchport port-security violation shutdown
! éteindre le port en cas de violation

show port-security interface gig 0/1
```

Eteindre les ports puis les rallumer par précaution...

```
interface range fa 0/1-24, gig 0/1-2
shutdown
no shutdown
```

Pour effacer des addresses MAC de la table d'une interface :

```
interface gig 0/2

no switchport port-security mac-address sticky <adresse mac>
```

# DHCP Starvation

Essayer avec un service dhcp fonctionnel. Se connecter au réseau avec Kali.

Sur la Kali :

```
yersinia -G
# lance l'interface graphique de yersinia
```

"Lancer une attaque" --> dhcp discover  
"Lancer une attaque" --> dhcp lease

DHCP lease correspond à la requête pour obtenir une adresse ip.

Toutes les adresses du pool sont attribuées (vérifiable dans /var/lib/dhcp/dhcpd.leases).

## Pour interrompre l'attaque ?

Activer le dhcp snooping sur l'interface du commutateur à laquelle le serveur dhcp est branchée. Limiter le nombre de requête lease à 20.

```
interface gig 0/1
switchport mode access
ip dhcp snooping
ip dhcp snooping trust
ip dhcp snooping limit rate 20
```
