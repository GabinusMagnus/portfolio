#---------------------------------------------------------
# Script de déploiement et configuration du service DHCP
# Date : 01/10/2024     Auteur : CLB
# Fichier : TP4-scriptDHCP.ps1
#---------------------------------------------------------

$nomServeurDHCP = "SRV-WIN-CORE1"
$IPServeur = "172.16.0.1" #@IPv4 à  donner au serveur
$NomEtendue = "DHCP_sodecaf"
$IPreseau = "172.16.0.0"
$IPDebut = "172.16.0.150"
$IPFin = "172.16.0.200"
$IPmasque = "255.255.255.0"
$IPPasserelle = "172.16.0.254"
$IPDNSPrimaire = "172.16.0.1"
$IPDNSSecondaire = "8.8.8.8"
$DomainNameDNS = "sodecaf.local"
$DureeBail = "14400" #4h = 14400s

Install-WindowsFeature -Name DHCP -IncludeManagementTools # installation de la fonctionnalité DHCP
Add-DhcpServerSecurityGroup #création du groupe de sécurité pour le service DHCP
Restart-Service dhcpserver
Add-DhcpServerInDC -DnsName $nomServeurDHCP -IPAddress $IPServeur #Autorisation du serveur DHCP dans l'annuaire

# Si alerte post-installation :
# Set-ItemProperty –Path registry::HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\ServerManager\Roles\12 –Name ConfigurationState –Value 2

# test et effacement éventuel de l'étendue
if ((Get-DhcpServerv4Scope -ComputerName $nomServeurDHCP) -ne $null) {
		write-host("Etendue déjà présente, elle sera effacée")
		Remove-DhcpServerv4Scope -ComputerName $nomServeurDHCP -ScopeId $IPreseau -Force
}

# Configuration de l'étendue et des options
Add-DhcpServerv4Scope -Name $NomEtendue -StartRange $IPDebut -EndRange $IPFin -SubnetMask $IPmasque
Set-DhcpServerv4OptionValue -ScopeId $IPreseau -OptionId 3 -Value $IPPasserelle
Set-DhcpServerv4OptionValue -ScopeId $IPreseau -OptionId 6 -Value $IPDNSPrimaire,$IPDNSSecondaire -Force
Set-DhcpServerv4OptionValue -ScopeId $IPreseau -OptionId 15 -Value $DomainNameDNS
Set-DhcpServerv4OptionValue -ScopeId $IPreseau -OptionId 51 -Value $DureeBail

# Activation de l'étendue
Set-DhcpServerv4Scope -ScopeId $IPreseau -Name $NomEtendue -State Active

# Affichage des informations sur l'étendue créée
Get-DhcpServerv4Scope -ScopeId $IPreseau
Get-DhcpServerv4OptionValue -ComputerName $nomServeurDHCP -ScopeId $IPreseau
