<?php
require("functions.php");
session_start();
if (!isset($_SESSION['adminlogin'])) {
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
                <a class="navbar-brand" href="admin_dashboard.php">Library Management System (ADMIN)</a>
            </div> 
            <ul class="nav navbar-nav navbar-right">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username'];?></a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="admin_viewprofile.php">View Profile</a></li>
                    <li><a class="dropdown-item" href="admin_editprofile.php">Edit Profile</a></li>
                    <li><a class="dropdown-item" href="admin_changepassword.php">Change Password</a></li>
                    <li><a class="dropdown-item" href="admin_logout.php">Logout</a></li>
                    
                </ul>
                </li>
            </ul>

        </div>
        
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
		<div class="container-fluid">
			
		    <ul class="nav navbar-nav navbar-center">
		      <li class="nav-item">
		        <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
		      </li>
		      <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Books</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="add_book.php">Add New Book</a></li>
                <li><a class="dropdown-item" href="manage_books.php">Manage Books</a></li>
            </ul>
          </li>
		      <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="add_category.php">Add New Category</a></li>
                <li><a class="dropdown-item" href="manage_categories.php">Manage Categories</a></li>
            </ul>
          </li>
		      <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Authors</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="add_author.php">Add New Author</a></li>
                <li><a class="dropdown-item" href="manage_authors.php">Manage Authors</a></li>
            </ul>
          </li>
	          <li class="nav-item">
		        <a class="nav-link" href="issue_book.php">Issue Book</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
  <div class="container">
      <h1 class="mt-4">Manage Categories</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Category ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $categories = get_all_categories();
          if (!empty($categories)) {
            foreach ($categories as $category) {
              echo "<tr>";
              echo "<td>{$category['category_id']}</td>";
              echo "<td>{$category['category_name']}</td>";
              echo "<td><a class='btn btn-danger' href='delete_category.php?category_id={$category['category_id']}'>Delete</a></td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='3'>No categories found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>

