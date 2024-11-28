<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include("connexion_base.php");
if (isset($_POST['titre']) && (isset($_POST['description'])) && (isset($_POST['salaire'])) && (isset($_POST['categorie'])) )
{
    // récupération des valeurs
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $salaire = $_POST['salaire'];
    //$categorie = $_POST['categorie'];

    // requête pour attribuer à id_categorie l'id de la categorie saisie
    $id_categorie = $connexion->prepare("SELECT ID_CAT FROM categorie WHERE LIBELLE_CATEG = " + $_POST['categorie']);
    $id_categorie->execute();
    $id_categorie = $id_categorie->fetchAll();
    $id_categorie = $id_categorie["ID_CAT"];


    // insertion des valeurs (NOW() correspond à la date actuelle)
    $insertion_article = $connexion->prepare("INSERT INTO article (TITRE_ART, DESCR_ART, SALAIRE_ART, DATE_PROP_ART, ID_CONT, ID_CAT) VALUES (:titre, :description, :salaire, NOW(), :id_contributeur, :id_categorie );");
    $insertion_article->bindParam(':id_cont', $id_cont);
    $insertion_article->bindParam(':titre', $titre);
    $insertion_article->bindParam(':description', $description);
    $insertion_article->bindParam(':salaire', $salaire);
    $succes=$insertion_article->execute();

    header('Location: ../index.php');
}
?>
</body>
</html>