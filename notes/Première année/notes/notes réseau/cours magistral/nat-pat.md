# NAT et PAT

NAT : Network Adress Translation
PAT : Port Adress Translation

NAT traduit une adresse privée en une adresse publique. PAT traduit le port privé en un port publique.
L'adresse publique peut être temporairement assignée.

Les adresses publiques sont en quantité limitée. Internet ne route pas les adresses privées.

Les adresses privées se classent en trois plages (classes) :

- A : 10.0.0.0 - 10.255.255.255

- B : 172.160.0 - 172.31.255.255

- C : 192.168.0.0 - 192.168.255.255

NAT statique : une adresse externe assignée à une adresse interne. Le lien (mappage) est statique, inchangeable.
NAT dynamique : toute une plage d'adresses disponible. Les adresses privées des clients sont automatiquement liées aux adresses publiques disponibles.

PAT : peut traduire plusieurs adresses privées en une seule adresse publique
