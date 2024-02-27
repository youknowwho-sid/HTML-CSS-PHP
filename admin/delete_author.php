<?php
require("functions.php");
session_start();
if(!isset($_SESSION['adminlogin'])){
  header("Location:index.php");
  die();
}

if (isset($_GET['author_id'])) {
  $authorId = $_GET['author_id'];

  if (delete_author($authorId)) {
    echo "<script>alert('Author deleted successfully')
            window.location.href = 'manage_authors.php';
        </script>";
  } else {
    echo "Failed to delete the author.";
  }
} else {
  echo "Invalid request.";
}
?>
