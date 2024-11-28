<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Ajout d'un article</title>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Métier que vous souhaitez présenter</h3>
          <h5>Compléter le formulaire ci-dessous</h5>
        </div>
        <div class="card-body">
          <form action="../backend/ajout_article_backend.php" method="post">
            <div class="form-group">
              <label for="titre">Titre :</label>
              <input type="text" class="form-control" id="titre" placeholder="titre" required>
            </div>
            <!-- ajouter une case pour saisir la description -->
            <div class="form-group">
              <label for="description">Description :</label>
              <input type="text" class="form-control" id="description" placeholder="description" required>
            </div>

            <!-- ajouter une case pour saisir le salaire -->
            <div class="form-group">
              <label for="salaire">Salaire :</label>
              <input type="text" class="form-control" id="salaire" placeholder="salaire" required>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Soumettre</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>