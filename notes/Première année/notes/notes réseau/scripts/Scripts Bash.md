# Scripts Bash

## arguments

fichier script.sh :

```bash
#!/bin/bash 

echo $1 $2
```

commande :

```bash
./script.sh "je veux" "tout savoir"
```

## boucle for

```bash
for numero in "$@"
        do echo "$numero"
    done
```

## test

```bash
if test -z $1 ;
then
    echo "chaîne vide"
fi
```

- $0 : Script name

- $1$2...$9Script arguments

- ${n} Script arguments from 10 to 255

- $# Number of arguments

- $@ All arguments together

- $$Process id of the current shell

- $! Process id of the last executed command

- $? Exit status of last executed command
