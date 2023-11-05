<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Admin</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

            <div class="container mt-4">
                <a class="btn btn-primary" href="dash.php">Retour</a>
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="my-4">Gestion des voitures</h1>
                    <a class="btn btn-primary" href="add_voiture.php">
                        <i class="fas fa-plus"></i> Ajouter voiture
                    </a>
                </div>

            <table class="table table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Catégorie</th>
                        <th>Année</th>
                        <th>Spécifications</th>
                        <th>Image</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
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

                    // Query the database
                    $sql = "SELECT * FROM voiture";
                    $result = mysqli_query($conn, $sql);

                    // Output the table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["Id_Voiture"] . "</td>";
                        echo "<td>" . $row["Marque"] . "</td>";
                        echo "<td>" . $row["Modele"] . "</td>";
                        echo "<td>" . $row["idcategorie"] . "</td>";
                        echo "<td>" . $row["Annee"] . "</td>";
                        echo "<td>" . substr($row["Specification"], 0, 40);
                        if (strlen($row["Specification"]) > 40) {
                            echo "...";
                        }
                        echo "</td>";
                        echo "<td><img src='../Image/" . $row["Image"] . "' alt='Image de la voiture' style='max-width: 100px; max-height: 100px;' /></td>";
                        echo "<td>" . $row["Prix"] . "</td>";
                        echo "<td><a href='edit_voiture.php?Id_Voiture=" . $row["Id_Voiture"] . "'><i class='fas fa-edit'></i></a>&ensp;<a href='delete_voiture.php?Id_Voiture=" . $row["Id_Voiture"] . "'><i class='fas fa-trash-alt' onclick='return confirm(\"Etes vous sûre de vouloir supprimer la demande?\");'></i></a></td></tr>";
                        echo "</tr>";
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
    </html>
