<!doctype html>
    <html>
        <head>
        </head>
        <body>
            <?php
            include("connexion.php");
             // pour les débutants
            // récupération des valeurs saisies par le serveur, méthode POST
            if (isset($_POST['nom']) && (isset($_POST['prenom'])) && (isset($_POST['chemin'])) && (isset($_POST['mdp'])) )
            {
                    $nom_etudiant = $_POST['nom'];
                    $prenom_etudiant = $_POST['prenom'];
                    $chemin_image_etudiant = $_POST['chemin'].'.jpg' ;
                    $mdp = $_POST['mdp'];

                    $stmt = $connexion->prepare("INSERT INTO  etudiant (nom_etudiant, prenom_etudiant, chemin_image_etudiant,mdp_etudiant) VALUES (:nom_etudiant,:prenom_etudiant,:chemin_image_etudiant,:mdp_etudiant)");
                    $stmt->bindParam(':nom_etudiant',  $nom_etudiant);
                    $stmt->bindParam(':prenom_etudiant', $prenom_etudiant);
                    $stmt->bindParam(':chemin_image_etudiant',$chemin_image_etudiant );
                    $stmt->bindParam(':mdp_etudiant',$mdp );
            /*  manière2
            $stmt = $connexion->prepare("INSERT INTO etudiant (nom_etudiant, prenom_etudiant, chemin_image_etudiant,mdp_etudiant) VALUES (?, ?,?,?)");
            $succes=$stmt->execute([$nom_etudiant, $prenom_etudiant, $chemin_image_etudiant,$mdp]);
            */

            
            /*  manière3
            $data = [
                     'nom_etudiant' => $nom_etudiant,
                    'prenom_etudiant' => $prenom_etudiant,
                    'chemin_image_etudiant' => $chemin_image_etudiant,
                    'mdp' => $mdp
                    ];
            $sql = "INSERT INTO users (nom_etudiant, prenom_etudiant, chemin_image_etudiant,mdp) VALUES (:nom_etudiant, :prenom_etudiant, :chemin_image_etudiant,:mdp)";
            $stmt= $connexion->prepare($sql);
            $stmt->execute($data);
          
            */


            
            $succes=$stmt->execute();
            header('Location: ../index.php');  
                }
            ?>
    </body>
</html>

3