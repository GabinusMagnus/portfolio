<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Page de Connexion</title>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="text-center">Connexion</h3>
        </div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="identifiant">Identifiant :</label>
              <input type="text" class="form-control" id="identifiant" placeholder="Entrez votre identifiant" required>
            </div>
            <div class="form-group">
              <label for="motdepasse">Mot de passe :</label>
              <input type="password" class="form-control" id="motdepasse" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
