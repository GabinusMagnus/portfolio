# Protocoles

- **TCP :** Transmission Control Protocol. Protocole pour vérifier que l’échange de données se fait sans erreurs

- **IP :** Internet Protocol. Découpe l’information en paquets, les adresser et les transporter et recomposer le message initial à l’arrivée.

**TCP/IP : données fractionnées en paquet, adressage, routage (acheminement des données), détection et correction des erreurs.**

**protocole ICMP :** protocole du ping

## Modèle OSI :

Sept couches :

1. **Physique :** transmission binaire numérique ou analogique

2. **Liaison :** adressage physique (MAC/LLC)

3. **Réseau :** adressage logique et routage

4. **Transport :** TCP

5. **Session :** Communication interhost

6. **Présentation :** Conversion et chiffrement des données

7. **Application :** point d’accès aux services réseau

PLRTSPA :  
Petit Lapin Rose Trouvé à la SPA. ou  
**P**ourquoi **L**e **R**oux **T**ouche **S**on **P**énis **A**llongé ? ou  
**P**ierre **L**ouis **R**este **T**oujours **S**ans **P**énétration **A**nale ! ou  
**P**endant **L**es **R**ègles **T**oujours **S**évir **P**ar l'**A**nus !

## Mode connecté/non connecté :

**connecté :** liaison, transmission et libération. Peut se faire par protocole TCP.  
**non connecté :** transmission sans liaison et donc sans libération.

# Transmission des paquets

Les paquets contiennent l’adresse mac du destinataire. Pour obtenir l’adresse mac du destinataire, on récupère l’adresse mac du destinataire dans la table ARP.

`Rappel : la table ARP contient toutes les ip qui ont communiqué avec l’hôte et leur associe une adresse mac`


