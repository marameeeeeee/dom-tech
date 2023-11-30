<?php
require '../config.php';

if(isset($_GET['code'])) {
    $code = $_GET['code'];

    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE confirmation_code = '$code' AND status = 'unconfirmed'");
    if(mysqli_num_rows($result) > 0) {
        // Update user status as confirmed
        mysqli_query($conn, "UPDATE tb_user SET status = 'confirmed' WHERE confirmation_code = '$code'");
        echo "<script> alert('Registration Confirmed. You can now login.'); </script>";
    } else {
        echo "<script> alert('Invalid or Expired Confirmation Code.'); </script>";
    }
} else {
    echo "<script> alert('Invalid Request.'); </script>";
}
?>
