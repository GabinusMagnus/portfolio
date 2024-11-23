# Supervision

> "Une mauvaise supervision se finit par la porte."
> 
> "Il vous faudra aussi démontrer que ce n'est pas de votre faute."

Il existe beaucoup de solutions de supervision, mais la supervision du client repose toujours sur deux procédés :

* Protocole SNMP : La machine du superviseur envoie des requêtes *pull*, demandant les informations, ou bien la machine cliente envoie des notifications *traps* au serveur.

* Agent : Un logiciel installé sur le poste du client, qui agit comme agent, comme GLPI.

Les informations sont stockées et classées dans une base de données MIB, sur le client. Les informations s'identifient comme OID (Object IDentifier).
On peut utiliser le site [oid-info](http://oid-info.com)



## Configuration de l'agent

Sur le client, éditer `/etc/snmp/snmpd.conf` :

```bash
agentAddress udp:161,udp6:[::1]:161
rocommunity public default -V systemonly
rocommunity6 public default -V systemonly
rwcommunity private
```

On peut ensuite interroger le client avec la commande `snmpget -v 1 -c public $adresse_ip_cible 1.3.6.1.2.1.1.4.0`

> La syntaxe se traduit ainsi : `snmpget -v version $numero_version -c $communauté $ip_cible $oid`

*get* ne renvoie qu'une seule valeur. Si un même *OID* contient plusieurs valeurs, c'est *walk* qu'il faut exécuter.


