<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="icon" href="../Image/icon1.png" type="image/x-icon">
    <link rel="stylesheet" href="../Css/4x4.css" />
    <link rel="stylesheet" href="../Css/Navbar.css">
    <link rel="stylesheet" href="../Css/Footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-9X3q2Y1+D/7VkcE+mRjL7Jz2cTfjJbR8Gx9XVGvY04ER0ZJjLs8Wwq0sD4yKjDh1i4/aW0myX29vHkOiy/oZLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body bgcolor="black">

<?php include('header.php'); ?>

    <?php

    // Connect to the database
    include('db_connection.php');

    // Retrieve the car information based on the ID in the query parameter
    $id = $_GET['id_eve'];
    $sql = "SELECT * FROM evenement WHERE id_eve = $id";
    $result = mysqli_query($conn, $sql);
    $evenement = mysqli_fetch_assoc($result);
    ?>

    <center>
        <video src="<?php echo $evenement['Video']; ?>" autoplay loop muted width="900" height="500">

        </video>
    </center>
    <div class="espace">
        <table>
            <tr>
                <th colspan="2" align="left" height="1px">
                    <?php echo $evenement['Titre']; ?>
                </th>
            </tr>

            <tr height="0px">
                <td><img src="../Image/MicrosoftTeams-image (8).png" width="400px" height="4px">
                </td>
                <td></td>
            </tr>
        </table>
    </div>
    <center>
        <div class="texte">
            <h1>
                <?php echo $evenement['Petit_titre']; ?>
            </h1>
            <?php echo $evenement['Texte']; ?>
        </div>


    </center>

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

</body>

</html>