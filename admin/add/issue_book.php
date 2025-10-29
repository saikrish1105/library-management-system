<?php
require('../functions.php');
session_start();
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
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../admin_dashboard.php">Library Management System</a>
                </div>
                <font style="color:white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>&nbsp;&nbsp;
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

        <!-- Secondary Navbar -->
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

        <span style="color:red;"><marquee>Make sure the book and author details are correct before issuing</marquee></span><br><br>

        <!-- Issue Book Form -->
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Book Name</label>
                        <select class="form-control" name="book_name" id="book_name" required>
                            <option value="">-Select Book-</option>
                            <?php
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection,"lms");
                                $query = "SELECT book_no, book_name FROM book"; 
                                $query_run = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($query_run)) {
                                    echo "<option value='{$row['book_no']}'>{$row['book_name']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Book Number (Auto-filled)</label>
                        <input type="text" name="book_no" id="book_no" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Book Author</label>
                        <select class="form-control" name="book_author" required>
                            <option value="">-Select Author-</option>
                            <?php
                                $query = "SELECT author_name FROM author";
                                $query_run = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($query_run)) {
                                    echo "<option>{$row['author_name']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" name="student_id" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="date" name="issue_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>

                    <button name="issue_book" class="btn btn-primary">Issue Book</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>

        <!-- Script to auto-fill Book Number -->
        <script>
            document.getElementById('book_name').addEventListener('change', function() {
                var bookNo = this.value;
                document.getElementById('book_no').value = bookNo;
            });
        </script>
    </body>
</html>

<?php
if(isset($_POST['issue_book'])) {
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"lms");

    $book_no = $_POST['book_no'];
    $student_id = $_POST['student_id'];
    $book_author = $_POST['book_author'];
    $issue_date = $_POST['issue_date'];

    // Fetch book name based on book_no for accuracy
    $book_name_query = "SELECT book_name FROM book WHERE book_no = $book_no";
    $book_result = mysqli_query($connection, $book_name_query);
    $book_row = mysqli_fetch_assoc($book_result);
    $book_name = $book_row['book_name'];

    // Insert into issued_book
    $query = "INSERT INTO issued_book VALUES (NULL, '$book_no', '$book_name', '$book_author', '$student_id', 1, '$issue_date')";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        echo "<script>alert('Book issued successfully');</script>";
    } else {
        echo "<script>alert('Error issuing book');</script>";
    }
}
?>
