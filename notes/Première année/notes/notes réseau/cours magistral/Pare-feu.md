# Pare-feu

Un logiciel, voire un appareil dédié, qui filtre les communications autorisées sur le réseau.

En matière de sécurité, on distingue une infrastructure en trois zones :

- Réseau externe (extranet) : réseau le plus ouvert sur lequel l'entreprise n'a pas ou presque pas de contrôle (Internet par exemple).

- Réseau interne (intranet) : le réseau le moins ouvert, celui de l'entreprise, qui le contrôle totalement.

- Réseau intermédiaire (DMZ) : zone démilitarisée, la moins protégée du réseau. Un réseau composé de services fournis aux réseaux internes et externes, comme les serveurs web, DNS, de messagerie. 

## Politique de sécurité

On peut résumer toute une politique de sécurité en deux listes :

- Blacklist : tout ce qui n'est pas explicitement interdit est autorisé

- Whitelist : tout ce qui n'est pas explicitement autorisé est autorisé

Le filtrage du pare-feu s'applique aux interfaces réseaux, et se définit par des critères comme l'adresse IP, les ports TCP/UDP,... mais aussi les options des paquets transmis (validité, fragmentation,..), les paquets eux-mêmes (taille,...) et même avec des utilisateurs.

Le routeur sert à isoler le traffic dans les zones du réseau.

Exemple de Whitelist :

![](C:\Users\Gabin\Pictures\important\notes\Capture%20d'écran%202024-02-07%20094735.png)

*Toutes les lignes sont des acceptations, à l'exception de la dernière.*

La première règle concerne une machine du réseau. Elle est autorisée à envoyer des paquets via TCP à la machine 192.154.192.3, et ils seront redirigés sur le port 25 de cette dernière.
La troisième concerne une passerelle. Elle est autorisée à envoyer des paquets via TCP à toute machine, qui seront redirigés sur le port 80 de ces dernières.

## Règles dans Packet Tracer

| action | protocol | remote IP | remote wild card | remote port | local port |
| ------ | -------- | --------- | ---------------- | ----------- | ---------- |
|        |          |           |                  |             |            |
