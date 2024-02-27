<?php
    session_start();
    if(!isset($_SESSION['userlogin'])){
        header("Location:index.php");
        die();
    }

    
    $conn = mysqli_connect("localhost", "root", "", "lms");
    $query = "update users set name = '$_POST[name]', phone = '$_POST[phone]' where email = '$_SESSION[email]'";
    $query_run = mysqli_query($conn, $query);

    echo "<script>
            alert('Updated Profile');
            window.location = 'viewprofile.php';
        </script>";
    
?>