Un réseau IP = un VLAN

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
