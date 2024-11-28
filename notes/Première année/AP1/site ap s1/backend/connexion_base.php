<?php
// paramètres de connexion
$machine="localhost";
$port=3306;
$utilisateur="root";
$motdepasse="";
$nomdebase="panoramametier";

// connexion à la base de données
$connexion=new PDO('mysql:host='.$machine.';port'.$port.';dbname='.$nomdebase, $utilisateur, $motdepasse);

// semble nécessaire, j'ai rencontré beaucoup d'erreurs "pas de base sélectionnée" avant cette ligne
$requete_originelle = $connexion->prepare("USE panoramametier;");
$requete_originelle->execute();

// activation des messages d'erreur
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>