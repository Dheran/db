<?php
    session_start();
    include ('server/connection.php');
    
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $username = stripcslashes($username);
        $password = stripcslashes($password);

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        if(empty($username) || empty($password)) {
            echo "<script>alert('Username and password fields are empty.');</script>";
        } else {
            $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password' AND user_type = 'member'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $count = mysqli_num_rows($result);

                if ($count == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    header("Location: user_homepage.php");
                    exit();
                } else {
                    echo "<script>alert('Username and password are incorrect.');</script>";
                }
            } else {
                $error = mysqli_error($conn);
                die ("Query failed: $error");
            }
        }
    }
?>


<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Login Form | CodingLab </title>--->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" conntent="width=device-width, initial-scale=1.0">
  </head>
  <body>
  
        <div class="conntainer">
        <button type="submit" name="logout" onclick="location.href='portal.php';">< Back to Portal</button>
            <form name="f1" action="" onsubmit="return validation()" method="POST">
            <div class ="title"> Login </div>

            <div class="input-box underline">
                
                <input type="text" name="user" id="user" placeholder="Username">
                <div class="underline"></div>
                </div>
            <div class="input-box">
                
                <input type="password" name="pass" id="pass" placeholder="Password">
                <div class="underline"></div>
                </div>
            <div class="input-box button">
                <input type="submit" name="login" value = Login>
                </div>
            </form>

            <p>Don't have an account?  <a href="user_register.php" id = "register-link"> Register now.</a></p>

        </div>
        <script>
            function validation() {

                var username = document.f1.user.value;
                var password = document.f1.pass.value;

                if (username== "" && password == "") {
                    alert("Username and password fields are empty.");
                    return false;
                } else {
                    if (username == "") {
                        alert("Username field is empty.");
                        return false;
                    } if (password == "") {
                        alert("Password field is empty.");
                        return false;
                    }
                }
            }
        </script>
    </body>
</html>
