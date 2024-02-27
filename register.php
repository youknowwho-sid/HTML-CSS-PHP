<?php
$conn = mysqli_connect("localhost", "root", "", "lms");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];

$query = "insert into users values (null, '$name', '$email', '$password', '$phone')";
$query_run = mysqli_query($conn, $query);
?>

<script>
    alert("Registration successful... You may login now.");
    window.location.href='index.php';

</script>