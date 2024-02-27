<?php
if(isset($_POST['serial_number'])){
  $connection = mysqli_connect("localhost", "root", "", "lms");
  
  $serialNumber = $_POST['serial_number'];
  
  // Update the status of the book to 'returned'
  $query = "UPDATE issued_books SET status = 'returned' WHERE s_no = '$serialNumber'";
  $query_run = mysqli_query($connection, $query);
  
  if($query_run){
    // Return a success message
    echo "Book returned successfully.";
  } else {
    // Return an error message if the update fails
    echo "Error: Failed to return the book.";
  }
}
?>
