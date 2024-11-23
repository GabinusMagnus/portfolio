# Powershell

Windows comporte Powershell et Powershell ISE. Powershell ISE comporte des outils supplémentaires pour faciliter l'édition de scripts.

Powershell se tape avec des applets de commande, nommés cmdlet.

La structure d'un cmdlet est *verbe-nom option valeur*. Par exemple :

```powershell
Get-Service -name "*net*"
```

Ainsi, pour obtenir de l'aide à propos d'une commande :

```powershell
Get-Help ma_commande
```

Certains cmdlets sont abrégés. Par exemple, `get-command` est abrégé en `gcm`.

Il existe aussi des alias pour cmdlets, correspond à leurs équivalents en batch et en bash. Par exemple, `ls` et `dir` sont des alias pour `get-childitem`. Le pipeline est aussi implémenté dans powershell.

## Variables

Comme en bash, on précède le nom d'une variable d'un $.

Il existe des variables prédéfinies, que l'on ne sera pas autorisé à utiliser.

## Caractères d'échappement

Powershell compte plusieurs façons d'échapper différents caractères. Par exemple, pour échapper une tabulation dans une chaîne de caractères : `t.

## Comparateurs

- gt : greater than

- lt : lesser than

- ge : greater or equal

## Opérateurs logiques

## Switchs

```powershell
$switch = switch ($lang)
{
    1033 {English};
    1036 {"French};
    default {"Unknown"};
}
$switch
```

## Conditions

```powershell
-or
-if
...
```

## Where

On peut analyser un objet. On peut comparer le titre d'un fichier ou le nom d'une variable, parfois comme on le ferait avec grep.

```powershell

```

## Boucles

### While

```powershell
$nombre = 0
$tab = 0..9
while ($nombre -lt $tab.length)
{
    write-host $tab[$nombre];
    $nombre++;
}
```

### Do

```powershell
do
{
    [int] $b = read-host "Entrez valeur entre 0 et 10"
}
while (($b -lt 0) -or ($b -gt 10))
```

### For

Comme en C#.

### Foreach

```powershell
$valeurs = 1,2,3,4,5
Foreach ($valeur in $valeurs) {"Le chiffre est $valeur"}

# récupérer les processus en cours
Get-Process | forEach {$_.name+'-'+$_.StartTime}
```

## Stratégie d'exécution

Il existe des politiques de sécurité quant à l'exécution d'un script.

- Restricted : exécution interdite.

- AllSigned : n'exécute que les scripts signés.

- RemoteSigned : n'exécute que les scripts créés localement

- Unrestricted : Aucune restriction.

Pour vérifier la politique de sécurité : `Get-ExecutionPolicy`

On peut changer la politique de sécurité avec la cmdlet `Set-Executionpolicy` suivie du nom de la politique.
