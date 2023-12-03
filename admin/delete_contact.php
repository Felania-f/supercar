<?php
include 'database_connection.php';

// Check if idcontact parameter is set
if (isset($_GET['idcontact'])) {
    $idcontact = $_GET['idcontact'];

    // Prepare a DELETE statement
    $sql = "DELETE FROM contact WHERE idcontact = $idcontact";

    if (mysqli_query($conn, $sql)) {
        echo "Contact deleted successfully.";
    } else {
        echo "Error deleting contact: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);

// Redirect back to the page where you display the table
header("Location: contact.php"); // Change 'admin.php' to your actual page name
?>