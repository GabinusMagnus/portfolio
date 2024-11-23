# Batch

- `rem` : commentaire

- `@echo off` : désactive l’affichage de la saisie de l’utilisateur

- `@echo on` : la réactive

- `%var` = valeur : déclare une variable var de valeur ‘valeur’

- `echo %commande%`

- `goto` : saute des lignes dans le programme, jusqu’à un nombre de ligne ou la mention d’un paramètre.  
  Exemple :  
  *if je_ne_sais_quelle_condition : goto usage*  
  rem lignes sautées  
  
  echo je suis sautée  
  echo je suis sautée  
  :usage  
  echo “lignes sautées.”
  On préfère souvent `call` à goto, car goto génère du code "spaghetti" et comporte des bugs jamais réparés qui en limitent l'usage.
  
  **Astuce :** goto peut permettre d'imiter un while. Exemple d'un while infini :
  
  ```batch
  : verif
  %condition1 = "aaa"
  %condition2 = "aab"
  if (%condition1 NEQ %condition2) GOTO verif
  ```

- `rmdir /s` : supprimer un répertoire récursivement (rm -r). Option `/Q` pour passer la confirmation (rm -f).

- `call` : Call ressemble à goto, mais en plus sain. On ne peut toutefois pas utiliser call pour imiter while comme avec goto.
  Call appelle une section du fichier, sans nous y déplacer. Exemple typique de call :

```batch
%var1 = bon
%var2 = jour
call addition


: addition
echo %var1 %var2
: end        
```

équivalent de cut : :~  
`%time:~,5%   `ne renvoie que le cinquième mot da la sortie de la commande time.

## Net

net user %1 %1 /add /homedir:c:\users\%1  
net localgroup Administrateurs %1

## Conditions

if <condition> ( instructions)  
else ( instructions)
