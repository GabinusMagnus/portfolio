# Windows Core

L'édition Core de Windows est une installation relativement minimale de Windows Server, sans bureau ni explorateur de fichiers. Il reste quand-même les essentiels, comme le bloc-notes, un wordpad non fonctionnel,... sans éditeur en console.

Le menu SCP est comme une interface ncurses. On peut directement revenir à la ligne de commande powershell.

## Installer des fonctionnalités Windows

En powershell, sur Windows 10, pour rechercher les fonctionnalités, on exécute :

`Get-WindowsCapability -Name RSAT* -Online | where {$_.DisplayName -like "ce qu'on veut*"}`

Le nom de la fonctionnalité trouvé, on peut l'installer avec :

`Add-WindowsCapability -Online -Name $nom`

## scripts applicables

*Exemple de configuration du réseau en powershell :*

```powershell
$NomDuServeur = "SRV-WIN-CORE1"
$IPServeur = "172.16.0.1" #@IPv4 à donner au serveur
$IPLongueurMasque = "24" #notation CIDR
$IPPasserelle = "172.16.0.254"
$IPDNSPrimaire = "127.0.0.1"
$IPDNSSecondaire = "8.8.8.8"

New-NetIPAddress -IPAddress $IPServeur -PrefixLength $IPLongueurMasque -InterfaceIndex (Get-NetAdapter).ifIndex -DefaultGateway $IPPasserelle

Set-DnsClientServerAddress -InterfaceIndex (Get-NetAdapter).ifIndex -ServerAddresses ($IPDNSPrimaire,$IPDNSSecondaire)
Rename-Computer -NewName $NomDuServeur -Force
Restart-Computer
```

*Installation du rôle ADDS (Active-Directory-Domain-Service) et promotion du serveur en contrôleur de domaine* : 

```powershell
$NomDuServeur = "SRV-WIN-CORE1"
$IPServeur = "172.16.0.1" #@IPv4 à donner au serveur
$IPLongueurMasque = "24" #notation CIDR
$IPPasserelle = "172.16.0.254"
$IPDNSPrimaire = "127.0.0.1"
$IPDNSSecondaire = "8.8.8.8"

New-NetIPAddress -IPAddress $IPServeur -PrefixLength $IPLongueurMasque -InterfaceIndex (Get-
NetAdapter).ifIndex -DefaultGateway $IPPasserelle

Set-DnsClientServerAddress -InterfaceIndex (Get-NetAdapter).ifIndex -ServerAddresses
($IPDNSPrimaire,$IPDNSSecondaire)
Rename-Computer -NewName $NomDuServeur -Force
Restart-Computer
```

## DHCP

*Installation du service DHCP :*

```powershell
Install-WindowsFeature -Name DHCP -IncludeManagementTools
```

*Lister les étendues DHCP :*

```powershell
Get-DhcpServerv4Scope
```

*Configuration du service DHCP :*

```powershell
Add-DhcpServerSecurityGroup
Restart-Service dhcpserver
Add-DhcpServerInDC -DnsName $nom_serveur.domaine -IPAddress $ip_serveur
# Optionnel : Désactiver l'avertissement que l'on aurait sur Windows Server Desktop
Set-ItemProperty –Path registry::HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\ServerManager\Roles\12 –Name ConfigurationState –Value 2
```

*Configuration d'une étendu DHCP :*

```powershell
# Créer l'étendue :
Add-DhcpServerv4Scope -Name $nom_etendue -StartRange $adresseIP_depart -EndRange $adresse_IP_fin -SubnetMask $masque_réseau

# Exclure des adresses de l'étendue :
Add-DHCPServerV4ExclusionRange -ScopeId $adresse_réseau -StartRange $premiere_adresse_exclue -EndRange $derniere_adresse_exclue

# Définir la passerelle de l'étendue :
Set-DhcpServerv4OptionDefinition -OptionId 3 -DefaultValue $IP_passerelle

# Définir le DNS de l'étendue :
Set-DhcpServerv4OptionDefinition -OptionId 6 -DefaultValue $IP_DNS

# Définir le suffixe DNS :
Set-DhcpServerv4OptionDefinition -OptionId 15 -DefaultValue it-connect.fr

# Activer l'étendue DHCP :
Set-DhcpServerv4Scope -ScopeId $adresse_réseau -Name $nom_etendue -State Active
```

Les options de configuration sont désignées par des mots-clé (router,...), et des numéros (ID, tels que renseignés dans les commandes précédentes par l'option `-OptionID`).

# Administration depuis un autre poste

On peut se connecter avec le compte administrateur du domaine sur un autre poste, comme une installation de Windows graphique.

Pour ça, on doit installer les fonctionnalités RSAT trouvées dans Windows Server (gestionnaire de serveur, ADDS, DHCP, DNS,...). Il s'agit des fonctionnalités facultatives ("Windows Features" en anglais).

Elles doivent être installées depuis la session du compte administrateur local du poste. On peut les installer en powershell ou via l'application paramètres.

Pour rechercher :

`Get-WindowsCapability -Name RSAT* -Online`

Pour filtrer :

`Get-WindowsCapability -Name RSAT* -Online | where {$_.DisplayName -like "ce qu'on veut*"}`

Pour installer :

`Add-WindowsCapability -Name $nom`

Puis, se reconnecter avec le compte admin du domaine.

Après quoi, sur le poste graphique, dans le gestionnaire de serveur, on clique "ajouter un serveur". On essaye d'ajouter le serveur win-core (on a eu une erreur pendant le cours).

Ensuite, dans le volet latéral du gestionnaire de serveur, cliquer "all servers". Cliquer-droit sur le serveur win-core et sélectionner "manage as...", puis renseigner les identifiants de l'administrateur du domaine.

# WAC

Windows Admin Center, une interface web pour administrer les serveurs du domaine.

Comme par hasard, cette interface web est plus réactive dans Edge que Firefox.

Télécharger l'installateur de ce truc depuis le [Windows Admin Center | Centre d’évaluation Microsoft](https://www.microsoft.com/fr-fr/evalcenter/download-windows-admin-center)

Dans l'installateur, renseigner un port sur lequel sera accessible WAC. En cours, nous choisîmes le port 14443. L'installateur génèrera un certificat https, qu'il faudra bien sélectionner dans Edge quand on accèdera à l'interface web.

Dans l'interface web, cliquer l'icône d'engrenage qui symbolise les paramètres, puis dans le volet latéral, cliquer extensions. Installer les extensions DHCP, DNS et Active Directory.

Ajouter le serveur win-core, en renseignant le compte Administrateur du domaine. Puis, dans le volet latéral, cliquer les DHCP, puis cliquer "installer" pour les outils powershell, et réitérer pour DNS et Active Directory.

WAC est maintenant installé. C'est surtout utilisé pour gérer des serveurs hébergés dans le cloud Azur, à vrai dire.
