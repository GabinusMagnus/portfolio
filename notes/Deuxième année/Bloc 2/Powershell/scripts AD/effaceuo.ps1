Import-Module ActiveDirectory

Function effaceUO($nom) {
if ((Get-ADGroup -Filter 'name -like $nom') -ne $null) {
    Remove-ADOrganizationalUnit -Identity $name -Path "ou=$name,dc=sodecaf,dc=local" -Confirm:$false -Recursive
}
}

effaceuo("Accueil")
effaceuo("Comptabilité")
effaceuo("Informatique")