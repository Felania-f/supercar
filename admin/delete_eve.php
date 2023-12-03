<?php
include 'database_connection.php';

// Check if id_eve parameter is set
if (isset($_GET['id_eve'])) {
    $id_eve = $_GET['id_eve'];

    // Prepare a DELETE statement
    $sql = "DELETE FROM evenement WHERE id_eve = $id_eve";

    if (mysqli_query($conn, $sql)) {
        echo "Evenement effacé avec succès.";
    } else {
        echo "Error deleting contact: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);

// Redirect back to the page where you display the table
header("Location: evenement.php"); // Change 'admin.php' to your actual page name
?>