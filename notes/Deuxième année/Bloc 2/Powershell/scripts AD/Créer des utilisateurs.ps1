Import-Module ActiveDirectory
Import-Module NTFSSecurity

$users = ipcsv "C:\Users\Administrateur\Documents\utilisateurs sodecaf.csv" -Delimiter ";"
$dossierPartage = "C:\Partage\"

# Fonctions de création de mots de passe
Function get-password() {
$motdepasse = ''

for ($i=0;$i -lt 3;$i++) {
$lettre = Get-Random -InputObject a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
$motdepasse+=$lettre1
}

for ($i=0;$i -lt 3;$i++) {
$lettre = Get-Random -InputObject A,B,C,D,E,F,G,H,I,J,K,L
$motdepasse+=$lettre2
}

for ($i=0;$i -lt 3;$i++) {
$lettre = Get-Random -InputObject 0,1,2,3,4,5,6,7,8,9
$motdepasse+=$lettre3
}

for ($i=0;$i -lt 3;$i++) {
$lettre = Get-Random -InputObject !,%,*,-,+,?,:,$
$motdepasse+=$lettre4
}

$tableau = $motdepasse.toCharArray()
$motdepasse = ''

while ($tableau.Count -ne 0) {
$indice = Get-Random -maximum $tableau.Count
$caractere = $tableau[$indice]
$motdepasse += $caractere
$tableau = $tableau | where-object -filterscript {$_ -ne $caractere}
}

return $motdepasse
}

# création des UO

if ((Get-ADOrganizationalUnit -Filter 'Name -like "Accueil"') -eq $null) {
    New-ADOrganizationalUnit -Name "Accueil" -Path "dc=sodecaf,dc=local" -ProtectedFromAccidentalDeletion $false
}
if ((Get-ADOrganizationalUnit -Filter 'Name -like "Comptabilité"') -eq $null) {
    New-ADOrganizationalUnit -Name "Comptabilité" -Path "dc=sodecaf,dc=local" -ProtectedFromAccidentalDeletion $false
}
if ((Get-ADOrganizationalUnit -Filter 'Name -like "Informatique"') -eq $null) {
    New-ADOrganizationalUnit -Name "Informatique" -Path "dc=sodecaf,dc=local" -ProtectedFromAccidentalDeletion $false
}

# Création des groupes

if ((Get-ADGroup -Filter 'name -like "Accueil"') -eq $null) {
    New-ADGroup -name "Accueil" -groupscope Global -Path "ou=Accueil,dc=sodecaf,dc=local"
}
if ((Get-ADGroup -Filter 'name -like "Comptabilité"') -eq $null) {
    New-ADGroup -name "Comptabilité" -groupscope Global -Path "ou=Comptabilité,dc=sodecaf,dc=local"
}
if ((Get-ADGroup -Filter 'name -like "Informatique"') -eq $null) {
    New-ADGroup -name "Informatique" -groupscope Global -Path "ou=Informatique,dc=sodecaf,dc=local"
}


# création des utilisateurs

foreach ($user in $users) {
    $prenom = $user.firstname
    $nom = $user.lastname
    $nom_complet = $prenom+" "+$nom
    $login = $prenom.substring(0,1)+$nom
    $login = $login.tolower()
    $email = $user.email

    $motdepasse = "Btssio2017"
    
    switch($user.Function) {
        "ACCUEIL" { 
            $service = "ou=Accueil,dc=sodecaf,dc=local"
            $groupe = "Accueil"
        }
        "COMPTABLE" {
            $service = "ou=Comptabilité,dc=sodecaf,dc=local"
            $groupe = "Comptabilité"
        }
        "INFORMATIQUE" { 
            $service = "ou=Informatique,dc=sodecaf,dc=local"
            $groupe = "Informatique"
        }
        default { $service = "cn=Users,dc=sodecaf,dc=local" }
    }

    if ((Get-ADUser -Filter 'SamAccountName -like $login') -eq $null) {
        New-ADUser `
            -Name $nom_complet `
            -GivenName $prenom `
            -Surname $nom `
            -SamAccountName $login `
            -UserPrincipalName $email `
            -AccountPassword (ConvertTo-SecureString $motdepasse -AsPlainText -Force) `
            -Path $service `
            -HomeDrive "U:"`
            -HomeDirectory "\\SRV-WIN1\Partage\$login" `
            -PassThru | Enable-ADAccount

        Add-ADGroupMember -Identity $groupe -Members $login
        echo "Le compte $login a été créé avec le mot de passe $motdepasse"

        if ((Test-Path "C:\Partage\$login") -eq $false) {
        mkdir "C:\Partage\$login"
        Set-NTFSOwner -Path "C:\Partage\$login" -Account "sodecaf.local\$login"
        Add-NTFSAccess -Path "C:\Partage\$login" -Account "sodecaf.local\$login" -AccessRights FullControl
        #Remove-NTFSAccess -Path "C:\Partage\$login" -Account "sodecaf.local\everyone"
        
        }
    }

    

}