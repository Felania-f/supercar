<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>home</title>
            <link rel="stylesheet" href="../Css/admin/Dash.css">
        </head>
        <body> 
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 5em;">
                <a class="navbar-brand" href="#">SuperCar - Admin Panel</a>
                <div>
                    <?php
                        session_start();
                        if (isset($_SESSION['email'])) {
                            $userEmail = $_SESSION['email'];
                            echo '<span class="user-info"><i class="fas fa-user"></i>&ensp;' . $userEmail . '</span>';
                            echo '<a href="adminConnexion.php"><button class="login">Deconnexion</button></a>';
                        } else {
                            echo '<a href="adminConnexion.php"><button class="login">Connexion</button></a>';
                        }
                    ?>
                </div>
             </nav>

            <div class="container">        
                <a href="accueil.php"><button class="button">Accueil</button></a>
                <a href="evenement.php"><button class="button">Evènements</button></a>
                <a href="contact.php"><button class="button">Contacts</button></a>
                <a href="voiture.php"><button class="button">Voitures</button></a><br>
                <a href="demande.php"><button class="button">Demande D'essai</button></a>
                <a href="utilisateur.php"><button class="button">Utilisateurs</button></a>
            </div>
        </body>
    </html>
