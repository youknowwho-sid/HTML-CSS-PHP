<?php
require("functions.php");
session_start();
if(!isset($_SESSION['adminlogin'])){
  header("Location:index.php");
  die();
}

if (isset($_GET['category_id'])) {
  $categoryId = $_GET['category_id'];

  if (delete_category($categoryId)) {
    echo "<script>alert('Category deleted successfully')
            window.location.href = 'manage_categories.php';
        </script>";
    
  } else {
    echo "Failed to delete the category.";
  }
} else {
  echo "Invalid request.";
}
?>
