<?php
include('connection.php');

if (isset($_POST['Register'])) {
    
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

    // Insert into tbl_info
    $stmt = $conn->prepare("INSERT INTO tbl_info (firstname, lastname, middlename, address, gender, age, birthdate, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $fname, $lname, $mname, $address, $gender, $age, $birthdate, $email);
    $result = $stmt->execute();

    if ($result) {
        $infoId = $stmt->insert_id; // Get the auto-generated ID from tbl_info

        // Insert into tbl_user
        $stmt = $conn->prepare("INSERT INTO tbl_user (username, password, user_type) VALUES (?, ?, 'member')");
        $stmt->bind_param("ss", $username, $password);
        $result = $stmt->execute();

        if ($result) {
            echo "<h1>Registration Successful!</h1>";
            header("Location: ../user_login.php");
            exit();
        } else {
            $error = $stmt->error;
            die("Query failed: $error");
        }
    } else {
        $error = $stmt->error;
        die("Query failed: $error");
    }

    $stmt->close();
}
mysqli_close($conn);
?>
