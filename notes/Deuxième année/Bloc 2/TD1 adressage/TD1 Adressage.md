# TD1 Adressage

**Important : Pour un masque /30, seules deux adresses sont disponibles. Idéal pour connecter uniquement deux appareils.**

**Rappel : L'écriture binaire de la dernière adresse possible ne doit jamais se terminer par un 1, cela équivaudrait à un nombre impair.**

Adresse du réseau : 192.160.7.0/24
Donc l'adressage par machine se fera ainsi : 
*NetID(192.160.7.)* *hostID*

Pour un /24, qui signifie "les trois premiers octets valent 1", 256 adresses sont possibles. .255 veut dire broadcast, "envoyer à tout le monde sur le réseau". .0 est l'adresse réseau.

Le réseau marketing compte 100 machines. On peut donc définir un masque à /25.

Le réseau ADMINISTRATIF compte 50 machines, donc on peut définir un masque pour 63 machines, /26.

On ne peut pas adresser le réseau ADMINISTRATIF 192.160.7.0 car cette adresse correspond déjà au sous-réseau marketing. On choisit donc le premier octet disponible au-delà du masque du réseau marketing.
Adresse du réseau ADMINISTRATIF : 192.160.7.128/26
