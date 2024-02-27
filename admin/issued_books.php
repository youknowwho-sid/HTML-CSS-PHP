<?php
$conn = new mysqli("localhost", "root", "", "lms");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the issued_books table to retrieve all the issued book records
$sql = "SELECT ib.book_name, ib.book_author, u.name AS student_name, ib.status, ib.issue_date
        FROM issued_books AS ib
        JOIN users AS u ON ib.student_id = u.id
        order by ib.issue_date asc
        ";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Issued Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Issued Books</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Book Author</th>
                    <th>Student</th>
                    <th>Status</th>
                    <th>Issue Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display the issued book records
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['book_name'] . "</td>";
                        echo "<td>" . $row['book_author'] . "</td>";
                        echo "<td>" . $row['student_name'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['issue_date'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No issued books found.</td></tr>";
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
