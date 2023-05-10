<?php
    session_start();
    require_once('connection.php');
    $username = $_POST ['user'];
    $password = $_POST ['pass'];

    $sql = "SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $ql);

    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        // Palitan mo rin sa admin_homepage mo tsaka sa homepage ung $_SESSION gawin mong username lang
        $_SESSION['username'] = $username;
        if ($row['user_type'] == 'admin') {
            header("Location: admin_homepage.php");
        } else {
            header("Location: homepage.php");
        }
    } else {  
        echo '<script>alert("Username and password are incorrect.");</script>';
    }
?>
