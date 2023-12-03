<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajouter un utilisateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php
include 'database_connection.php';

// Récupérer les données du formulaire

if ($_POST) {
    $email = $_POST['email'];
    $mot_de_passe = sha1($_POST['mot_de_passe']);

    $sql = "SELECT * FROM admin_connexion WHERE email='$email'";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_fetch_assoc($result)) {
        echo "user already exists";
    } else {
        if (isset($email) && isset($_POST['mot_de_passe'])) {
            // Préparer la requête SQL d'insertion
            $sql = "INSERT INTO admin_connexion (email, mot_de_passe) 
                                        VALUES ('$email', '$mot_de_passe')";

            if (mysqli_query($conn, $sql)) {
                echo "Utilisateur ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout de l'utilisateur : " . mysqli_error($conn);
            }
        }
    }
    // Fermer la connexion
    mysqli_close($conn);
}
?>

<body>
    <div class="container mt-4">
        <a class="btn btn-primary" href="utilisateur.php">Retour</a>
        <h1 class="my-4">Ajouter un utilisateur</h1>
        <form action="add_utilisateur.php" method="post">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Mot de Passe</label>
                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>