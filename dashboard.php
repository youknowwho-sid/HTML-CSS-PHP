<?php
  session_start();
  if(!isset($_SESSION['userlogin'])){
    header("Location:index.php");
    die();
  }

  function get_user_rented_book_count(){
    $connection = mysqli_connect("localhost","root","", "lms");
    $user_rented_book_count = 0;
    $query = "SELECT COUNT(status) as user_rented_book_count
              FROM issued_books AS ib
              JOIN users AS u ON ib.student_id = u.id
              WHERE u.name = '{$_SESSION['username']}' AND ib.status = 'not returned'";

    $query_run = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($query_run);
    $user_rented_book_count = $row['user_rented_book_count'];
    
    return($user_rented_book_count);
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
      <div class="col-md-3" style="margin: 0px">
        <div class="card bg-light" style="width: 300px">
          <div class="card-header">Books Issued</div>
          <div class="card-body">
            <p class="card-text">No of books rented: <?php echo get_user_rented_book_count();?></p>
            <a class="btn btn-success" href="user_rented_books.php">View Rented Books</a>
          </div>
        </div>
		  </div>
    </div>
      <div class="container">
  <h1 class="mt-4">Available Books</h1>
  <div class="row">
    <?php
    $conn = mysqli_connect("localhost","root","", "lms");
    // Fetch and display the available books
    $sql = "SELECT b.book_id, b.book_name, a.author_name, c.category_name, b.book_price 
            FROM books AS b 
            JOIN authors AS a ON b.author_id = a.author_id 
            JOIN category AS c ON b.category_id = c.category_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row['book_name'] . "</h5>";
        echo "<p class='card-text'>Author: " . $row['author_name'] . "</p>";
        echo "<p class='card-text'>Category: " . $row['category_name'] . "</p>";
        echo "<p class='card-text'>Price: $" . $row['book_price'] . "</p>";
        echo "<button class='btn btn-primary' onclick='rentBook(" . $row['book_id'] . ")'>Rent</button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      }
    } else {
      echo "<div class='col'><p>No available books found.</p></div>";
    }
    ?>
  </div>
</div>

	  

    <script>
  function rentBook(bookId) {
    // Confirm the rent action
    if (confirm("Are you sure you want to rent this book?")) {
      // Send an AJAX request to rent the book
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "rent_book.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Handle the response after successfully renting the book
            alert(xhr.responseText);
            location.reload(); // Refresh the page to update the rented books count
          } else {
            // Handle the error if the request fails
            console.error(xhr.responseText);
          }
        }
      };
      // Send the book ID to be rented
      xhr.send("book_id=" + bookId);
    }
  }
</script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

