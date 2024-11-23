# Stormshield

Très bonne documentation officielle de Stormshield.

[Guide d'installation et de première configuration d'un firewall SNS](https://documentation.stormshield.eu/SNS/v4/fr/Content/Installation_and_first_time_configuration/Getting_started.htm)

## Objets réseaux

Les menus de configurations de Stormshield utilisent la notion d'objet, auquel sont assignés des valeurs comme adresse IP, adresse réseau, URL,...

Ces objets servent de variables pour faciliter la configuration. Toutes les règles utilisant ces objets, il suffit de modifier l'objet au lieu de chaque règle une à une.

Parmi les objets pré-existants utiles :

- Network_Internals : Les machines des réseaux internes

- web_srv : Les protocoles et ports utilisés pour se connecter à un serveur web.

### Créer un objet

Pour créer un objet représentant l'adresse du réseau :
Dans le volet objets, cliquer *réseau*. Puis dans le volet principal, cliquer *ajouter*. Dans le volet latéral de la fenêtre pop-up, sélectionner *réseau*. Entrer l'adresse du réseau avec son masque et un nom pour l'objet.

Pour un objet représentant une machine, cliquer *Objets* --> *Réseau*, puis *ajouter*. Dans la fenêtre contextuelle, cliquer *machine*, puis définir le nom de l'objet et indiquer l'ip de la machine concernée.

### Objets URL

Dans le volet latéral, section *objets*, cliquer *url*. Dans l'onglet *nom de certificat*, *ajouter une catégorie personnalisée*.

Créer une catégorie "white-list". Cette catégorie contiendra les certificats approuvés. Dans la section de gauche, *catégories de certificats*, cliquer *ajouter un nom de certificat*.

Les certificats dont les noms sont répertoriés dans la catégorie white-list seront acceptés.

Dans la politique de sécurité, autoriser la catégorie "authentication_bypass", dans laquelle sont répertoriées les adresses des serveurs de mises à jour de Microsoft.

## Politiques de sécurité

On peut définir plusieurs politiques de sécurité, chacune avec ses règles.

Pour bloquer un site web, créer un objet "Nom DNS (FQDN)". Dans le champ du nom de l'objet, renseigner le FQDN du site visé, puis cliquer sur la loupe à côté du champ. L'adresse IP du serveur distant du site sera alors résolue et renseignée.

Ensuite, créer une règle de blocage dans "filtrage et NAT", avec pour source Network_internals, comme destination l'objet du site,...

Dans la section "filtrage URL", cliquer *ajouter*. L'action sera la page d'erreur personnalisée ("votre entreprise a bloqué...") et la catégorie d'URL "news" ou quoique ce se soit d'autre...

#### GARE !

Quand on veut autoriser une exception (par exemple un seul site de banque alors qu'on a bloqué la catégorie banque), il faudra créer un objet URL "white-list-URL" qui contient l'URL autorisée.

### Filtrage SSL

Autoriser et passer sans déchiffrer la white-list, et bloquer sans déchiffrer la black-list.

### Filtrage et NAT

### Rappel quant aux règles de pare-feu

Quand deux règles portent sur la même source, destination et ports, mais que l'une interdit et l'autre autorise tout, il faut définir en premier la règle d'interdiction.

## Translation adresse privée à publique
