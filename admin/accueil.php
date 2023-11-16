<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .carousel-image {
            max-width: 100px;
            max-height: 100px;
            margin: 0 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Dash.php" style="margin-right: 40em;">SuperCar - Admin Panel</a>
        <div>
            <?php
            session_start();
            if (isset($_SESSION['email'])) {
                $userEmail = $_SESSION['email'];
                echo '<span class="user-info"><i class="fas fa-user"></i>&ensp;' . $userEmail . '</span>';
            } else {
                echo '<a href="adminConnexion.php"><button class="login">Connexion</button></a>';
            }
            ?>
        </div>
    </nav>
    <div class="container" id="accueil" style="margin-bottom: 3em;">
        <h1 class="display-4">Admin-Accueil</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="profile-form">
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

                    mysqli_set_charset($conn, "utf8");

                    // Check if the form has been submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Retrieve the form data
                        $id = $_POST["id_update"];
                        $apdn = $_POST["apdn"];
                        $apdn1 = $_POST["apdn1"];

                        $targetDirectory = "../Image/"; // Créer un répertoire pour stocker les images téléchargées
                    
                        for ($i = 1; $i <= 5; $i++) {
                            $fieldName = "image" . $i;

                            if (isset($_FILES[$fieldName]["name"]) && !empty($_FILES[$fieldName]["name"])) {
                                $targetFile = $targetDirectory . basename($_FILES[$fieldName]["name"]);

                                if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $targetFile)) {
                                    // Téléchargement du fichier réussi, mettez à jour la base de données avec le nouveau chemin de l'image
                                    ${"image" . $i} = $targetFile;
                                } else { // Gérer l'erreur de téléchargement de fichier      
                                    echo "Error uploading file.";
                                }
                            } else { // Aucun nouveau fichier téléchargé, utilisez la valeur du champ current_image  
                                ${"image" . $i} = $_POST["current_" . $fieldName];
                            }
                        }

                        if (isset($_FILES["image_apdn"]["name"]) && !empty($_FILES["image_apdn"]["name"])) {
                            $targetDirectory = "../Image/"; // Create a directory for storing uploaded images
                            $targetFile = $targetDirectory . basename($_FILES["image_apdn"]["name"]);

                            if (move_uploaded_file($_FILES["image_apdn"]["tmp_name"], $targetFile)) {
                                // File upload successful, update the database with the new image path
                                $image_apdn = $targetFile;
                            } else {
                                // Handle file upload error
                                echo "Error uploading file.";
                            }
                        } else {
                            // No new file uploaded, use the value of the current_image1 field
                            $image_apdn = $_POST["current_image6"];
                        }

                        if (isset($_FILES["image_apdn1"]["name"]) && !empty($_FILES["image_apdn1"]["name"])) {
                            $targetDirectory = "../Image/"; // Create a directory for storing uploaded images
                            $targetFile = $targetDirectory . basename($_FILES["image_apdn1"]["name"]);

                            if (move_uploaded_file($_FILES["image_apdn1"]["tmp_name"], $targetFile)) {
                                // File upload successful, update the database with the new image path
                                $image_apdn1 = $targetFile;
                            } else {
                                // Handle file upload error
                                echo "Error uploading file.";
                            }
                        } else {
                            // No new file uploaded, use the value of the current_image1 field
                            $image_apdn1 = $_POST["current_image7"];
                        }

                        // Update the record in the database using prepared statements
                        $sql = "UPDATE caroussel SET image1=?, image2=?, image3=?, image4=?, image5=?, apdn=?, apdn1=?, image_apdn=?, image_apdn1=? WHERE id_update=?";

                        $stmt = mysqli_prepare($conn, $sql);

                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, "ssssssssss", $image1, $image2, $image3, $image4, $image5, $apdn, $apdn1, $image_apdn, $image_apdn1, $id);

                            if (mysqli_stmt_execute($stmt)) {
                                header("location: dash.php");
                                exit();
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Error preparing statement: " . mysqli_error($conn);
                        }
                    } else {
                        // Retrieve the record to be edited
                        $sql = "SELECT * FROM caroussel WHERE id_update=1";
                        $stmt = mysqli_prepare($conn, $sql);

                        if ($stmt) {
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            if (mysqli_num_rows($result) == 1) {
                                $row = mysqli_fetch_assoc($result);
                                $image1 = $row["image1"];
                                $image2 = $row["image2"];
                                $image3 = $row["image3"];
                                $image4 = $row["image4"];
                                $image5 = $row["image5"];
                                $apdn = $row["apdn"];
                                $apdn1 = $row["apdn1"];
                                $image_apdn = $row["image_apdn"];
                                $image_apdn1 = $row["image_apdn1"];
                                $id = $row["id_update"];
                            } else {
                                echo "Record not found";
                            }

                            mysqli_stmt_close($stmt);
                        } else {
                            echo "Error preparing statement: " . mysqli_error($conn);
                        }
                    }
                    mysqli_close($conn);
                    ?>

                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id_update" value="<?php echo $id; ?>">
                        <!-- Add a hidden field to store the current image path -->
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            echo '<input type="hidden" name="current_image' . $i . '" value="' . ${"image" . $i} . '">';
                        }
                        ?>
                        <input type="hidden" name="current_image6" value="<?php echo $image_apdn; ?>">
                        <input type="hidden" name="current_image7" value="<?php echo $image_apdn1; ?>">

                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <div class="form-group">
                                <label for="image<?php echo $i; ?>">Image
                                    <?php echo $i; ?>
                                </label><br>
                                <input type="file" id="image<?php echo $i; ?>" name="image<?php echo $i; ?>"
                                    accept=".jpg, .jpeg, .png, .webp" onchange="previewImage<?php echo $i; ?>(this);">
                                <img class="carousel-image" src="<?php echo ${"image" . $i}; ?>" alt="Image Preview"
                                    width="100">
                            </div>
                        <?php endfor; ?>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="apdn">A propos de nous 1:</label>
                                    <textarea id="apdn" name="apdn" class="form-control"
                                        required><?php echo $apdn; ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="apdn1">A propos de nous 2:</label>
                                    <textarea id="apdn1" name="apdn1" class="form-control"
                                        required><?php echo $apdn1; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="image_apdn">Image pour à propos de nous 1:</label><br>
                                    <input type="file" id="image_apdn" name="image_apdn" accept=".jpg, .jpeg, .png, .webp"
                                        onchange="previewImage6(this);">
                                    <img class="carousel-image" src="<?php echo $image_apdn; ?>" alt="Image Preview"
                                        width="100">
                                </div>
                                <div class="col-md-6">
                                    <label for="image_apdn1">Image pour à propos de nous 2:</label><br>
                                    <input type="file" id="image_apdn1" name="image_apdn1" accept=".jpg, .jpeg, .png, .webp"
                                        onchange="previewImage7(this);">
                                    <img class="carousel-image" src="<?php echo $image_apdn1; ?>" alt="Image Preview"
                                        width="100">
                                </div>
                            </div>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cancelEdit() {
            // Redirect back to the profile page without the edit parameter
            window.location.href = 'dash.php';
        }
    </script>
</body>

</html>