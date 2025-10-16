<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
$email = $_SESSION['email'];

if ($new_password != $confirm_password) {
    echo "<script>alert('New and Confirm Passwords do not match!'); window.location.href='change_password.php';</script>";
    exit();
}

$query = "SELECT * FROM user WHERE email='$email' AND password='$old_password'";
$query_run = mysqli_query($connection, $query);

if (mysqli_num_rows($query_run) > 0) {
    $update_query = "UPDATE user SET password='$new_password' WHERE email='$email'";
    $update_run = mysqli_query($connection, $update_query);

    if ($update_run) {
        echo "<script>alert('Password changed successfully!'); window.location.href='user_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error updating password!'); window.location.href='change_password.php';</script>";
    }
} else {
    echo "<script>alert('Old password is incorrect!'); window.location.href='change_password.php';</script>";
}
?>
