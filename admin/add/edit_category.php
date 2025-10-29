<?php //we get the values from database and assign it to the variables
    require('../functions.php');
    session_start();
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"lms");
    $cat_name="";
    $cat_id="";
    $cid = isset($_GET['cid']) ? (int)$_GET['cid'] : 0;
    $query = "SELECT * FROM category WHERE cat_id=$cid";
    $query_run = mysqli_query($connection, $query);
    // ... Handle mysqli errors if any
    //where the book_no is the book number that we get in the url when we click Delete
    $query_run=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($query_run))
    {
        $cat_name=$row['cat_name'];
        $cat_id=$row['cat_id'];
    }
    
    if(isset($_POST['update'])) {
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $cid = isset($_GET['cid']) ? (int)$_GET['cid'] : 0;
    $cat_name = $_POST['cat_name'];

    // Only update the name
    $query = "UPDATE category SET cat_name='$cat_name' WHERE cat_id=$cid";
    $query_run = mysqli_query($connection, $query);

    header("location:manage_cat.php");
    exit();
}

?>
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
        <link rel="stylesheet" type="text/css" href="../../bootstrap-4.4.1/css/bootstrap.min.css">
        <script type="text/javascript" src="../../bootstrap-4.4.1/js/jquery_latest.js"></script>
        <script type="text/javascript" src="../../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../admin_dashboard.php">Library Management System</a>
                </div>
                <font style="color:white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
                <font style="color:white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></span></font>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../view_profile.php">View Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../edit_profile.php">Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../change_password.php">Change Password</a>
                        </div>
		            </li>
                    <li class="nav-item dropdown"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>   
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: #82b6dcff;">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../admin_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Books</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add_book.php">Add New Book</a>
                            <a class="dropdown-item" href="manage_book.php">Manage Books</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add_cat.php">Add New Category</a>
                            <a class="dropdown-item" href="manage_cat.php">Manage Category</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add_author.php">Add New Author</a>
                            <a class="dropdown-item" href="manage_author.php">Manage Author</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="issue_book.php">Issue Book</a>
                    </li>
                </ul>
            </div>      
        </nav>
        <span style="color:red;"><marquee>Make sure the author details are correct before adding them</marquee></span><br><br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="post">
             
                    <div class="form-group">
                        <label>Categroy Name</label>
                        <input type="text" name="cat_name" value="<?php echo $cat_name;?>"class="form-control" required="">
                    </div>
                    
                    

                    <button name="update" class="btn btn-primary">Update Category</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>


