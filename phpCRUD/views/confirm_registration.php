<?php
require '../config.php';
$conn = config::getConnexion();
if(isset($_GET['code'])) {
    $code = $_GET['code'];

    $stmt = $conn->prepare("SELECT * FROM tb_user WHERE confirmation_code = :code AND status = 'unconfirmed'");
    $stmt->bindParam(':code', $code);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        // Update user status as confirmed
        $updateStmt = $conn->prepare("UPDATE tb_user SET status = 'confirmed' WHERE confirmation_code = :code");
        $updateStmt->bindParam(':code', $code);
        $updateStmt->execute();

        echo "<script> alert('Registration Confirmed. You can now login.'); </script>";
    } else {
        echo "<script> alert('Invalid or Expired Confirmation Code.'); </script>";
    }
} else {
    echo "<script> alert('Invalid Request.'); </script>";
}
?>
