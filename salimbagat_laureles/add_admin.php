<?php
include('server/connection.php');

if (isset($_POST['AddAdmin'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $username = stripcslashes($username);
    $password = stripcslashes($password);

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM tbl_user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "<h1>Account already exists!</h1>";
    } else {
        // Insert into tbl_info
        $sql = "INSERT INTO tbl_info (firstname, lastname, middlename, address, gender, age, birthdate, email) VALUES ('$fname', '$lname', '$mname', '$address', '$gender', '$age', '$birthdate', '$email')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $infoId = mysqli_insert_id($conn); // Get the auto-generated ID from tbl_info

            // Insert into tbl_user
            $sql = "INSERT INTO tbl_user (username, password, user_type, id) VALUES ('$username', '$password', 'admin', $infoId)";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<h1>Registration Successful!</h1>";
                header("Location: admin_homepage.php");
                exit();
            } else {
                $error = mysqli_error($conn);
                die ("Query failed: $error");
            }
        } else {
            $error = mysqli_error($conn);
            die ("Query failed: $error");
        }
    }
}
mysqli_close($conn);
?>
