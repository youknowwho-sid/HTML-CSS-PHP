<?php
    session_start();
    if (isset($_POST['login'])) {
        $conn = mysqli_connect("localhost", "root", "", "lms");
        $query = "select * from users where email = '$_POST[email]'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']){
            echo "Login successful";
            $_SESSION['userlogin'] = "true";
            $_SESSION['username'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            header("Location:dashboard.php");
        }
        else{
            echo "<script>
                    alert('Invalid username or password');
                    window.location = 'index.php';
                </script>";
        }
    }
?>