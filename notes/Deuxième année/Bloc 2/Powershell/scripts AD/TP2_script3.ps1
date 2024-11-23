<#-------------------------------------------------------------------
2 Apprentissage PowerShell - Script n° 3
3 Auteur BD – 18/12/2013
4 ---------------------------------------------------------------------#>
while ($couleur -ne 'stop') {
$listeCouleurs =
@("Black","DarkBlue","DarkGreen","DarkCyan","DarkRed","DarkMagenta","DarkYellow","Gray
","DarkGray","Blue","Green","Cyan","Red","Magenta","Yellow","White")

$invite = "saisissez une couleur"
$couleur = Read-Host $invite

$z = $listeCouleurs | where-object {$_ -match $couleur}

if ($z -ne $null) {
Write-Host -ForegroundColor $couleur ("vous avez demandé à écrire en "+$couleur)
}
else {
write-host ("la couleur "+$couleur+" n existe pas.")
}
}
write-host ("Fin.")