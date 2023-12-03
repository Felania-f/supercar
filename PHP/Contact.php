<!--doctype html-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <!--link-stylesheet----------->
    <link rel="icon" href="../Image/icon1.png" type="image/x-icon">
    <link rel="stylesheet" href="../Css/Contact.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-9X3q2Y1+D/7VkcE+mRjL7Jz2cTfjJbR8Gx9XVGvY04ER0ZJjLs8Wwq0sD4yKjDh1i4/aW0myX29vHkOiy/oZLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--using-fontAwesome------------>
</head>
<body>
<?php include('header.php'); ?>

    <div id="grad1">
        <img src="../Image/desktop-wallpaper-bmw-m3-angel-eyes-black-background-black-dark-bmw-m3-iphone.jpg" height="756px" width="310px">
        <!--contact-form-container------------------->
        <section id="contact">
            <!--contact-box------------->
            <div class="contact-box">
                <!--heading---------->
                <div class="c-heading">
                    <h1>Contactez-Nous</h1>
                    <p>Une réponse rapide pour vos attentes</p>
                </div>
                <!--inputs------------------>
                <div class="c-inputs">
                    <form method="post" action="contact.php">
                        <input type="text" placeholder="Nom Complet" name="nom_complet" id="nom_complet" />
                        <input type="email" placeholder="Exemple@gmail.com" name="email" id="email" />
                        <textarea name="message" placeholder="Écrire un Message" name="message" id="message"></textarea>
                        <!--submit-btn----------->
                        <center>
                            <button class="button-87" type="submit">Envoyer</button>
                        </center>
                    </form>
                </div>
            </div>
            <!--map------------------->
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7486.604872986506!2d57.4860461!3d-20.2462881!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c5b1ef2170f63%3A0xd1a78020fc096491!2sMCCI%20BUSINESS%20SCHOOL%20(Mauritius%20Chamber%20of%20Commerce%20and%20Industry)!5e0!3m2!1sfr!2smu!4v1678964030633!5m2!1sfr!2smu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        <img align="right" src="../Image/image.jpg" height="756px" width="310px">
    </div>

    <?php
    include('db_connection.php');

    // Récupération des données du formulaire
    if (!empty($_POST)) {
        $nom_complet = mysqli_real_escape_string($conn, $_POST['nom_complet']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Préparation de la requête SQL pour l'insertion des données du formulaire
        $sql = "INSERT INTO contact (`nom_complet`, `email`, `message`)
                VALUES ('$nom_complet', '$email', '$message')";

        // Exécution de la requête SQL
        if (mysqli_query($conn, $sql)) { // vérifie si la requête a réussi
            header("Location: Accueil.php"); // redirige vers la page d'accueil
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);
    ?>

<?php include('footer.php'); ?>
</body>
</html>
