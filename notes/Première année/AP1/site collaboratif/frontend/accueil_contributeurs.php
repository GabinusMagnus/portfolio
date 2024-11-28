<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contributeurs : accueil</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets\css\main.css" />
</head>
<body>

<?php
include("../templates/navbarcontributeurs.php");
// réupération de l'identifiant soumis à la page de connexion
?>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Métier que vous souhaitez présenter</h3    
</div>
<div class="card-body">
  <form action="../backend/connexion_contributeurs_backend.php" method="post">
    <div class="form-group">
      <label for="titre pour le métier">titre pour le métier :</label>
      <input type="text" class="form-control" id="titre pour le métier" placeholder="titre pour le métier" required>
    </div>
    <div class="form-group">
      <label for="description"> description:</label>
      <input type="text" class="form-control" id="description" placeholder="description" required>
    </div>
    <div class="form-group">
      <label for="salaire">salaire :</label>
      <input type="text" class="form-control" id="salaire" placeholder="salaire" required>
    </div>
    <div class="form-group">
    <label for="catégorie du métier">catégorie du métier :</label>
    <input type="text" class="form-control" id="catégorie du métier" placeholder="catégorie du métier" required>
  </div>
    <button type="submit" class="btn btn-primary btn-block">soumettre</button>
  </form>
</div>



<!-- Inclure les fichiers JavaScript de Bootstrap (jQuery requis) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>