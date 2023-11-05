<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Connexion</title>
  <link rel="stylesheet" href="../Css/admin/admin_connexion.css">
</head>
<?php
function loginmonitor($connexion, $email, $success = 0)
{
  $sql = "INSERT INTO loginMonitor (email, success) VALUES ('$email', $success)";
  return mysqli_query($connexion, $sql);
}
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "supercar";
// Etablir une connexion avec la base de données
$connexion = mysqli_connect($host, $username, $password, $database);
if (!$connexion) {
  die("Connexion à la base de données a échoué: " . mysqli_connect_error());
}

if (isset($_POST['email'], $_POST['mot_de_passe'])) {
  $email = $_POST["email"];
  $mot_de_passe = sha1($_POST["mot_de_passe"]);
  // extraction du nom de la base de données
  $query = "SELECT * FROM admin_connexion WHERE email='$email' AND mot_de_passe='$mot_de_passe'";
  $curseur = mysqli_query($connexion, $query);
  $num = mysqli_num_rows($curseur);
  // Vérifier si le nom ou le mot de passe existe
  $date = date('Y-m-d', time());
  if ($num == 1) {
    loginmonitor($connexion, $email, 1);
    $row = mysqli_fetch_assoc($curseur);
    $_SESSION['id_adminconnexion'] = $row['id_adminconnexion'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['mot_de_passe'] = $row['mot_de_passe'];
    header("Location:dash.php");
    exit();
  } else {
    loginmonitor($connexion, $email, 0);
    echo '<script>alert("Le mot de passe est incorrect.")</script>';
    header("Location:adminConnexion.php");
    exit();
  }

  // libérer la mémoire
  mysqli_free_result($curseur);
  mysqli_close($connexion);
}
?>

<body>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
  <form action="adminConnexion.php" method="post">
    <div class="container">
      <div class="box">
        <h1>Connecter vous</h1>
        <input type="email" name="email" id="email" placeholder="Email" class="email" required>
        <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" class="password"
          required>
        <button type="submit" class="btn">Se Connecter</button>
      </div>
    </div>
  </form>
</body>

</html>