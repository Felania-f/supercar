<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin</title>
            <link rel="stylesheet" href="../Css/admin/custum.css">
        </head>
        <body>
        <div class="container" id="edit_utilisateur">
            <h1>Affichage Utilisateur</h1>
                <div class="profile-form">
                    <?php
                    // Change these variables to match your database configuration
                    include 'database_connection.php';

                    $id = "";
                    $prenom = "";
                    $nom = "";
                    $email = "";
                    $mot_de_passe = "";
                    $numero_de_telephone = "";
                    $civilite = "";

                    // Check if the form has been submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Retrieve the form data
                        $id_adminconnexion = $_POST["id_adminconnexion"];
                        $email = $_POST["email"];
                        $mot_de_passe = $_POST["mot_de_passe"];

                        // Update the record in the database
                        $sql = "UPDATE admin_connexion SET email='$email',mot_de_passe='$mot_de_passe' WHERE id_adminconnexion='$id'";
                        if (mysqli_query($conn, $sql)) {
                            header("location: utilisateur.php");
                            exit();
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }

                    } else {
                        // Check if the idinscription parameter is set
                        if (isset($_GET["id_adminconnexion"])) {
                            $id = $_GET["id_adminconnexion"];
                            $sql = "SELECT * FROM admin_connexion WHERE id_adminconnexion='$id'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) == 1) {
                                $row = mysqli_fetch_assoc($result);
                                $email = $row["email"];
                                $mot_de_passe = $row["mot_de_passe"];
                            } else {
                                echo "Aucun utilisateur";
                            }
                        } else {
                            echo "id_adminconnexion parameter is missing.";
                        }
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                        <form id="show_user" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="id_adminconnexion" value="<?php echo $id; ?>">

                                <div class="form-group">
                                    <label for="email">E-mail:</label>&ensp;
                                    <span id="email"><?php echo $email; ?></span><br><br>
                                </div>
                            
                                <div class="form-group" style="margin-top: -0.5em;">
                                    <label for="mot_de_passe">Mot De Passe:</label>&ensp;
                                    <span id="mot_de_passe"><?php echo $mot_de_passe; ?></span><br><br>
                                </div>

                            <!-- Add other form fields here -->
                            <div class="button-group">
                                <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Retour</button>
                            </div>
                        </form>
                </div>
        </div>
            <script>
                function cancelEdit() {
                    // Redirect back to the profile page without the edit parameter
                    window.location.href = 'utilisateur.php';
                }
            </script>
        </body>
    </html>