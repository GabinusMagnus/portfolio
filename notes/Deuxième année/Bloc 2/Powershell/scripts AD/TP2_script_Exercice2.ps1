ipcsv ".\utilisateurs sodecaf.csv" -Delimiter ";" | foreach {

$triGramme=$_.firstname.substring(0,1)+$_.lastname.substring(0,1)
$triGramme = $triGramme + $_.lastname.substring($_.lastname.length-1,1)
$trigramme = $triGramme.toUpper()

$Agence = $_.Agency

if ( -Not Test-Path $Agence ) {
    New-Item -Name $Agence -ItemType "directory"
}
if (Test-Path($Agence+"\$fic_"+$triGramme) -isnot $True) {
    New-Item -Name $Agence\fic_$triGramme -ItemType "directory"
}
}