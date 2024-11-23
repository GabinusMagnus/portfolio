# OPNsense

Dans l'assistant d'installation de l'interface web, décocher "bloquer l'accès des réseaux privés" et "bloquer les bogons".

Contrairement à pfSense ou Stormshield, on a accès à toutes les commandes de FreeBSD. Donc on peut directement utiliser pkg pour installer des paquets, quand l'interface web ne fonctionne pas.

## Configuration du greffon HAProxy

HAProxy est aussi installable sur OPNsense. Dans le menu *services* --> *HAProxy* --> *Paramètres*, cliquer *Serveurs réels*.

Dans cette section, on ajoute les machines "réelles", les machines sur lesquelles sont exécuté le service (même si elles sont virtuelles).

Cliquer *ajouter*. Renseigner le nom du serveur, son adresse IP.

Dans le menu *règles et conditions --> Moniteurs de santé*, créer un moniteur de santé. Quasiment tous les paramètres sont à laisser par défaut, seuls le nom et le protocole concerné sont à renseigner.

Ensuite, cliquer *Backends Pools*. Renseigner le nom du pool, son mode, son algorithme d'équilibrage et les serveurs (machines membres du pool). Activer le contrôleur de santé et sélectionner le contrôleur précédemment créé.

Maintenant, créer une condition.

Finalement, rédiger une règle dans le menu *Règles et conditions --> règles*. Type de test
