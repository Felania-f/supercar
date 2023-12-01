<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Shop</title>
  <link rel="icon" href="../Image/icon1.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="../Css/Evenement.css" />
  <link rel="stylesheet" href="../Css/Navbar.css">
  <link rel="stylesheet" href="../Css/Footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-9X3q2Y1+D/7VkcE+mRjL7Jz2cTfjJbR8Gx9XVGvY04ER0ZJjLs8Wwq0sD4yKjDh1i4/aW0myX29vHkOiy/oZLQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
      $nom = $_SESSION['nom'];
      $prenom = $_SESSION['prenom'];
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

  <?php
  include('db_connection.php');

  // Retrieve cars from database
  $sql = "SELECT * FROM evenement";
  $result = $conn->query($sql);

  echo "<font color='white' size='5px'>
          <center><br><br><br><br>
        <h1>Les Événements où nous participons</h1>
      </center>
    
    <table cellspacing='30' width='90%'>";

  while ($row = mysqli_fetch_assoc($result)) {

    $image = $row["Image"];
    $petit_txt = $row["Petit_txt"];
    $id = $row["id_eve"];


    echo "<tr><td align='justify'>
      <div class='container'>
        <img src='$image' class='img'>
    
          <div class='overlay' align='center'>
            <a href='eve_spec.php?id_eve=$id'>
              <div class='bn5'>En savoir plus</div>
            </a>  
    
          </div>
      </div>
    </td >

    <td>
        $petit_txt  
    </td>
    </tr>";
  }
  echo "</table>";
  ?>

  <div class="footer-basic">

    <footer>

      <div class="line">

        <ul class="social_icon">



          <li><a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon></a></li>

          <li><a href="https://www.twitter.com"><ion-icon name="logo-twitter"></ion-icon></a></li>

          <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>

          <li><a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon></a></li>

        </ul>

        <UL class="menus">

          <li><a href="Privacy.html">Politique de Confidentialité</a></li>

          <li><a href="../HTML/mentionlegale.html">Mention légale</a></li>

        </UL>

        <p> ©2023 SuperCar | Le meilleur pour vous</p>

    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



  </div>

<?php 
//Mettre a jour le nombre de visiteurs dans la table 'visiteurs'
$sqlUpdate = "UPDATE visiteurs SET nombre_visiteurs = nombre_visiteurs + 1;";
$conn->query($sqlUpdate);

//Sélectionnez le nombre total de vue
$sqlSelect = "SELECT nombre_visiteurs FROM visiteurs;";
$result = $conn->query($sqlSelect);
$row = $result->fetch_assoc();
$nombreVisiteurs = $row['nombre_visiteurs'];

//Affichage du nombre total de visiteurs
echo "<p>Nombre total de visiteurs : $nombreVisiteurs</p>";

//Fermez la connexion à la base de données
$conn->close();
?>

<?php
// // Augmenter le compteur de visiteurs
// $sqlUpdate = "INSERT INTO visiteurs (nombre_visiteurs) VALUES (1) ON DUPLICATE KEY UPDATE nombre_visiteurs = nombre_visiteurs + 1;";
// $conn->query($sqlUpdate);

// // Récupérer le nombre total de visiteurs par COUNT
// $sqlSelect = "SELECT COUNT(*) AS total_visiteurs FROM visiteurs;";
// $resultTotal = $conn->query($sqlSelect);
// $rowTotal = $resultTotal->fetch_assoc();
// $totalVisiteurs = $rowTotal['total_visiteurs'];
// echo "<p>Nombre total de visiteurs : $totalVisiteurs</p>";
// $conn->close();
?>
</body>

</html>