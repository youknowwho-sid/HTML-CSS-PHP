<?php
    session_start();
    if (isset($_POST['login'])) {
        $conn = mysqli_connect("localhost", "root", "", "lms");
        $query = "SELECT * FROM admins WHERE email = '$_POST[email]'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            if ($row['password'] == $_POST['password']) {
                echo "Login successful";
                $_SESSION['adminlogin'] = "true";
                $_SESSION['username'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                header("Location: admin_dashboard.php");
                exit();
            }
        }
        
        echo "<script>
                alert('Invalid username or password');
                window.location = 'index.php';
            </script>";
    }
?>
