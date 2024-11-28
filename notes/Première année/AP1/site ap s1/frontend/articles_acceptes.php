<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>articles acceptés</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets\css\main.css" />
</head>
<body>

<table class="table">
  <thead class="head-light">
    <tr>
        <th scope="col">Identifiant</th>
        <th scope="col">Titre</th>
        <th scope="col">Description</th>
        <th scope="col">Date de proposition</th>
        <th scope="col">Date du dernier traitement</th>
        <th scope="col">Catégorie</th>
    </tr>
  </thead>
  <tbody>

<?php

include("../backend/liste_articles_backend.php");
foreach ($tableau_articles_acceptes as $article)
{
    ?> <tr> <td> <?php echo ($article["ID_ART"]);?> </td> <?php
    ?> <td> <?php echo ($article["TITRE_ART"]);?> </td> <?php
    ?> <td> <?php echo ($article["DESCR_ART"]);?> </td> <?php
    ?> <td> <?php echo ($article["DATE_PROP_ART"]);?> </td> <?php
    ?> <td> <?php echo ($article["DATE_DERNIER_TT_ART"]);?> </td> <?php
    ?> <td> <?php echo ($article["LIBELLE_CATEG"]);?> </td> </tr> <?php
};
?>
</tbody>
</body>
</html>