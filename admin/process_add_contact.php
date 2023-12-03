<?php
include 'database_connection.php';

// Retrieve data from the form
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert the new contact into the database
$sql = "INSERT INTO contact (nom_complet, email, message) VALUES ('$full_name', '$email', '$message')";

if (mysqli_query($conn, $sql)) {
    // Redirect to the contact page after successful insertion
    header("Location: contact.php"); // Change 'contact.php' to the actual name of your contact page
    exit(); // Make sure to exit the script to prevent further execution
} else {
    echo "Error adding contact: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>