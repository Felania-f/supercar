<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Navbar</title>
    <link rel="stylesheet" href="../Css/Navbar.css">
   </head>
<body bgcolor="black">
    <nav>
        <div class="logo">
            <a href="../PHP/Accueil.php">
                <img src="../Image/MicrosoftTeams-image.png" alt="Your Logo">
            </a>
        </div>
        <ul class="menu">
            <li><a href="../PHP/Accueil.php">Accueil</a></li>
            <li><a href="../PHP/Voiture.php">Voitures</a></li>
            <li><a href="../PHP/Demande_essai.php">Demande d'essai</a></li>
            <li><a href="../PHP/evenement.php">Évènements</a></li>
            <li><a href="../PHP/Contact.php">Contact</a></li>
        </ul>

        <?php
            session_start();

            if(isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['idinscription']) && isset($_SESSION['email'])) {
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
            }
        ?>
    </nav>
</body>
</html>
