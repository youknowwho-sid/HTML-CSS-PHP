<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style type="text/css">
      #side_bar{
        background-color: rgb(209, 208, 208);
        padding: 50px;
        width: 350px;
        height: 450px;
      }
      button{
        margin: 10px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Library Management System</a>
        </div> 
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link" href="admin/index.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Register</a>
          </li>
        </ul>         
      </div>
    </nav><br><br>

    <div class="row">
    <div class="col-md-4" id="side_bar">
      <h5>Library Timing</h5>
      <ul>
          <li>Opening Timing: 9:00 AM</li>
          <li>Closing Timing: 6:00 AM</li>
          <li>Saturdays: 9:00 AM - 4:00 PM</li>
          <li>Sundays: OFF</li>
        </ul>
    </div>
    <div class="col-md-8" id="main-content">
      <center><h3>Register</h3></center>
      <form action="register.php" method="post">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="name">Email:</label>
          <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="name">Password:</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="name">Confirm Password:</label>
          <input type="password" name="confirm-password" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="name">Phone Number:</label>
          <input type="text" name="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>