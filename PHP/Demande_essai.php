<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="icon" href="../Image/icon1.png" type="image/x-icon">
    <link rel="stylesheet" href="../Css/Demande d'essai.css">
    <link rel="stylesheet" href="../Css/Footer1.css">
</head>

<body>

<?php include('header.php'); ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include('db_connection.php');

        // étape 2 : Récupération des données du formulaire en utilisant la méthode POST
        $details = $_POST['details'];
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $heure1 = $_POST['heure1'];
        $heure2 = $_POST['heure2'];

        // étape 3 : Validation et nettoyage des données
        $details = mysqli_real_escape_string($conn, $details);
        $date1 = mysqli_real_escape_string($conn, $date1);
        $date2 = mysqli_real_escape_string($conn, $date2);
        $heure1 = mysqli_real_escape_string($conn, $heure1);
        $heure2 = mysqli_real_escape_string($conn, $heure2);

        // étape 4 : Insertion des données dans la base de données
        $sql = "INSERT INTO demande (idinscription, nom, prenom, email, details, date1, date2, heure1, heure2, Status1)
    VALUES ('$idinscription','$nom', '$prenom', '$email', '$details', '$date1', '$date2', '$heure1', '$heure2', 'En cours')";

        if ($conn->query($sql) === TRUE) {
            // étape 5 : Redirection vers une page de confirmation
            header('Location: Accueil.php');
            exit;
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }

        // étape 6 : Fermer la connexion à la base de données
        $conn->close();
    }
    ?>

    <section class="section1">
        <div class="reservation">
            <h1>Demande d'essai</h1>
            <?php
        if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['idinscription']) && isset($_SESSION['email'])) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $idinscription = $_SESSION['idinscription'];
            $email = $_SESSION['email'];
            echo "<div class='dropdown'>
                     <a>$nom $prenom</a>
                  </div>";
        }
        ?>
            <div class="choice" style="margin-top: 2em;">
                <label for="modele"
                    style="color:rgb(146, 142, 142)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modèle
                    :</label>
                <!-- Ajoutez l'attribut id au bouton -->
                <a href="../PHP/Voiture.php">
                    <button id="chooseModelBtn" class="choix" name="chosenModel" value="choice"
                        style='margin-top: -2em;' required>Choisissez un modèle</button>
                </a>

            </div>
            <form method="post" action="Demande_essai1.php" onsubmit="return validateForm()">

                <div class="insertion">
                    <input type="text" name="details" required>
                    <span></span>
                    <label>Détails</label>
                </div>
                <div class="andro">
                    <input type="date" name="date1" required>
                    <span></span>
                    <label>Date</label>
                </div>
                <!-- <div class="andro">
                    <input type="date" name="date2" required>
                    <span></span>
                    <label>Date de fin</label>
                </div> -->
                <div class="ora">
                    <input type="time" name="heure1" required>
                    <span></span>
                    <label>Heure de début</label>
                </div>
                <div class="ora">
                    <input type="time" name="heure2" required>
                    <span></span>
                    <label>Heure de fin</label>
                </div>
                <input type="submit" name="valider" value="Valider">
            </form>
        </div>
        <br /><br /><br /><br /><br />

        <div class="footer-basic1">
            <div class="down">
            <?php include('footer.php'); ?>
            </div>
        </div>

        <script>
        function validateForm() {
            var chosenModel = document.querySelector('#chooseModelBtn').getAttribute('value');
            if (chosenModel === 'choice') {
                alert('Veuillez choisir un modèle de voiture avant de valider la demande.');
                return false; // Annuler la soumission du formulaire
            }
            return true; // Soumettre le formulaire si tout est valide
        }
    </script>
        <script src="Java/Accueil.js"></script>
</body>

</html>
