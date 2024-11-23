<#------------------------------------------------------------------
Apprentissage PowerShell TP Active Directory - TP5_script1.ps1
Fonction : Test d'ajout d'UO, de groupe et d'utilisateur
Auteur CLB – 07/10/2024
--------------------------------------------------------------------#>
Import-Module ActiveDirectory
 
if ((Get-ADOrganizationalUnit -Filter 'Name -like "Employés"') -eq $null) {
    New-ADOrganizationalUnit -Name "Employés" -Path "dc=sodecaf,dc=local" -ProtectedFromAccidentalDeletion $false
}

#if (([ADSI]::Exists("LDAP://OU=Employés,dc=sodecaf,dc=local")) -eq $false) {
#    New-ADOrganizationalUnit -Name "Employés" -Path "dc=sodecaf,dc=local" -ProtectedFromAccidentalDeletion $false
#}

if ((Get-ADUser -Filter 'SamAccountName -like "pbismuth"') -eq $null) {
New-ADUser -Name "Paul Bismuth" -GivenName Paul -Surname Bismuth `
  -SamAccountName pbismuth -UserPrincipalName pbismuth@supinfo.com `
  -AccountPassword (ConvertTo-SecureString "Btssio2017" -AsPlainText -Force) `
 -PassThru | Enable-ADAccount
 }

if ((Get-ADGroup -Filter "Name -like 'Politique") -eq $null) {
New-ADGroup -name "Politique" -groupscope Global -Path "ou=Employés,dc=sodecaf,dc=local"
}

Add-ADGroupMember -Identity "Politique" -Members "pbismuth"