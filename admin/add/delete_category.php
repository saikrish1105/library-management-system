<?php
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"lms");
    $cid = isset($_GET['cid']) ? (int)$_GET['cid'] : 0; // or use intval for casting safely
    $query = "DELETE FROM category WHERE cat_id=$cid";
    $query_run=mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Category Deleted...");
    window.location.href="manage_cat.php";
</script>