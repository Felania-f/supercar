<?php
// Change these variables to match your database configuration
include 'database_connection.php';

// Check if ID_demande is set in the URL
if (isset($_GET['ID_demande'])) {
    $ID_demande = $_GET['ID_demande'];

    // Prepare and execute SQL query to delete the selected demand
    $sql = "DELETE FROM demande WHERE ID_demande = $ID_demande";

    if (mysqli_query($conn, $sql)) {
        echo "La demande a été supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de la demande : " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
} else {
    echo "ID_demande non spécifié.";
}

// Redirect to the demandes page after deletion
header("Location: demande.php");
exit();
?>
