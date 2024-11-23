$motdepasse = ''

for ($i=0;$i -lt 3;$i++) {
$lettre = Get-Random -InputObject a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
$motdepasse+=$lettre
}

for ($i=0;$i -lt 3;$i++) {
$lettre = Get-Random -InputObject A,B,C,D,E,F,G,H,I,J,K,L
$motdepasse+=$lettre
}

for ($i=0;$i -lt 3;$i++) {
$lettre = Get-Random -InputObject 0,1,2,3,4,5,6,7,8,9
$motdepasse+=$lettre
}

for ($i=0;$i -lt 3;$i++) {
$lettre = Get-Random -InputObject !,%,*,-,+,?,:,$
$motdepasse+=$lettre
}

$tableau = $motdepasse.toCharArray()
$motdepasse = ''

while ($tableau.Count -ne 0) {
$indice = Get-Random -maximum $tableau.Count
$caractere = $tableau[$indice]
$motdepasse += $caractere
$tableau = $tableau | where-object -filterscript {$_ -ne $caractere}
}

echo $motdepasse