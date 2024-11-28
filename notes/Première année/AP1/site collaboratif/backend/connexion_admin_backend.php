<!DOCTYPE html>
<html>
<head>
<body>
<?php
include("connexion_base.php");
// récupération des valeurs saisies par le serveur, méthode POST

if (isset($_POST['identifiant']) && ($_POST['motdepasse']))
{
    $nom_utilisateur = $_POST['identifiant'];
    $mdp = $_POST['motdepasse'];
    
    /*
    Le résultat d'une requête SQL est sous forme de tableau
    Donc tableau_identifiants est égale au tableau issu de requete_table_internautes
    */
    $requete_table_internautes = $connexion->prepare("SELECT COURRIEL_UT, MDP_UT FROM internaute WHERE STATUS_UT = 'a' ");
    $requete_table_internautes->execute();
    $tableau_identifiants = $requete->fetchAll();

    if ($mdp == $mot_de_passe_tableau) {
        echo "Connecté !";
        header('Location: ../frontend/accueil_contributeurs.php');
}
    else {
        echo "Mot de passe ou identifiant invalide.";
        header('Location: ../frontend/index.php');
};
};

?>
</body>
</head>

</html>