<?php
    require('../functions.php');
    session_start();
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");
    $book_name = "";
    $author = "";
    $book_no = "";
    $student_name = "";

    $query = "select i.book_name,i.book_author,i.book_no,u.name from issued_book i left join user u on i.student_id=u.id";
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
                    <li class="nav-item dropdown"><a class="nav-link" href="../logout.php">Logout</a></li>
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
                            <a class="dropdown-item" href="../add/add_book.php">Add New Book</a>
                            <a class="dropdown-item" href="../add/manage_book.php">Manage Books</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../add/add_cat.php">Add New Category</a>
                            <a class="dropdown-item" href="../add/manage_cat.php">Manage Category</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../add/add_author.php">Add New Author</a>
                            <a class="dropdown-item" href="../add/manage_author.php">Manage Author</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../add/issue_book.php">Issue Book</a>
                    </li>
                </ul>
            </div>      
        </nav>
        <span><marquee>Refresh the page to see all the current users</marquee></span><br><br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form>
                    <table class="table table-bordered" width="900px" style="text-align:center">
                        <tr>
                            <th>Book Name</th> 
                            <th>Author</th>
                            <th>Book Number</th>
                            <th>Student Name</th>
                        </tr>
                        <?php
                            $query_run = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_array($query_run)){
                                $book_name = $row['book_name'];
                                $book_author = $row['book_author'];
                                $book_no = $row['book_no'];
                                $student_name = $row['name'];
                                ?>
                                <tr>
                                    <td><?php echo $book_name;?></td>
                                    <td><?php echo $book_author;?></td>
                                    <td><?php echo $book_no;?></td>
                                    <td><?php echo $student_name;?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </table>
                </form>
            </div>    
            <div class="col-md-2"></div>
        </div>
    </body>
</html>