# Powershell et Active Directory

Quand on crée une UO via une commande PowerShell, l'objet est par défaut protégé contre les suppressions accidentelles.

Pour supprimer un tel objet, il faut cliquer "fonctionnalités avancées" dans le menu déroulant affichage, puis afficher les propriétés de l'objet. Dans l'onglet "sécurité", décocher "protection contre les suppressions accidentelles".

Pour ne pas protéger un objet, il existe un paramètre `-ProtectedFromAccidentalDeletion`.

`New-ADOrganizationalUnit -Name "Employés" -Path "dc=sodecaf.local,dc=local" -ProtectedFromAccidentalDeletion $false`

```powershell
Add-WindowsFeature -Name RSAT-AD-PowerShell
New-ADOrganizationalUnit -Name "Employés" -Path "dc=sodecaf.local,dc=local" -ProtectedFromAccidentalDeletion $false`
```

Voir les scripts.

## NTFSSecurity

Installer le module NTFSSecurity.

`install-package -Name NTFSSecurity`
