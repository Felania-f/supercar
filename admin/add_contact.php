<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajouter contact</title>
    <link rel="stylesheet" href="../Css/admin/custum.css">
</head>

<body>
    <div class="container" id="ajouter_contact">
        <h1>Ajouter Contact</h1>
        <div class="profile-form">
            <form method="post" action="process_add_contact.php" id="add_contact">
                <div class="form-group">
                    <label for="nom_complet">Nom et prénom(s):</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message(s):</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Annuler</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function cancelEdit() {
            // Redirect back to the profile page without the edit parameter
            window.location.href = 'contact.php';
        }
    </script>
</body>

</html>