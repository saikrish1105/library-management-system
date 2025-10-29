<?php
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"lms");
    $aid = isset($_GET['aid']) ? (int)$_GET['aid'] : 0; // or use intval for casting safely
    $query = "DELETE FROM author WHERE author_id=$aid";
    $query_run=mysqli_query($connection,$query);
?>
<script type="text/javascript">
    alert("Author Deleted...");
    window.location.href="manage_author.php";
</script>