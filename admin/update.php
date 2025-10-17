<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"lms");
$query = "update admin set name='$_POST[name]', email='$_POST[email]', mobile='$_POST[mobile]', address='$_POST[address]' where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection,$query);
$_SESSION['email'] = $_POST['email'];
?>
<script type="text/javascript">
    alert("Profile Updated Successfully...");
    window.location.href = "admin_dashboard.php";
</script>
