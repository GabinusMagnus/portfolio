<#------------------------------------------------------------------
2 Apprentissage PowerShell - Script n° 1
3 Fonction : Ce script cherche un fichier dans un dossier donné
4 Auteur BD – 17/12/2013
5 --------------------------------------------------------------------#>
$cherche = $args[0]
$dossier = $args[1]
$occurences = 0
echo "Recherche du fichier $cherche dans le dossier $dossier"
Get-ChildItem -Path $dossier -Recurse -ErrorAction SilentlyContinue |
where {$_.Name -eq $cherche} |
ForEach-Object {
    echo ("le fichier $cherche est dans "+$_.DirectoryName)
    $occurences++
}
Write-Host -ForegroundColor Yellow "Le fichier $cherche est présent dans $occurences dossiers"