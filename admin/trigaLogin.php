<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .back-button {
            margin: 10px;
        }

        .table-content {
            width: 90%;
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
    <div class="container mt-4">
        <a class="btn btn-primary back-button" href="utilisateur.php">Retour</a>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="my-4">Gestion des contacts</h1>
        </div>
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th class="id_contact">ID</th>
                    <th class="Nom_Prenom">E-mail</th>
                    <th class="email_contact">Authentification</th>
                    <th class="message">Date et heure de connexion</th>
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
                $sql = "SELECT * FROM loginmonitor";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='id'>" . $row["id"] . "</td>";
                    echo "<td class='email'>" . $row["email"] . "</td>";
                    echo "<td class='success'>" . $row["success"] . "</td>";
                    echo "<td class='connectionDate'>" . $row["connectionDate"] . "</td>";
                    // echo "<td>" . substr($row["message"], 0, 30);
                    // if (strlen($row["message"]) > 30) {
                    //     echo "...";
                    // }
                    // echo "</td>";
                    // echo "<td><a href='edit_contact.php?idcontact=" . $row["idcontact"] . "'><i class='fas fa-edit'></i></a>&ensp;<a href='delete_contact.php?idcontact=" . $row["idcontact"] . "'><i class='fas fa-trash-alt' onclick='return confirm(\"Etes vous sûre de vouloir supprimer la demande?\");'></i></a></td></tr>";
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