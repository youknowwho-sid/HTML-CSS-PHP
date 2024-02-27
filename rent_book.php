<?php
session_start();
// Check if the book ID is provided
if (isset($_POST['book_id'])) {
  $bookId = $_POST['book_id'];
  $username = $_SESSION['username'];
  $status = 'not returned';

  // Perform the necessary database operations to rent the book
  $conn = new mysqli("localhost", "root", "", "lms");

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL query to get the user ID
  $query = "SELECT id FROM users WHERE `name` = '$username'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $studentId = $row['id'];

    // Prepare and execute the SQL query to get the book name and author
    $bookQuery = "SELECT book_name, author_name FROM books join authors on authors.author_id = books.author_id WHERE book_id = '$bookId'";
    $bookResult = $conn->query($bookQuery);

    if ($bookResult->num_rows > 0) {
      $bookRow = $bookResult->fetch_assoc();
      $bookName = $bookRow['book_name'];
      $bookAuthor = $bookRow['author_name'];

      // Prepare and execute the SQL query to insert the rental information
      $sql = "INSERT INTO issued_books (book_id, book_name, book_author, student_id, `status`) VALUES ('$bookId', '$bookName', '$bookAuthor', '$studentId', '$status')";
      if ($conn->query($sql) === TRUE) {
        echo "Book rented successfully.";
      } else {
        echo "Error renting the book: " . $conn->error;
      }
    } else {
      echo "Book not found.";
    }
  } else {
    echo "User not found.";
  }

  // Close the database connection
  $conn->close();
} else {
  // Invalid request
  echo "Invalid request.";
}
?>
