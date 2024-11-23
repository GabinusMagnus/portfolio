> Le fichier original et éditable (.md) s'ouvre dans un éditeur MarkDown (comme MarkText)

# Projet

## Proxmox :

Nom des VM : SIO2-CP-blabla

Bridges :

On utilise les bridges vmbr 200 à 249. On préfère le vmbr 201.
On utilise l'interface enp6s0f0.

## Assignation des ports :

| Pare-feu | routeur  | Commutateur | vlan |
| -------- | -------- | ----------- | ---- |
|          | GE/0/0/1 | Gig/0/0/1   |      |
| LAN 1    | GE/0/0/0 |             |      |
|          |          | Fa0/1-4     | 10   |
|          |          | Fa0/5-14    | 20   |
|          |          | Fa0/15-23   | 30   |
|          |          | Fa0/24      | 100  |

### OPNSense

| Interface sur OPNSense | Interface correspondante sur Proxmox | Réseau correspondant            |
| ---------------------- | ------------------------------------ | ------------------------------- |
| vtnet0                 | net0                                 | LAN                             |
| vtnet1                 | net1                                 | WAN (temporairement réseau SIO) |

### Stormshield

| Interface sur Stormshield | Interface correspondante sur Proxmox | Réseau Correspondant |
| ------------------------- | ------------------------------------ | -------------------- |
| vtnet0                    | eth0                                 | out                  |
|                           |                                      |                      |

## Tableau des IP

| Machine                                                | IP               |
| ------------------------------------------------------ | ---------------- |
| Stormshield IN                                         | 192.168.1.254/24 |
| Stormshield OUT                                        | DHCP (SIO)       |
| Stormshield DMZ                                        | 10.0.0.254       |
| Router GE/0/0/1                                        | 192.168.1.253/24 |
| Router GE0/0/1.10                                      | 192.168.10.254   |
| Routeur GE0/0/1.20                                     | 92.168.20.254    |
| Routeur GE0/0/1.30                                     | 192.168.30.254   |
|                                                        |                  |
| Corosync (service web)                                 | 10.0.0.1         |
| SIO2-CP-Web1                                           | 10.0.0.2         |
| SIO2-CP-Web2                                           | 10.0.0.3         |
|                                                        |                  |
| AD                                                     | 192.168.100.1    |
| SRV-AD-2                                               | 192.168.100.2    |
| DHCP                                                   | 192.168.100.3    |
| DHCP2                                                  | 192.168.100.4    |
| SIO2-CP-SQL (serveur de base de données)               | 192.168.100.5    |
| SIO2-CP-SQL2                                           | 192.168.100.6    |
| Corosync SQL (service corosync, du cluster debian_sql) | 192.168.100.7    |
| SIO2-CP-IPAM                                           | 192.168.100.8    |
| SIO2-CP-GLPI                                           | 192.168.100.9    |
| SIO2-CP-ZABBIX                                         | 192.168.100.10   |
|                                                        |                  |
|                                                        |                  |
|                                                        |                  |

# Domaine

Nom du domaine : gsb.local

# Utilisateurs

## Active Directory

| utilisateurs | groupe     | mots de passe |
| ------------ | ---------- | ------------- |
| rair         | Admin      | Rootsio2017   |
| nrab         | Commercial | Btssio2017    |
| mile         | Direction  | Btssio2017    |

## Base de données

| Base   | serveur        | mdp        |
| ------ | -------------- | ---------- |
| zabbix | 192.168.100.10 | Btssio2017 |

## Serveurs

| utilisateur    | mot de passe | rôle                                                                     |
| -------------- | ------------ | ------------------------------------------------------------------------ |
| root           | Rootsio2017  | root                                                                     |
| etudiant       | Btssio2017   | transferts scp et tout ce qui ne nécessite pas de privilèges             |
| Administrateur | Rootsio2017  | Administrateur local des machines WIndows Server et du domaine gsb.local |
| replicateur    | Btssio2017   | utliisateur de mysql autorisé à répliquer la base gsb_valide.            |

# Noms d'hôte

| machine      | IP                             | nom d'hôte   |
| ------------ | ------------------------------ | ------------ |
| SI02-CP-Web1 | 10.0.0.2                       | srv-gsb-web1 |
| SIO2-CP-Web2 | 10.0.0.3                       | srv-gsb-web2 |
| Corosync     | 10.0.0.1 (pas encore attribué) |              |
|              |                                |              |
