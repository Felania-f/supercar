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

    <div class="container mt-4" STYLE="margin-right:11.8em;">
        <a class="btn btn-primary" href="dash.php">Retour</a>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="my-4">Gestion - Demandes d'essai
            </h1>
        </div>

        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Idvoiture</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>Détails</th>
                    <th>Date</th>
                    <th>Heure Début</th>
                    <th>Heure de Fin</th>
                    <th>Status</th>
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
                $sql = "SELECT * FROM demande";
                $result = mysqli_query($conn, $sql);

                // Output the table
                while ($row = mysqli_fetch_assoc($result)) {
                    // echo "<tbody><tr>";
                    echo "<tr><td>" . $row["ID_demande"] . "</td>"; // Replace "ID" with the appropriate column name from your database
                    echo "<td>" . $row["nom"] . "</td>";
                    echo "<td>" . $row["prenom"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["Id_Voiture"] . "</td>";
                    echo "<td>" . $row["marque"] . "</td>";
                    echo "<td>" . $row["modele"] . "</td>";
                    echo "<td>" . $row["details"] . "</td>";
                    echo "<td>" . $row["date1"] . "</td>";
                    echo "<td>" . $row["heure1"] . "</td>";
                    echo "<td>" . $row["heure2"] . "</td>";
                    echo "<td>" . $row["Statuts1"] . "</td>";
                    echo "<td><a href='edit_demande.php?ID_demande=" . $row["ID_demande"] . "'><i class='fas fa-edit'></i></a>&ensp;<a href='delete_demande.php?ID_demande=" . $row["ID_demande"] . "'><i class='fas fa-trash-alt' onclick='return confirm(\"Etes vous sûre de vouloir supprimer la demande?\");'></i></a></td></tr>";
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