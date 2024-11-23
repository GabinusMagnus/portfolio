<#
TP2_script4
import d'un fichier csv et création des dossiers des utilisateurs
#>
ipcsv ".\utilisateurs sodecaf.csv" -Delimiter ";" | foreach {

$couleur_service = switch ($_.Function)
{
    "INFORMATIQUE" {"cyan"};
    "COMPTABLE" {"yellow"};
    "ACCUEIL" {"blue"};
    "JURIDIQUE" {"white"};
    default {"grey"}
}

$triGramme=$_.firstname.substring(0,1)+$_.lastname.substring(0,1)
$triGramme = $triGramme + $_.lastname.substring($_.lastname.length-1,1)
$trigramme = $triGramme.toUpper()
Write-Host -ForegroundColor $couleur_service ($_.firstname+" "+$_.lastname+" ("+$triGramme+") "+$_.phone1)
}