# Authentification

- Active Directory pour Windows
- LDAP pour Linux

Le serveur d'authentification dépend du serveur DNS, qui résout le nom de domaine.

# Services

https revient à http avec une couche de chiffrement, TLS.

DHCP se résume en ses quatre étapes :

1. DHCP Discovery : le client tente de trouver un serveur dhcp
2. DHCP Offer : le serveur offre une IP au client
3. DHCP Request : le client demande au serveur de lui attribuer l'adresse offerte
4. DHCPACK : le client reçoit son adresse

# DNS

Sous Unix : /etc/hosts

Sous Windows : c:\Windows\System32\drivers\hosts

Pour s'informer sur un DNS, par exemple celui de Google :

`nslookup dns.google`

Le premier DNS a répondre est l'ip de la machine (127.0.0.1).

Un domaine est géré par deux machines obligatoirement, afin d'être toujours en ligne, pour la *redondance*.

Une IP peut répondre à plusieurs URL différentes. Un même serveur DNS peut servir deux URL.

Hiérarchiquement : IANA --> ICANN --> AFNIC --> bureau d'enregistrement

Le bureau d'enregistrement prend un nom de domaine chez l'AFNIC et l'attribue à son client. Par exemple, ledantec-numerique acheté à OVH.

## Ticketing

Quand un problème est signalé au responsable.

## Centre de services

Ou service desk. C'est la centralisation des services, le SPOC (Single Point Of Contact). On ne peut pas contacter l'administrateur réseau autrement que par la SPOC.

La qualité du service se dit QOS (Quality Of Service).

## ITIL

Information Technology infrastructure Library. Un ensemble de bonnes pratiques quant à la gestion du SI de l'entreprise.

## GLPI

Un outil ITSM, Information Technic Service Management. Permet d'orchestrer la gestion des incidents et des problèmes.

Un problème est un incident qui se répète. Un problème provoque des incidents. La résolution du problème revient à traiter la cause des incidents.
