# Git

## Interface en ligne de commande

### Authentification

L'authentification peut se faire via *https* dans VSCode et sur le site Github, mais le protocole n'est plus supporté par git en ligne de commande.

L'authentification peut se faire via *ssh*. Pour la permettre, il faut d'abord ajouter la clé publique ssh de la machine à Github.

D'abord, si on n'a pas encore configuré de clés, commençons par générer les clés sur la machine. Après la commande, un dialogue demandera où enregistrer la paire de clés et la phrase de passe.

```bash
ssh-keygen -t ed25519 -C "adresse@mail.exemple"
# génération des clés, identifiées par une adresse mail (qui peut être fictive)
```

* Emplacement de la paire de clés :
  
  * clé privée : `.ssh/id_ed25519`
  
  * clé publique : `.ssh/id_ed25519.pub`

* Phrase de passe : idéalement, c'est une phrase complète qu'il faudrait renseigner. Cependant, on peut la renseigner comme on veut, comme un simple mot de passe. *On peut générer et utiliser les clés sans phrases de passe.*

Après quoi, on ajoute la clé à l'agent SSH du système (autorise les connexions distantes en SSH).

```shell
eval "$(ssh-agent -s)" # démarrer un processus pour l'agent SSH
ssh-add ~/.ssh/id_ed25519 # ajouter la clé à l'agent
```

Maintenant que les clés sont configurées sur la machine que l'on veut authentifier, la clé publique de la machine doit être ajoutée à Github.

Sur le site web Github, dans les paramètres du compte, dans la section "clés SSH et GPG" ([SSH and GPG keys](https://github.com/settings/keys)) et y ajouter sa clé publique (id_ed25519.pub).

Les instructions sont données sur le site de Github aux adresses suivantes :

[Generating a new SSH key and adding it to the ssh-agent - GitHub Docs](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent)

[Adding a new SSH key to your GitHub account - GitHub Docs](https://docs.github.com/en/authentication/connecting-to-github-with-ssh/adding-a-new-ssh-key-to-your-github-account)


