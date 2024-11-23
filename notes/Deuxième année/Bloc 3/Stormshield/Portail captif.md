# Stormshield : portail captif

Un portail captif est, du côté du client, une page web d'authentification pour accéder au réseau.

L'authentification se vérifie selon un annuaire. On peut créer un annuaire Active Directory différent de l'annuaire "principal" (dont se servent les postes fixes du domaine).

## Création de l'annuaire

Fait avec Windows Server.
Dans la console "Utilisateurs et ordinateurs Active Directory", créer une unité d'organisation "Admin", et un utilisateur "stormshield-ldap".

> Le mot de passe doit être complexe, ne jamais expirer et la case "l'utilisateur devra redéfinir son mot de passe à la connexion" doit être décochée.

## Liaison à l'annuaire

Sur l'interface web du Stormshield, dans le volet "utilisateurs" puis le sous-menu configuration des annuaires, choisir "connexion à annuaire Active Directory".

* nom de domaine : sodecaf.local

* Serveur : SRV_AD (objet défini dans Stormshield, correspondant au serveur AD)

* port : ldap

* Domaine racine : dc=sodecaf,dc=local

* identifiant : cn=stormshield-ldap,ou=admin,ou=Employés_Sodecaf

* mot de passe : mdp

Enfin, sélectionner l'interface du Stormshield sur laquelle "appliquer ce profil" (à la sortie de laquelle on impose le portail captif).

La disposition de la page "Utilisateurs/configuration des annuaires" de l'interface web Stormshield a changé : Maintenant, les annuaires configurés sont listés sur la gauche. Dans le menu hamburger étiqueté "Action" , on peut cliquer "vérifier la connexion à l'annuaire".



Dans "utilisateur", puis "authentification", puis "politique d'authentification", créer une nouvelle règle.

* Utilisateur : Any user@sodecaf.local

* Source : IN (interface du Stormshield branchée au LAN)

* Méthodes d'authentification : LDAP

> Si le filtrage est en mode "pass all", l'authentification sur le portail captif ne sera pas imposée.

## Filtrage

Dans "politique de sécurite / filtrage et NAT", créer une règle simple qui autorise le DNS partout. Puis créer une règle *d'authentification* qui bloque le trafic http/https à destination d'Internet (objet Internet préconfiguré).

**Le trafic est maintenant bloqué pour les clients non-authentifiés. Cependant, ce qui n'est pas autorisé est refusé, donc il faut rédiger une règle simple qui autorise le trafic http/https des utilisateurs de Network_Internals vers Internet. Cette règle simple doit succéder à la règle de blocage.**



Grâce à la liaison à l'Active Directory, le filtrage peut s'affiner en s'appliquant aux groupes et utilisateurs de l'Active Directory.

Par exemple, pour n'autoriser que les administrateurs à se connecter en SSH, rédiger une nouvelle règle, puis dans la section "source", le champ "utilisateur" peut maintenant être complété par le nom du groupe admins.

La règle ressemble à :

| Action    | Source                   | Destination | Port destination | Protocole |
| --------- | ------------------------ | ----------- | ---------------- | --------- |
| autoriser | admins <br/>interface:in | any         | ssh              |           |

## Annuaire interne

Le problème de l'authentification via l'Active Directory est qu'il repose sur le couple identifiant/mot de passe.

On va donc créer un annuaire interne qui fera double authentification. Créer un annuaire local sur le Stormshield :

* Organisation : Sodecaf

* Domaine : stormshield



Puis dans "utilisateurs / authentification", onglet "profils du portail captif", définir l'annuaire local comme annuaire par défaut.
Ensuite, dans l'onglet "politique d'authentification", rédiger une nouvelle règle simple.utilisateur : cliquer l'icône de carnet, qui symbolise les annuaires et sélectionner l'annuaire local, et "Any user@ledomaine.stormshield".

Dans "utilisateurs / utilisateurs", créer un utilisateur, puis tester l'authentification.

L'authentification via un compte de l'AD devrait échouer. On ne devrait pouvoir s'authentifier qu'avec un compte de l'annuaire local du Stormshield.

## Annuaire + certificat

On peut compléter l'authentification d'un certificat SSL. Pour ça, créer une autorité de certification dans "objets / certificats et PKI", puis générer un certificat sur le Stormshield (dans "utilisateurs / utilisateurs", sélectionner l'utilisateur).

Dans "utilisateurs / authentification", onglet "politique d'authentification", compléter la règle d'authentification par annuaire local. Y ajouter la méthode SSL.

Télécharger le certificat, puis le transférer sur la machine cliente. On peut l'importer directement par l'assistant de Windows (qui s'ouvre par défaut).


