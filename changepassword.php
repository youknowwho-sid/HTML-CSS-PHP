<?php
session_start();
if(!isset($_SESSION['userlogin'])){
	header("Location:index.php");
	die();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">Library Management System</a>
            </div> 
            <ul class="nav navbar-nav navbar-right">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username'];?></a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="viewprofile.php">View Profile</a></li>
                    <li><a class="dropdown-item" href="editprofile.php">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="changepassword.php">Change Password</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    
                </ul>
                </li>
            </ul>

        </div>
        
    </nav><br><br>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="updatepassword.php" method="post">
                <div class="form-group">
                    <label for="password">Enter Current Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="email">Enter New Password:</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Confirm Password:</label>
                    <input type="password" name="confirm_password" class="form-control">
                </div>
                <button type="submit" name="update" class="btn btn-primary">Change Password</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

