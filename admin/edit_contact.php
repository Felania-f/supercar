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
                        $id = $_POST["idcontact"];
                        $nom_complet = $_POST["nom_complet"]; // Corrected field name
                        $email = $_POST["email"];
                        $message = $_POST["message"];

                        // Update the record in the database
                        $sql = "UPDATE contact SET nom_complet='$nom_complet', email='$email', message='$message' WHERE idcontact='$id'";
                        if (mysqli_query($conn, $sql)) {
                            header("location: contact.php");
                            exit();
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    } else {
                        // Retrieve the record to be edited
                        $id = $_GET["idcontact"];
                        $sql = "SELECT * FROM contact WHERE idcontact='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_assoc($result);
                            $nom_complet = $row["nom_complet"]; // Corrected field name
                            $email = $row["email"];
                            $message = $row["message"];
                        } else {
                            echo "Record not found";
                        }
                    }

                    // Close connection
                    mysqli_close($conn);
                ?>


            <body>
                <div class="container" id="edit_contact">
                    <h1>Affichage Contact</h1>
                        <div class="profile-form">
                            <form id="show_contact" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="idcontact" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <label for="nom_complet">Nom Complet:</label>&ensp;
                                        <span id="nom_complet"><?php echo $nom_complet; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Adresse Mail:</label>&ensp;
                                        <span id="email"><?php echo $email; ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message:</label>&ensp;
                                        <textarea id="message"><?php echo $message; ?></textarea>
                                    </div>

                                    <!-- Add more fields as needed -->
                                    <div class="button-group">
                                        <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Retour</button>
                                    </div>
                            </form>
                        </div>
                </div>
                    <script>
                        function cancelEdit() {
                        // Redirect back to the profile page without the edit parameter
                        window.location.href = 'contact.php';
                    }
                    </script>
            </body>
    </html>
