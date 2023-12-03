<?php
include 'database_connection.php';

// Check if id_adminconnexion parameter is set
if (isset($_GET['id_adminconnexion'])) {
    $id_adminconnexion = $_GET['id_adminconnexion'];

    // Prepare a DELETE statement
    $sql = "DELETE FROM admin_connexion WHERE id_adminconnexion = '$id_adminconnexion'";

    if (mysqli_query($conn, $sql)) {
        echo "Utilisateur supprimé avec succès.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);

// Redirect back to the page where you display the table
header("Location: utilisateur.php"); // Change 'utilisateur.php' to your actual page name
?>