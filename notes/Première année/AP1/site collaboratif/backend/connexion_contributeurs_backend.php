<!DOCTYPE html>
<html>
<head>
</head>
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
    requete_table_internautes sélectionne les mots de passe associés au nom d'utilisateur renseignés dans le formulaire de la frontend
    Donc tableau_identifiants est égale au tableau issu de requete_table_internautes
    */

    $requete_table_internautes = $connexion->prepare("SELECT MDP_UT FROM internaute WHERE (STATUS_UT = 'c') AND (COURRIEL_UT = :nom_utilisateur);");
    $requete_table_internautes->bindParam(':nom_utilisateur', $nom_utilisateur);
    $requete_table_internautes->execute();
    $tableau_identifiants = $requete_table_internautes->fetchAll();

    //vérification de l'authentification

    foreach ($tableau_identifiants as $mail_utilisateur)
    {
        if ($nom_utilisateur == $mail_utilisateur)
        {
            foreach ($tableau_identifiants as $mot_de_passe_tableau) {
            
                if ($mdp == $mot_de_passe_tableau)
                {
                    echo "Connecté !";
                    header('Location: ../frontend/accueil_contributeurs.php');
                }
                else
                {
                    echo "Mot de passe ou nom d'utilisateur incorrect.";
                    header ('Location: ../frontend/index.php');
                };
            }
        }   
    };
}
?>
</body>
</html>