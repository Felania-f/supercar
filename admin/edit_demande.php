<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin</title>

            <!-- Custom Css -->
            <link rel="stylesheet" href="../Css/admin/custum.css">

                <?php
                    // Change these variables to match your database configuration
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "supercar";

                    // Create connection
                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // Check if the form has been submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Retrieve the form data
                        $id = $_POST["Id_demande"];
                        $Status1 = $_POST["Status1"];

                    
                        
                        // Update the record in the database
                        $sql = "UPDATE demande SET Statuts1='$Status1' WHERE ID_demande='$id'";
                        if (mysqli_query($conn, $sql)) {
                            header("location: demande.php");
                            exit();
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    } else {
                        // Retrieve the record to be edited
                        $id = $_GET["ID_demande"];
                            $sql = "SELECT * FROM demande WHERE ID_demande='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_assoc($result);
                            $nom = $row["nom"];
                            $prenom = $row["prenom"];
                            $email = $row["email"];
                            $marque = $row["marque"];
                            $modele = $row["modele"];
                            $details = $row["details"];
                            $date1 = $row["date1"];
                            $heure1 = $row["heure1"];
                            $heure2 = $row["heure2"];
                            $Status1 = $row["Statuts1"];
                        } else {
                            echo "Record not found";
                        }
                    }

                    // Close connection
                    mysqli_close($conn);
                ?>
        <body>
            <div class="container" id="edit_demande">
                <h1>Modification - Demande</h1>
                <div class="profile-form">
                    <form id="show_demande" method="post" action="edit_demande.php">
                        <input type="hidden" name="Id_demande" value="<?php echo $id; ?>">
                        <table>
                                    <!-- Nom -->
                                    <div class="form-group">
                                        <label for="nom">Nom:</label>&ensp;
                                        <span id="nom"><?php echo $nom; ?></span>
                                    </div>
                               
                                    <!-- Prénom -->
                                    <div class="form-group">
                                        <label for="prenom">Prénom(s):</label>&ensp;
                                        <span id="prenom"><?php echo $prenom; ?></span>
                                    </div>
                                
                                    <!-- Adresse Mail -->
                                    <div class="form-group">
                                        <label for="email">Adresse Mail:</label>&ensp;
                                        <span id="email"><?php echo $email; ?></span>
                                    </div>
                                
                                    <!-- Marque -->
                                    <div class="form-group">
                                        <label for="marque">Marque:</label>&ensp;
                                        <span id="marque"><?php echo $marque; ?></span>
                                    </div>
                                
                                    <!-- Modèle -->
                                    <div class="form-group">
                                        <label for="modele">Modèle:</label>&ensp;
                                        <span id="modele"><?php echo $modele; ?></span>
                                    </div>
                                
                                    <div class="form-group">
                                        <label>Date:</label>&ensp;
                                        <span name="date1"> <?php echo $date1; ?></span>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="heure1">Heure début:</label>&ensp;
                                        <span id="heure1"><?php echo $heure1; ?></span>
                                    </div>
                            
                                    <!-- Heure 2 -->
                                    <div class="form-group">
                                        <label for="heure2">Heure fin:</label>&ensp;
                                        <span id="heure2"><?php echo $heure2; ?></span>
                                    </div>

                                    <!-- Détails -->
                                    <div class="form-group">
                                        <label for="details">Détails:</label>&ensp;
                                        <span id="details"><?php echo $details; ?></span>
                                    </div>
                                
                        </table>
                        <!-- Statut -->
                        <div class="form-group">
                            <label for="Status1">Statut:</label>&ensp;
                            <select id="Status1" name="Status1">
                                <option value="En cours" <?php if ($Status1 === "En cours") echo "selected"; ?>>En cours</option>
                                <option value="Confirmé" <?php if ($Status1 === "Confirmé") echo "selected"; ?>>Confirmé</option>
                                <option value="Terminé" <?php if ($Status1 === "Terminé") echo "selected"; ?>>Terminé</option>
                            </select>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                function cancelEdit() {
                // Redirect back to the profile page without the edit parameter
                window.location.href = 'demande.php';
            }
            </script>
        </body>
    </html>
