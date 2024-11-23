<#------------------------------------------------------------------
Apprentissage PowerShell TP Active Directory - TP5_scriptNettoyage.ps1
Fonction : effacement des UO, groupes et utilisateurs
Auteur CLB – 07/10/2024
--------------------------------------------------------------------#>
Import-Module ActiveDirectory

#---------- Fonction de suppresion d'une UO -----------------------
Function effaceUO($name) {
    if ((Get-ADOrganizationalUnit -Filter 'Name -like $name') -ne $null) {
        Remove-ADOrganizationalUnit -Identity "ou=$name,dc=sodecaf,dc=local" -Confirm:$false -Recursive
    }
}

#-------------------------------------------------------------------
effaceUO("Accueil")
effaceUO("Comptabilité")
effaceUO("Informatique")

Remove-Item -Path "C:\Partage\*" -Force -Recurse