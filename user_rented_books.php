<?php
session_start();
if(!isset($_SESSION['userlogin'])){
  header("Location:index.php");
  die();
}

$connection = mysqli_connect("localhost", "root", "", "lms");

// Get the user's rented books
$query = "SELECT s_no, book_name, book_author, status, issue_date 
          FROM issued_books 
          WHERE student_id = (SELECT id FROM users WHERE name = '{$_SESSION['username']}')";

$query_run = mysqli_query($connection, $query);
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

  <div class="container">
    <h3>Books Rented by <?php echo $_SESSION['username']; ?></h3>
    <table class="table">
      <thead>
        <tr>
          <th>Book Name</th>
          <th>Book Author</th>
          <th>Status</th>
          <th>Issue Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Loop through the rented books and display them in a table
        while($row = mysqli_fetch_assoc($query_run)){
          echo "<tr>";
          echo "<td>".$row['book_name']."</td>";
          echo "<td>".$row['book_author']."</td>";
          echo "<td>".$row['status']."</td>";
          echo "<td>".$row['issue_date']."</td>";
          echo "<td>";
          // Display return button only for books in 'not returned' state
          if($row['status'] == 'not returned'){
            echo "<button class='btn btn-primary' onclick='returnBook({$row['s_no']})'>Return Book</button>";
          } else {
            echo "Returned";
          }
          echo "</td>";
          echo "</tr>";
        }
        ?>
        </tbody>
      </table>
    </div>
  
    <script>
      function returnBook(serialNumber) {
        // Confirm the return action
        if(confirm("Are you sure you want to return this book?")){
          // Send an AJAX request to update the status in the database
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "return_book.php", true);
          xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                // Update the button text and status on success
                document.getElementById("btn-" + serialNumber).innerHTML = "Returned";
                document.getElementById("btn-" + serialNumber).style.display = "none";
                
              } else {
                // Handle the error if the request fails
                console.error(xhr.responseText);
              }
            }
          };
          
          // Send the serial number of the book to be returned
          xhr.send("serial_number=" + serialNumber);
          location.reload();
        }
      }
    </script>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
  </html>
  