<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Voiture</title>
            <link rel="stylesheet" href="../Css/admin/add_voiture.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        </head>

        <body>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        function imageUploader($imageClass)
                        {
                            if ($_FILES[$imageClass]['error'] === 0) {
                                $targetDir = "../Image/";
                                $targetFile = $targetDir . basename($_FILES[$imageClass]['name']);

                                // Déplacer le fichier téléchargé vers le dossier "uploads"
                                if (move_uploaded_file($_FILES[$imageClass]['tmp_name'], $targetFile)) {
                                    echo $targetFile;
                                    return $targetFile;
                                } else {
                                    echo "Erreur lors de l'upload de $imageClass.";
                                }
                            }
                        }
                        // étape 1 : Connexion à la base de données
                        include 'database_connection.php';

                        // étape 2 : Récupération des données du formulaire en utilisant la méthode POST
                        var_dump($_POST);

                        $Marque = $_POST['Marque'];
                        $Modele = $_POST['Modele'];
                        $idcategorie = $_POST['idcategorie'];
                        $Annee = $_POST['Annee'];
                        $Specification = $_POST['Specification'];
                        $Prix = $_POST['Prix'];

                        // étape 3 : Validation et nettoyage des données
                        $Marque = mysqli_real_escape_string($conn, $Marque);
                        $Modele = mysqli_real_escape_string($conn, $Modele);
                        $idcategorie = mysqli_real_escape_string($conn, $idcategorie);
                        $Annee = mysqli_real_escape_string($conn, $Annee);
                        $Specification = mysqli_real_escape_string($conn, $Specification);
                        $Prix = mysqli_real_escape_string($conn, $Prix);
                        $image = imageUploader('Image');
                        $sql = "INSERT INTO voiture (Marque, Modele, idcategorie, Annee, Specification, Prix, Image)
                    VALUES ('$Marque', '$Modele','$idcategorie', '$Annee', '$Specification', '$Prix', '$image')";

                        if (mysqli_query($conn, $sql)) {
                            // Message de réussite
                            $_SESSION['insertion_reussie'] = "Insertion du véhicule réussie";
                            // Rediriger vers la page des utilisateurs après une insertion réussie
                            header("Location: Voiture.php");
                            exit(); // Assurez-vous de quitter le script pour empêcher toute exécution supplémentaire
                        } else {
                            echo "Erreur lors de l'ajout du véhicule : " . mysqli_error($conn);
                        }
                        // Fermeture de la connexion à la base de données
                        $conn->close();
                    }
                ?>
                <?php
                    if (isset($_SESSION['insertion_reussie'])) {
                        echo "<div class='insertion-reussie'>" . $_SESSION['insertion_reussie'] . "</div>";
                        unset($_SESSION['insertion_reussie']); // Supprimer la variable de session après l'affichage
                    }
                ?>
                <div class="containe mt-4" id="add_voiture">
                    <section class="section1">
                        <div class="reservation">
                            <h1>Ajouter nouveau voiture</h1>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="insertion">
                                        <label>Marque:</label>
                                        <input type="text" name="Marque" required>                 
                                    </div>
                                    <div class="insertion">
                                        <label>Modèle:</label>
                                        <input type="text" name="Modele" required>
                                    </div>
                                    <div class="insertion">
                                        <label>Categorie:</label>
                                        <input type="text" name="idcategorie" required>                 
                                    </div>
                                    <div class="insertion">
                                        <label>Année:</label>
                                        <input type="text" name="Annee" required>                 
                                    </div>
                                    <div class="insertion">
                                        <label>Spécification:</label>
                                        <input type="text" name="Specification" required>                  
                                    </div>
                                    <div class="insertion">
                                        <label>Prix:</label>
                                        <input type="text" name="Prix" required>                  
                                    </div>
                                    <div class="insertion">
                                        <label>Image:</label>
                                        <input type="file" id= "image" name="Image" required>               
                                    </div>

                                    <div class="button-group">
                                        <input type="submit" name="valider" value="Valider">
                                        <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Annuler</button>
                                    </div>                
                                </form>
                        </div><br>
                    </section>
                </div>
                <script>
                    function cancelEdit() {
                    // Redirect back to the profile page without the edit parameter
                    window.location.href = 'voiture.php';
                }
                </script>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
    </html>