<!DOCTYPE html>
<html>
    <head>
        <title>Library Management System</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1\css\bootstrap.min.css">
        <script type="text/javascript" src="bootstrap-4.4.1\js\jquery_latest.js"></script>
        <script type="text/javascript" src="bootstrap-4.4.1\js\bootstrap.min.js"></script>
        <style type="text/css">
            #side_bar{
                background-color: whitesmoke;
                padding: 50px;
                width: 300px;
                height: 450px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Library Management System</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a class="nav-link" href="admin\index.php">Admin Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">User Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">Register</a></li>
                </ul>   
            </div>
        </nav><br>
        <span><marquee>This is Library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee></span><br><br>
        <div class="row">
            <div class="col-md-4" id="side_bar">
                <h5>Library Timing</h5>
                <ul>
                    <li>Opening Time: 8:00 AM</li>
                    <li>Closing Time: 8:00 PM</li>
                    <li>(Sunday Off)</li>
                </ul>
                <h5>Contact Us</h5>
                <ul>
                    <li>Sai Krish</li>
                    <li>Phone: +91 6364411705</li>
                    <li>Email: sai.krish2023@vitudent.ac.in
                </ul>
                <ul>
                    <li>Pritika Vijaykumar</li>
                    <li>Phone: +91 8820102538</li>
                    <li>Email: pritika.v2023@vitudent.ac.in
                </ul>
            </div> 
            <div class="col-md-8" id="main_content">
                <center><h3>User Login</h3></center>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="email">Email Id</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="Submit" class="btn btn-primary">Register</button>
                </form>
                <?php
                    session_start();
                    if(isset($_POST['email'])){
                        $connection = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($connection,"lms");
                        $query = "SELECT * FROM user WHERE email = '{$_POST['email']}'";
                        $query_run = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($query_run)){
                            if($row['password'] == $_POST['password']){
                                $_SESSION['name'] = $row['name'];
                                $_SESSION['email'] = $row['email'];
                                $_SESSION['id']=$row['id'];
                                header("Location: user_dashboard.php"); // To redirect to user dashboard
                            }
                            else{
                                ?>
                                <br><br><center><span class="alert-danger">Wrong Password</span></center>
                                <?php
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>