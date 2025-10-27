<?php
require('functions.php');
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
        <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
        <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin_dashboard.php">Library Management System</a>
                </div>
                <font style="color:white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
                <font style="color:white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></span></font>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="view_profile.php">View Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="change_password.php">Change Password</a>
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
                        <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Books</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add/add_book.php">Add New Book</a>
                            <a class="dropdown-item" href="add/manage_book.php">Manage Books</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add/add_cat.php">Add New Category</a>
                            <a class="dropdown-item" href="add/manage_cat.php">Manage Category</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add/add_author.php">Add New Author</a>
                            <a class="dropdown-item" href="add/manage_author.php">Manage Author</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add/issue_book.php">Issue Book</a>
                    </li>
                </ul>
            </div>      
        </nav>
        <span><marquee>Hello Admin!!</marquee></span><br><br>
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-light" style="width: 300px;">
                    <div class="card-header">Registered Users</div>
                    <div class="card-body">
                        <p class="card-text">No. of total users: <?php echo get_user_count();?></p>
                        <a href="view/RegUsers.php" class="btn btn-danger" target="_blank">View Users</a>
                    </div> 
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light" style="width: 300px;">
                    <div class="card-header">Registered Books</div>
                    <div class="card-body">
                        <p class="card-text">No. of available books: <?php echo get_book_count();?></p>
                        <a href="view/RegBooks.php" class="btn btn-danger" target="_blank">View Books</a>
                    </div> 
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light" style="width: 300px;">
                    <div class="card-header">Book Category</div>
                    <div class="card-body">
                        <p class="card-text">No. of book categories: <?php echo get_category_count();?></p>
                        <a href="view/RegCats.php" class="btn btn-primary" target="_blank">View Categories</a>
                    </div> 
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light" style="width: 300px;">
                    <div class="card-header">Registered Authors</div>
                    <div class="card-body">
                        <p class="card-text">Available Authors <?php echo get_author_count();?></p>
                        <a href="view/RegAuth.php" class="btn btn-info" target="_blank">View Authors</a>
                    </div> 
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-light" style="width: 300px;">
                    <div class="card-header">Issued Bookss</div>
                    <div class="card-body">
                        <p class="card-text">No. of issued books <?php echo get_issued_count();?></p>
                        <a href="view/IssuedBooks.php" class="btn btn-success" target="_blank">Issued Books</a>
                    </div> 
                </div>
            </div>
        </div>
    </body>
</html>
