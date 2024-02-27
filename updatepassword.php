<?php
    session_start();
    if(!isset($_SESSION['userlogin'])){
        header("Location:index.php");
        die();
    }

    
    // First get the password from database and check if the user entered current password correct or not
    $conn = mysqli_connect("localhost", "root", "", "lms");
    $query = "select password from users where email = '$_SESSION[email]'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (!($_POST['password'] == $row['password'])){
        echo "<script>
            alert('Enter Correct Password');
            window.location = 'changepassword.php';
        </script>";
        exit();
    }

    // if new password and confirm password does not match, go back
    if(!($_POST['new_password'] == $_POST['confirm_password'])){
        echo "<script>
            alert('New Password and Confirm Password not matched');
            window.location = 'changepassword.php';
        </script>";
        exit();
    }

    // If both the checks passes, update the password
    $query = "update users set password = '$_POST[new_password]' where email = '$_SESSION[email]'";
    mysqli_query($conn, $query);

    echo "<script>
            alert('Updated Profile');
            window.location = 'dashboard.php';
        </script>";
        exit();
?>