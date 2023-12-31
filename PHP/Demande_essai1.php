<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="icon" href="../Image/icon1.png" type="image/x-icon">
    <link rel="stylesheet" href="../Css/Demande d'essai.css">
    <link rel="stylesheet" href="../Css/Navbar.css">
    <link rel="stylesheet" href="../Css/Footer1.css">
</head>

<body>

<?php include('header.php'); ?>

        <?php
        session_start();
        if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['idinscription']) && isset($_SESSION['email'])) {
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom'];
            $idinscription = $_SESSION['idinscription'];
            $email = $_SESSION['email'];
            echo "<div  class='dropdown'>
                              <a>$nom $prenom</a>
                              <div class='dropdown-content'>
                              <a href='profile.php'>Profil</a>
                            <a href='deconnexion.php'>Déconnexion</a>
                            </div>
                            </div>";
        } else {
            echo "<div class='login'>
                            <a href='inscription.php'>Connexion</a>
                          </div>";
            echo "<script>
                            window.onload = function() {
                                alert('Please login first.');
                                window.location.href = 'inscription.php';
                            }
                          </script>";
        }

        ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // étape 1 : Connexion à la base de données
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

        // Fetching the ID of the car from the URL parameter
        $idVoiture = $_POST['Id_Voiture'];


        // Fetching the "Modele" value from the database based on the ID
        include('db_connection.php');
        var_dump($Id_Voiture);
        var_dump($_POST);
        $sql = "SELECT Marque, Modele FROM voiture WHERE Id_Voiture = $idVoiture";
        $result = $conn->query($sql);
        var_dump($result);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $modeleFromDB = $row["Modele"];
            $marqueFromDB = $row["Marque"];
        } else {
            $modeleFromDB = "Unknown"; // Default value if no matching car found
            $marqueFromDB = "Unknown";
        }




        // étape 4 : Insertion des données dans la base de données
        $sql = "INSERT INTO demande (idinscription, nom, prenom, email, Id_Voiture, marque, modele, details, date1, date2, heure1, heure2, Statuts1)
    VALUES ('$idinscription','$nom', '$prenom', '$email','$idVoiture', '$marqueFromDB', '$modeleFromDB', '$details', '$date1', '$date2', '$heure1', '$heure2','En cours')";

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

    // Fetching the ID of the car from the URL parameter
    $idVoiture = $_GET['Id_Voiture'];

    // Fetching the "Modele" value from the database based on the ID
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supercar";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT Marque, Modele FROM voiture WHERE Id_Voiture = $idVoiture";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $modeleFromDB = $row["Modele"];
        $marqueFromDB = $row["Marque"];
    } else {
        $modeleFromDB = "Unknown"; // Default value if no matching car found
        $marqueFromDB = "Unknown";
    }

    $conn->close();

    ?>
    <section class="section1">
        <div class="reservation">
            <h1>Demande d'essai</h1>
            <div class="choice" style="margin-top: 2em;">
                <label for="modele"
                    style="color:rgb(146, 142, 142)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modèle
                    :</label>
                <label style="color:rgb(146, 142, 142)">
                    <?php echo $marqueFromDB . " " . $modeleFromDB; ?>
                </label>

            </div>
            <form method="post" action="Demande_essai1.php">

                <div class="insertion">
                    <input type="text" name="details" required>
                    <input type="hidden" name="Id_Voiture" value=<?php echo $_GET['Id_Voiture']; ?>>
                    <span></span>
                    <label>Détails</label>
                </div>
                <div class="andro">
                    <input type="date" name="date1" required>
                    <span></span>
                    <label>Date</label>
                </div>
                <div class="andro">
                    <input type="date" name="date2" required>
                    <span></span>
                    <label>Date de fin</label>
                </div>
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
                </footer>
            </div>
        </div>


        <script src="Java/Accueil.js"></script>
</body>

</html>