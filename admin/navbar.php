<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <style>
        .navbar-brand {
            margin-right: 54em;
        }
        .user-info {
            margin-right: 2em;
        }
    </style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 5em;">
        <a class="navbar-brand" href="dash.php">SuperCar - Admin Panel</a>
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
</body>
</html>
