# Scripts

## Arguments

Dans un fichier .ps1, on rédige un script, et on recueille les arguments ainsi :

```powershell
$argument1 = $arguments[0]
$argument2 = $arguments[1]
```

En fait, on crée un tableau qui contient les arguments.

## Paramètres courants

```powershell
Get-ChildItem -ErrorAction SilentlyContinue
```

Même si la commande échoue, le reste du script est exécuté.

```powershell
Get-ChildItem -WarningAction SilentlyContinue 
```
