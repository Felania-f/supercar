<?php
//session_start();
//?>
<!--<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>

<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #111;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        padding: 15px 16px;
        text-decoration: none;
        font-size: 20px;
    }

    .topnav a[id*="Accueil"]:hover,
    .topnav a[id*="Voitures"]:hover,
    .topnav a[id*="Demande"]:hover,
    .topnav a[id*="Events"]:hover,
    .topnav a[id*="Events"]:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #04AA6D;
        color: white;
    }

    .topnav .icon {
        display: none;
    }

    @media screen and (max-width: 750px) {
        .topnav a:not(:first-child) {
            display: none;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 750px) {
        .topnav.responsive {
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
            margin-top: -0.1em;
        }
    }

    a[id*="Accueil"],
    a[id*="Voitures"],
    a[id*="Demande"],
    a[id*="Events"],
    a[id*="Events"],
    div[class*="dropdown"] {
        margin-top: 1em;
    }

    .dropdown-content a {
        color: black;
    }
</style>

<div class="topnav" id="myTopnav">
    <div class="logo">
        <a href="../PHP/Accueil.php" style="margin-right: 12em;">
            <img src="../Image/MicrosoftTeams-image.png" alt="Your Logo">
        </a>
    </div>
    <a href="../PHP/Accueil.php" id="Accueil">Accueil</a>
    <a href="../PHP/Voiture.php" id="Voitures">Voitures</a>
    <a href="../PHP/Demande_essai.php" id="Demande">Demande d'essai</a>
    <a href="../PHP/evenement.php" id="Events">Évènements</a>
    <a href="../PHP/Contact.php" id="Events" style="margin-right: 2em;">Contact</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>-->
    <?php
    if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        echo "<div class='dropdown'>
                <a><i class='fas fa-user'></i> $nom $prenom</a>
                <div class='dropdown-content'>
                    <a href='profile.php'>Profil</a>
                    <a href='deconnexion.php'>Déconnexion</a>
                </div>
            </div>";
    } else {
        echo "<div class='login'>
                <a href='inscription.php' style='margin-top: 1em;'>Connexion</a>
            </div>";
    }
    ?>
</div> 
