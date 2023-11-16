<?php
include '../Controller/UserC.php';

// Check if the ID parameter is set in the URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $userC = new UserC();
    
    // Call the deleteUser function with the ID retrieved from the URL
    $userC->deleteUser($id);
    
    // Redirect to the user list after deletion
    header('Location: listUsers.php');
    exit();
} else {
    // Handle case where ID is not provided
    echo "User ID not found!";
}
?>
