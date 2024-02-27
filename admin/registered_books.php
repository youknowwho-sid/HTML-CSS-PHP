<?php
$conn = new mysqli("localhost", "root", "", "lms");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the books table to retrieve all the book records
$sql = "SELECT b.book_id, b.book_name, a.author_name, c.category_name, b.book_price, b.isbn
        FROM books as b
        join authors as a on a.author_id = b.author_id
        join category as c on c.category_id = b.category_id
        order by b.book_id asc
        ";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">All Books</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Category Name</th>
                    <th>Book Price</th>
                    <th>ISBN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display the book records
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['book_id'] . "</td>";
                        echo "<td>" . $row['book_name'] . "</td>";
                        echo "<td>" . $row['author_name'] . "</td>";
                        echo "<td>" . $row['category_name'] . "</td>";
                        echo "<td>" . $row['book_price'] . "</td>";
                        echo "<td>" . $row['isbn'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No books found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
