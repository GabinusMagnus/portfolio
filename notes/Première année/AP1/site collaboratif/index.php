<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site d'une page avec trois catégories et des cartes centrées</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets\css\main.css" />
</head>
<body>
    <a href="frontend/ajout_article.php">Ajoutez un article</a>
    <a href="frontend/connexion_contributeurs.php">Contributeur</a>
<?php
include("templates/navbar.php");

?>


    <!-- Catégorie 1 -->
    <section id="Developpement" class="py-5">
        <div class="container text-center">
            <h2>Developpement</h2>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">UX/UI Designer</h5>
                            <p class="card-text">Contenu de la carte 1-1 de la catégorie 1.</p>
                            <a href="..." class="btn btn-secondary">Aller à Mon Site</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Ingénieur IA</h5>
                            <p class="card-text">Contenu de la carte 1-2 de la catégorie 1.</p>
                            <a href="..." class="btn btn-secondary">Aller à Mon Site</a>                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Developpeur BlockChain</h5>
                            <p class="card-text">Contenu de la Developpeur BlockChain de la catégorie 1.</p>
                            <a href="..." class="btn btn-secondary">Aller à Mon Site</a>                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catégorie 2 -->
    <section id="Réseau" class="py-5">
        <div class="container text-center">
            <h2>Réseau</h2>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Ingénieur Systèmes & Réseaux</h5>
                            <p class="card-text">Contenu de la carte 2-1 de la catégorie 2.</p>
                            <a href="..." class="btn btn-secondary">Aller à Mon Site</a>                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Gestionnaire de Parc Informatique</h5>
                            <p class="card-text">Contenu de la carte 2-2 de la catégorie 2.</p>
                            <a href="..." class="btn btn-secondary">Aller à Mon Site</a>                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class= "card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Carte 2-3</h5>
                            <p class="card-text">Contenu de la carte 2-3 de la catégorie 2.</p>
                            <a href="..." class="btn btn-secondary">Aller à Mon Site</a>                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catégorie 3 -->
    <section id="jeuvideo" class="py-5">
        <div class="container text-center">
            <h2>Jeu vidéo</h2>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Carte 3-1</h5>
                            <p class="card-text">Contenu de la carte 3-1 de la catégorie 3.</p>
                            <a href="..." class="btn btn-secondary">Aller à Mon Site</a>                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Carte 3-2</h5>
                            <p class="card-text">Contenu de la carte 3-2 de la catégorie 3.</p>
                            <a href="..." class="btn btn-secondary">Aller à Mon Site</a>                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Carte 3-3</h5>
                            <p class="card-text">Contenu de la carte 3-3 de la catégorie 3.</p>
                            <a href="..." class="btn btn-secondary">Aller à Mon Site</a>                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inclure les fichiers JavaScript de Bootstrap (jQuery requis) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

