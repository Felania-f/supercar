<?php

// Connect to the database
include('db_connection.php');

// Retrieve the car information based on the ID in the query parameter
$id = $_GET['Id_Voiture'];
$sql = "SELECT * FROM voiture WHERE Id_Voiture = $id";
$result = mysqli_query($conn, $sql);
$car = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        <?php echo $car['Marque']; ?>My Shop
    </title>
    <link rel="stylesheet" href="../Css/spec.css">
    <link rel="icon" href="../Image/icon1.png" type="image/x-icon">
    <link rel="stylesheet" href="../Css/Navbar.css">
    <link rel="stylesheet" href="../Css/Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-9X3q2Y1+D/7VkcE+mRjL7Jz2cTfjJbR8Gx9XVGvY04ER0ZJjLs8Wwq0sD4yKjDh1i4/aW0myX29vHkOiy/oZLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body bgcolor="black">

<?php include('header.php'); ?>

    <main class="container">

        <!-- Left Column / Headphones Image -->
        <div class="left-column">
            <img src="<?php echo $car['Image']; ?>" alt="<?php echo $car['Marque']; ?>">
        </div>

        <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <span>
                    <?php echo $car['Marque']; ?>
                </span>
                <h1>
                    <?php echo $car['Modele']; ?>
                </h1>
                <p>
                    <?php echo $car['Specification']; ?>
                </p>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <span>
                    <?php echo $car['Prix']; ?>
                </span>
                <?php echo "<a href='Demande_essai1.php?Id_Voiture=$id'" ?> class="cart-btn">Demande d'essai</a>
            </div>

        </div>

    </main>
    <br><br>
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

                    <li><a href="mentionlegale.html">Mention légale</a></li>

                </UL>

                <p> ©2023 SuperCar | Le meilleur pour vous</p>

        </footer>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



    </div>
    </div>
</body>

</html>