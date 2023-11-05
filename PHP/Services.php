<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Shop</title>
        <link rel = "icon" href = "../Image/icon1.png" 
        type = "image/x-icon">
        <link rel="stylesheet" href="../Css/Services.css">
        <link rel="stylesheet" href="../Css/Navbar.css">
        <link rel="stylesheet" href="../Css/Footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-9X3q2Y1+D/7VkcE+mRjL7Jz2cTfjJbR8Gx9XVGvY04ER0ZJjLs8Wwq0sD4yKjDh1i4/aW0myX29vHkOiy/oZLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <?php
  // Connect to the database
  $servername="localhost";
  $username="root";
  $password="";
  $database_name="supercar";

  $conn = new mysqli($servername, $username, $password, $database_name);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Retrieve cars from database
  $sql = "SELECT * FROM caroussel ORDER BY id_update DESC LIMIT 1";
  $result = $conn->query($sql);
  $acc = mysqli_fetch_assoc($result);


?>

        <div class="section1">
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
                  <li><a href="../PHP/evenement.php">Evenements</a></li>
                  <li><a href="../PHP/Contact.php">Contact</a></li>
                </ul>

                <?php
                    session_start();

                    if(isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
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
        </div>

        <table>
            <tr>
                <th>
                    Nos Services
                </th>
            </tr>
            <tr>
                <td>
                    <img src="../Image/white lign.png" width="250px" height="4px">
                </td>
            </tr>
            <tr>
                <td>
                    <br><br><h2>Bienvenue sur le site de SuperCar, votre destination pour trouver la voiture de vos rêves !</h2>
                    <p>
                        Chez SuperCar, nous sommes fiers de fournir à nos clients une sélection de voitures neuves importées de différents pays, y compris le Japon, Singapour, l'Afrique du Sud, les États-Unis, la Chine, l'Allemagne, la France et d'autres. Avec quatre entrepôts situés dans des endroits stratégiques, nous sommes en mesure de répondre à la demande de nos clients en temps opportun.<br><br><br>
            
                        Notre processus de vente est simple et facile. Venez nous rendre visite dans notre siège social situé au centre-ville, choisissez une voiture d'essai et si vous êtes satisfait, nous livrerons la même voiture à votre domicile depuis l'un de nos entrepôts. Nos équipes de vente, de finance et de ressources humaines sont toutes basées dans notre siège social pour garantir un service clientèle exceptionnel.<br><br><br>
            
                        Nous sommes ravis de vous annoncer que nous avons récemment entrepris une transformation numérique en collaborant avec MultiSys, une entreprise spécialisée dans la fourniture de solutions et services informatiques. Notre site web dynamique et informatisé permettra de faciliter vos demandes d'essai de voiture, de simplifier le processus de vente et de garantir une expérience client exceptionnelle.<br><br><br>
            
                        Nous sommes impatients de vous servir chez SuperCar et de vous aider à trouver la voiture de vos rêves. Contactez-nous dès aujourd'hui pour planifier votre essai de voiture ou pour toute question concernant notre gamme de voitures neuves.
                    </p>
                </td>
            </tr>
        
       
        </table>

        <div class="footer-basic">
        <footer>
                <div class="social">
                  
                    <table align="center">
                        <tr>
                            <td width="50" align="center">
                                <a href="https://www.instagram.com/"><img src="../Image/instagram.png" width="25px"></a>
                            </td>
                            <td width="50" align="center">
                                <a href="https://www.facebook.com/"><img src="../Image/facebook.png" width="30px"></a>
                            </td>
                            <td width="50" align="center">
                                <a href="https://www.twitter.com/"><img src="../Image/twitter.png" width="30px"></a>
                            </td>
                        </tr>
                    </table><br><br>
                    <ul class="list-inline">
                     
                    <li class="list-inline-item"><a href="../PHP/Accueil.php">Accueil</a></li>
                          <li class="list-inline-item"><a href="../PHP/Services.php">Services</a></li>
                          <li class="list-inline-item"><a href="../PHP/Privacy.php">Politique de Confidentialité</a></li>
                          <li class="list-inline-item"><a href="../PHP/Contact.php">Contact</a></li>
                 
                    </ul>
                <p class="copyright">SuperCar © 2023</p>
            </footer>
</div>
        
       
    </body>
</html>