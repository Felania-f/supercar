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
            <h1 class="my-4">Gestion des évènements</h1>
            <a class="btn btn-primary" href="add_eve.php">
                <i class="fas fa-plus"></i> Ajouter Evènement
            </a>
        </div>
        <table class="table table-striped" style="text-align: center;">
            <thead>
                <tr>
                    <th class="id_contact">ID</th>
                    <th class="Nom_Prenom">Vidéo</th>
                    <th class="email_contact">Image</th>
                    <th class="Petit_Texte">Petit Texte</th>
                    <th class="Petit_Texte">Petit Titre</th>
                    <th class="texte">Texte</th>
                    <th class="titre">Titre</th>
                    <th class="actions">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Change these variables to match your database configuration
                include 'database_connection.php';

                // Query the database
                $sql = "SELECT * FROM evenement";
                $result = mysqli_query($conn, $sql);

                // Output the table
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id_eve"] . "</td>";
                    echo "<td><video width='140' height='110' autoplay muted loop>
                                        <source src='" . $row["Video"] . "' type='video/mp4'>
                                        Your browser does not support the video tag.
                                    </video></td>";
                    echo "<td><img src='" . $row["Image"] . "' width='140'></td>";
                    echo "<td>" . substr($row["Petit_txt"], 0, 40); // Obtenez les 40 premiers caractères
                    if (strlen($row["Petit_txt"]) > 40) {
                        echo "..."; // Ajoutez des points de suspension si le texte est plus long
                    }
                    echo "</td>";
                    echo "<td>" . substr($row["Petit_titre"], 0, 40); // Obtenez les 40 premiers caractères
                    if (strlen($row["Petit_titre"]) > 40) {
                        echo "..."; // Ajoutez des points de suspension si le texte est plus long
                    }
                    echo "<td>" . substr($row["Texte"], 0, 40); // Obtenez les 40 premiers caractères
                    if (strlen($row["Texte"]) > 40) {
                        echo "..."; // Ajoutez des points de suspension si le texte est plus long
                    }
                    echo "</td>";
                    echo "<td>" . substr($row["Titre"], 0, 40); // Obtenez les 40 premiers caractères
                    if (strlen($row["Titre"]) > 40) {
                        echo "..."; // Ajoutez des points de suspension si le texte est plus long
                    }
                    // echo "<td><a href='edit_eve.php?id_eve=" . $row["id_eve"] . "'><img src='../image/edit.png' width='20px'></a> | <a href='delete_eve.php?id_eve=" . $row["id_eve"] . "'><img src='../image/delete.png' width='20px' onclick='return confirm(\"Etes-vous sure de vouloir effacer cet évènement?\");'></a></td>";
                    echo "<td><a href='edit_eve.php?id_eve=" . $row["id_eve"] . "'><i class='fas fa-edit'></i></a>&ensp;<a href='delete_eve.php?id_eve=" . $row["id_eve"] . "'><i class='fas fa-trash-alt' onclick='return confirm(\"Etes vous sûre de vouloir supprimer la demande?\");'></i></a></td></tr>";
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