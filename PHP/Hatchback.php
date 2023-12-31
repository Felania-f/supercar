<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My Shop</title>
  <link rel="icon" href="../Image/icon1.png" type="image/x-icon">
  <link rel="stylesheet" href="../Css/Voiture.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Css/searchbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-9X3q2Y1+D/7VkcE+mRjL7Jz2cTfjJbR8Gx9XVGvY04ER0ZJjLs8Wwq0sD4yKjDh1i4/aW0myX29vHkOiy/oZLQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="../Java/searchbar.js"></script>


</head>

<body>
<?php include('header.php'); ?>
  <div class="wholecontainer">
    <form method="POST" action="">
      <br><br><br><br><br>
      <div class="search-box">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit" name="submit">Rechercher</button>
      </div>
    </form>

    <div class="category-container">
      <h2>Categories</h2><br>
      <ul>
        <li><a href="Voiture.php">Toutes</a></li>
        <li><a href="Sport.php">Sport</a></li>
        <li><a href="Hatchback.php">Hatchback</a></li>
        <li><a href="Berline.php">Berline</a></li>
        <li><a href="SUV.php">SUV</a></li>
        <li><a href="4x4.php">4x4</a></li>
      </ul>
    </div>


    <?php
    // Connection à la base de donnée
    include('db_connection.php');

    // Check if the page has been refreshed
    if (isset($_SESSION['refreshed']) && $_SESSION['refreshed'] == true) {
      unset($_SESSION['search_query']);
      $_SESSION['refreshed'] = false;
    }

    if (isset($_GET['reset']) && $_GET['reset'] == 1) {
      unset($_SESSION['search_query']);
      $_SESSION['refreshed'] = true;
    }

    // Handle form submission
    if (isset($_POST['search'])) {
      $search = $_POST['search'];
      $_SESSION['search_query'] = $search;

      // Redirect to avoid form resubmission
      header("Location: " . $_SERVER['PHP_SELF']);
      exit();
    }


    // Retrieve cars from database
    $sql = "SELECT * FROM voiture";
    $result = $conn->query($sql);

    echo "<div class = container>";

    if (isset($_POST['search'])) {
      $search = $_POST['search'];
      $_SESSION['search_query'] = $search;

      // récupérer la requête de recherche de la variable POST
      $query = $_POST['search'];

      // construire la requête SQL pour la recherche
      $sql = "SELECT * FROM voiture WHERE idcategorie = 'Hatchback' AND (Marque LIKE '%$query%' OR Modele LIKE '%$query%' OR Annee LIKE '%$query%')";

      // exécuter la requête SQL
      $result = mysqli_query($conn, $sql);

      // afficher les résultats sous forme de HTML
      if ($result->num_rows > 0) {
        // Output data of each row
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {

          $car_make = $row["Marque"];
          $car_model = $row["Modele"];
          $car_year = $row["Annee"];
          $car_price = $row["Prix"];
          $car_image = $row["Image"];
          $id = $row["Id_Voiture"];

          // Display car using HTML and PHP
    
          if ($count % 3 == 0) {
            echo "<div class='row'>";
          }
          echo "<div class='col-md-4'>";
          echo "<div class='car'>";
          echo "<a href='specs.php?Id_Voiture=$id'>";
          echo "<img src='$car_image' alt='$car_make $car_model'>";
          echo "<h2>$car_make $car_model</h2>";
          echo "<p>$car_year</p>";
          echo "<p>Price: $car_price</p>";
          echo "<br>";
          echo "<div class='button-container'>";
          echo "<button class='info-btn'>Plus D'info</button>";
          echo "</a>";
          echo "<a href='Demande_essai1.php?Id_Voiture=$id'>";
          echo "<button class='test-btn'>Demande d'Essai</button>";
          echo "</a>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          if ($count % 3 == 2) {
            echo "</div>";
          }
          $count++;
        }
        if ($count % 3 != 0) {
          echo "</div>";
        }
      } else {
        echo "No cars found.";
      }
      echo "</div>";

    } else if (isset($_SESSION['search_query'])) {
      // Retrieve the previous search query from the session variable
      $search = $_SESSION['search_query'];

      // Build the SQL query for the previous search
      $sql = "SELECT * FROM voiture WHERE idcategorie = 'Hatchback' AND (Marque LIKE '%$search%' OR Modele LIKE '%$search%' OR Annee LIKE '%$search%')";

      // Execute the SQL query
      $result = mysqli_query($conn, $sql);

      // Display the results as HTML
      echo "<div class = container>";
      if ($result->num_rows > 0) {
        // Output data of each row
        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $car_make = $row["Marque"];
          $car_model = $row["Modele"];
          $car_year = $row["Annee"];
          $car_price = $row["Prix"];
          $car_image = $row["Image"];
          $id = $row["Id_Voiture"];

          // Display car using HTML and PHP
          if ($count % 3 == 0) {
            echo "<div class='row'>";
          }
          echo "<div class='col-md-4'>";
          echo "<div class='car'>";
          echo "<a href='specs.php?Id_Voiture=$id'>";
          echo "<img src='$car_image' alt='$car_make $car_model'>";
          echo "<h2>$car_make $car_model</h2>";
          echo "<p>$car_year</p>";
          echo "<p>Price: $car_price</p>";
          echo "<br>";
          echo "<div class='button-container'>";
          echo "<button class='info-btn'>Plus D'info</button>";
          echo "</a>";
          echo "<a href='Demande_essai1.php?Id_Voiture=$id'>";
          echo "<button class='test-btn'>Demande d'Essai</button>";
          echo "</a>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          if ($count % 3 == 2) {
            echo "</div>";
          }
          $count++;
        }
        if ($count % 3 != 0) {
          echo "</div>";
        }
      } else {
        echo "No cars found.";
      }
      echo "</div>";
    }


    // Close database connection
    $conn->close();
    ?>
<?php include('footer.php'); ?>
</body>

</html>