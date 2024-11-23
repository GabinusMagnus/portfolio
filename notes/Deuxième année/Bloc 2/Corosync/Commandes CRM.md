# Commandes CRM

```bash
corosync-keygen # génère une clé d'authentification dans /etc/corosync/authkey
crm configure show
crm configure clone $nom_du_clone $service_à_cloner
crm node standby
crm node online
crm resource cleanup
crm resource stop # ou start...
```

En tapant `crm configure`, on entre dans une invite. Dans l'invite donnée par `crm configure`, on peut taper, parmi les commandes précédemment répertoriées, celles débutant par `crm configure ...`.

On peut éditer des ressources et des groupes avec `crm configure edit`. Dans la console de `crm configure`, taper `edit` suivi du nom de la ressource ouvre vi. Le contenu du fichier ouvert dans vi correspond aux commandes crm utilisées pour configurer les ressources.
