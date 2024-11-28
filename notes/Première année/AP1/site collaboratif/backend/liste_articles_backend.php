<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
include("connexion_base.php");

$requete_table_articles_acceptes = $connexion->prepare("SELECT ID_ART, TITRE_ART, DESCR_ART, DATE_PROP_ART, DATE_DERNIER_TT_ART, LIBELLE_CATEG FROM article, categorie WHERE (article.ID_CAT = categorie.ID_CAT) AND (STATUS_ART = 'A');");
$requete_table_articles_refuses = $connexion->prepare("SELECT ID_ART, TITRE_ART, DESCR_ART, DATE_PROP_ART, DATE_DERNIER_TT_ART, LIBELLE_CATEG FROM article, categorie WHERE (article.ID_CAT = categorie.ID_CAT) AND (STATUS_ART = 'R');");
$requete_table_articles_en_attente = $connexion->prepare("SELECT ID_ART, TITRE_ART, DESCR_ART, DATE_PROP_ART, DATE_DERNIER_TT_ART, LIBELLE_CATEG FROM article, categorie WHERE (article.ID_CAT = categorie.ID_CAT) AND (STATUS_ART = 'D');");

$requete_table_articles_acceptes->execute();
$requete_table_articles_refuses->execute();
$requete_table_articles_en_attente->execute();

$tableau_articles_acceptes = $requete_table_articles_acceptes->fetchAll();
$tableau_articles_refuses = $requete_table_articles_refuses->fetchAll();
$tableau_articles_en_attente = $requete_table_articles_en_attente->fetchAll();
?>
</body>
</html>