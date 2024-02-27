<?php
    function get_user_count() {
        $conn = mysqli_connect("localhost", "root", "", "lms");
        $query = "select count(*) as user_count from users";
        $result = mysqli_query($conn, $query);
        
        // extract the query into row
        $row = mysqli_fetch_assoc($result);
        $user_count = $row['user_count'];

        return $user_count;
    }
   
    function get_book_count() {
        $conn = mysqli_connect("localhost", "root", "", "lms");
        $query = "select count(*) as book_count from books";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $book_count = $row['book_count'];
        return $book_count;
    }

    function get_author_count() {
        $conn = mysqli_connect("localhost", "root", "", "lms");
        $query = "select count(*) as author_count from authors";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $author_count = $row['author_count'];
        return $author_count;
    }

    function get_category_count() {
        $conn = mysqli_connect("localhost", "root", "", "lms");
        $query = "select count(*) as category_count from category";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $category_count = $row['category_count'];
        return $category_count;
    }

    function get_issued_book_count() {
        $conn = mysqli_connect("localhost", "root", "", "lms");
        $query = "select count(*) as issued_book_count from issued_books";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
        $issued_book_count = $row['issued_book_count'];
        return $issued_book_count;
    }

    function get_all_books() {
        $conn = mysqli_connect("localhost", "root", "", "lms");
        $sql = "SELECT b.book_id, b.book_name, a.author_name, c.category_name
                FROM books AS b 
                JOIN authors AS a ON b.author_id = a.author_id 
                JOIN category AS c ON b.category_id = c.category_id";
        $result = mysqli_query($conn, $sql);
        $books = [];
      
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $books[] = $row;
          }
        }
      
        mysqli_close($conn);
        return $books;
    }

    function get_all_categories() {
        $conn = mysqli_connect("localhost", "root", "", "lms");
      
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
      
        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn, $sql);
        $categories = [];
      
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
          }
        }
      
        mysqli_close($conn);
        return $categories;
      }

      function get_all_authors() {
        $connection = mysqli_connect("localhost", "root", "", "lms");
        $authors = array();
      
        $query = "SELECT * FROM authors";
        $result = mysqli_query($connection, $query);
      
        if ($result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $authors[] = $row;
          }
        }
      
        mysqli_close($connection);
        return $authors;
      }

      function delete_book($bookId) {
        $connection = mysqli_connect("localhost", "root", "", "lms");
      
        // Check the connection
        if ($connection === false) {
          die("Error: Could not connect. " . mysqli_connect_error());
        }
      
        // Prepare and execute the SQL query to delete the book
        $query = "DELETE FROM books WHERE book_id = '$bookId'";
        $result = mysqli_query($connection, $query);
      
        // Check if the deletion was successful
        if ($result) {
          mysqli_close($connection);
          return true; // Book deleted successfully
        } else {
          mysqli_close($connection);
          return false; // Error deleting the book
        }
      }
      

      function delete_category($categoryId) {
        $connection = mysqli_connect("localhost", "root", "", "lms");
      
        // Check the connection
        if ($connection === false) {
          die("Error: Could not connect. " . mysqli_connect_error());
        }
      
        // Prepare and execute the SQL query to delete the category
        $query = "DELETE FROM category WHERE category_id = '$categoryId'";
        $result = mysqli_query($connection, $query);
      
        // Check if the deletion was successful
        if ($result) {
          mysqli_close($connection);
          return true; // Category deleted successfully
        } else {
          mysqli_close($connection);
          return false; // Error deleting the category
        }
      }

      function delete_author($authorId) {
        $connection = mysqli_connect("localhost", "root", "", "lms");
      
        // Check the connection
        if ($connection === false) {
          die("Error: Could not connect. " . mysqli_connect_error());
        }
      
        // Prepare and execute the SQL query to delete the author
        $query = "DELETE FROM authors WHERE author_id = '$authorId'";
        $result = mysqli_query($connection, $query);
      
        // Check if the deletion was successful
        if ($result) {
          mysqli_close($connection);
          return true; // Author deleted successfully
        } else {
          mysqli_close($connection);
          return false; // Error deleting the author
        }
      }
      
      
?>