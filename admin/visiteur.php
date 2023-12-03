<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Evènements</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
<?php include('navbar.php'); ?>
    <div class="container mt-4">
        <a class="btn btn-primary" href="dash.php">Retour</a>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="my-4">Nombre de visiteurs - Evènement</h1>
        </div>
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th class="id_contact">Nombre de visiteurs</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Change these variables to match your database configuration
                include 'database_connection.php';


                $sql = "SELECT * FROM visiteurs";
                $result = mysqli_query($conn, $sql);

                 // Récupérer le nombre total de visiteurs en utilisant COUNT
                //  $sqlSelect = "SELECT COUNT(*) AS total_visiteurs FROM visiteurs;";
                //  $resultTotal = $conn->query($sqlSelect);
                //  $rowTotal = $resultTotal->fetch_assoc();
                //  $totalVisiteurs = $rowTotal['total_visiteurs'];

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td class='nombre_visiteurs'>" . $row["nombre_visiteurs"] . " vue(s)</td>";
                    
                    // Afficher "Nombre total de visiteurs"
                    // echo "<td colspan='2'>$totalVisiteurs vue(s)</td>";
                    echo "</tr>";
                }
                               
                // Fermer la connexion à la base de données
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