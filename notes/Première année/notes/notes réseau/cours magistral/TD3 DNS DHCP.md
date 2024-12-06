# TD3 DNS DHCP

Une machine dans un vlan différent du serveur DHCP ne recevra pas d'IP par défaut. Sur le routeur, activer IP Helper et lui indiquer l'adresse du serveur.

Plusieurs serveurs DHCP, pour la redondance.

![](C:\Users\Gabin\Pictures\important\notes\infrastructure%20B1TD3.png)

*Une adresse APIPA permet de communiquer avec d'autres machines adressées par APIPA*

Pour www.toutatice.fr, la résolution du nom se fait en lisant l'adresse en sens inverse. Le premierDNS résolu est le DNS racine (.fr., caché), puis le TLD (.fr), puis le domaine (toutatice), puis la machine (www).

www signifie World Wide Web, mais ça n'a aucune importance. A vrai dire, www correspond à la ligne `ServerName` dans le fichier de configuration Apache du site.

En consultant www3.toutatice.fr, le premier DNS résolu est le domaine (toutatice), car le TLD et le domaine sont mis en cache.

En consultant www.ecoledirecte.fr, le premier DNS résolu est à nouveau le TLD (.fr), car il résoudra ensuite ecoledirecte, qui résoudra www.

## Paramétrage serveur DNS

Un serveur DNS contient des temporisateurs (timers), des comptes à rebours.

- Refresh : vidage du cache.

- Retry : 

- Expire : Délai maximal de réponse

- Minimum : 

## Ordre des trames

> On considère un réseau composé de trois ordinateurs (un PC, un serveur DNS et un serveur Web), un routeur et deux réseaux
> locaux de type Ethernet comme le montre la figure ci-dessous. L’architecture de protocoles utilisée est TCP/IP.
> Retrouvez l’ordre des différentes trames échangées sur les deux réseaux Ethernet lorsque la machine A ( pc.soc.pays )
> cherche à établir une session www sur le serveur W ( www.soc.pays ).
> On supposera que les trois machines et le routeur sont correctement configurés. Ils viennent d’être installés (tous les caches sont
> vides) et sont allumés lorsque le client commence sa requête. On supposera également que la machine X ( ns.soc.pays ) se
> trouvant sur le même réseau que le client dispose de l’information permettant de résoudre directement le nom www.soc.pays en
> une adresse IP.

![](C:\Users\Gabin\Pictures\important\notes\ex5%20B1TD3.png)

1. trame Ethernet diffusée par A (@MAC A vers @MAC FF:FF:FF:FF:FF:FF ). Cette trame contient une requête ARP pour
   connaître l’adresse MAC du serveur DNS que A connaît seulement par son adresse IP. Le serveur DNS qui a reçu cette
   trame et reconnu son adresse IP répond.
   trame Ethernet (@MAC R2 vers @MAC W). Cette trame contient le datagramme IP (@IP A vers @IP W), qui renferme le
   segment TCP de demande d’ouverture de connexion pour HTTP (port 80). Ce datagramme est celui qui était dans la
   trame 7, la seule différence est le champ TTL que le routeur a réduit de 1 et donc le bloc de contrôle d’erreur sur l’en-tête
   qui a été de ce fait recalculé.

2. trame Ethernet (@MAC X vers @MAC A) contenant la réponse ARP fournissant l’adresse MAC du serveur DNS. A inscrit
   dans sa table ARP la correspondance @IP 25.0.1.33 = @MAC 08:00:02:54:E2:A0 , et maintenant que A connaît l’adresse
   MAC de X, elle peut lui envoyer une trame Ethernet.

3. Trame Ethernet (@MAC A vers @MAC X). Cette trame contient un datagramme IP (@IP A vers @IP X). Le datagramme
   contient un message UDP (port distant 53) contenant la requête au DNS (« je recherche l’adresse IP de www.soc.pays
   »).

4. trame Ethernet (@MAC X vers @MAC A). Cette trame contient un datagramme IP (@IP X vers @IP A). Le datagramme
   contient un message UDP (port local 53) portant la réponse du DNS (www.soc.pays = @IP 25.0.2.55 ). A connaît
   maintenant l’adresse IP de son correspondant, en l’occurrence le serveur Web. En utilisant le masque de sous-réseau qui
   est présent dans son fichier de configuration, A constate que le serveur Web n’est pas dans le même sous-réseau que lui.
   Il faudra donc passer par le routeur pour sortir du sous-réseau. Or le routeur n’est connu (fichier de configuration de A)
   que par son adresse IP que nous noterons @IP R1 : il faut procéder à une nouvelle requête ARP pour obtenir son
   adresse MAC.

5. trame Ethernet diffusée par A (@MAC A vers @MAC FF:FF:FF:FF:FF:FF ). Cette trame contient une requête ARP pour
   connaître
   l’adresse MAC du routeur connu par @IP R1.

6. trame Ethernet diffusée par A (@MAC A vers @MAC FF:FF:FF:FF:FF:FF ). Cette trame contient une requête ARP pour
   connaître
   l’adresse MAC du routeur connu par @IP R1.

7. trame Ethernet (@MAC A vers @MAC R1). Cette trame contient un datagramme IP (@IP A vers @IP W) qui contient un
   segment TCP de demande d’ouverture de connexion (drapeau SYN) pour HTTP (port 80). Le routeur a reçu la trame 7
   puisqu’elle lui était adressée. Il en a décapsulé le datagramme IP et, après consultation de sa table de routage, a
   constaté que le réseau de W était joignable directement sur sa deuxième interface. Nous faisons ici l’hypothèse que
   l’adresse MAC de W ne figure pas dans la table ARP du routeur.

8. trame Ethernet diffusée par le routeur (@MAC R2 vers @MAC FF:FF:FF:FF:FF:FF ). Cette trame contient une requête
   ARP pour connaître l’adresse MAC de W dont le routeur ne connaît que @IP W.

9. trame Ethernet (@MAC W vers @MAC R2). Cette trame contient la réponse ARP fournissant l’adresse MAC de W. Le
   routeur inscrit dans sa table ARP la correspondance @IP 25.0.2.55 = @MAC 08:00:02:54:E2:7F.

10. trame Ethernet (@MAC R2 vers @MAC W). Cette trame contient le datagramme IP (@IP A vers @IP W), qui renferme le
    segment TCP de demande d’ouverture de connexion pour HTTP (port 80). Ce datagramme est celui qui était dans la
    trame 7, la seule différence est le champ TTL que le routeur a réduit de 1 et donc le bloc de contrôle d’erreur sur l’en-tête
    qui a été de ce fait recalculé.

11. trame Ethernet diffusée par W (@MAC W vers @MAC FF:FF:FF:FF:FF:FF ) contenant une requête ARP pour connaître
    l’adresse MAC du routeur (A est dans un autre sous-réseau).

12. trame Ethernet (@MAC R2 vers @MAC W). Cette trame contient la réponse ARP fournissant l’adresse MAC du routeur
    (côté sous-réseau 2).
