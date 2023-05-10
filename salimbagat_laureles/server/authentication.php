<?php
    session_start();
    include ('connection.php');
    $username = $_POST ['user'];
    $password = $_POST ['pass'];

    $username = stripcslashes($username);
    $password = stripcslashes($password);

    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    // Check if the user is an admin
    $admin_sql = "SELECT * FROM tb_admin WHERE username = '$admin_username' AND password = '$admin_password'";
    $admin_result = mysqli_query($conn, $admin_sql);

    if ($admin_result && mysqli_num_rows($admin_result) > 0) {
        // Set the session variables for the admin user
        $_SESSION['admin_username'] = $username;
        header("Location: admin_homepage.php");
    } else {
        // Check if the user is a regular user
        $user_sql = "SELECT * FROM tb_reg WHERE username = '$username' AND password = '$password'";
        $user_result = mysqli_query($conn, $user_sql);

        if ($user_result && mysqli_num_rows($user_result) > 0) {
            // Set the session variables for the regular user
            $row = mysqli_fetch_assoc($user_result);
            $_SESSION['username'] = $row['username'];
            header("Location: homepage.php");
        } else {
            echo '<script>alert("Username and password are incorrect.");</script>';
        }
    }
?>
