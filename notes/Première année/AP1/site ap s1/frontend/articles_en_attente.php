<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>articles en attente</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets\css\main.css" />
</head>
<body>

<table>
  <thead>
    <tr>
        <th>Identifiant</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Date de proposition</th>
        <th>Date du dernier traitement</th>
        <th>Catégorie</th>
    </tr>
  </thead>
  <tbody>

<?php

include("../backend/liste_articles_backend.php");
foreach ($tableau_articles_en_attente as $article)
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