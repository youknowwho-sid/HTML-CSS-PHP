<?php
require("functions.php");
session_start();
if (!isset($_SESSION['adminlogin'])) {
  header("Location:index.php");
  die();
}

// Check if the book ID is provided
if (isset($_GET['book_id'])) {
  $bookId = $_GET['book_id'];

  // Perform the necessary database operation to delete the book
  if (delete_book($bookId)) {
    echo "<script>alert('Book deleted successfully')
            window.location.href = 'manage_books.php';
        </script>";
    
  } else {
    echo "Error deleting the book.";
  }
} else {
  // Invalid request
  echo "Invalid request.";
}
