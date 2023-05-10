<?php 
if (isset($_POST["id"])) {
    require_once 'connection.php'; // Using require_once instead of include

    $id = $_POST["id"];
    $firstname = trim($_POST["firstname"]); // Trimming the input to remove whitespace
    $lastname = trim($_POST["lastname"]);
    $middlename = trim($_POST["middlename"]);
    $address = trim($_POST["address"]);
    $gender = $_POST["gender"];
    $age = trim($_POST["age"]);
    $birthdate = trim($_POST["birthdate"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $user_type = $_POST["user_type"];

    // Prepare the UPDATE statement to prevent SQL injection attacks
    $sql = "UPDATE tbl_info
            SET firstname=?, lastname=?, middlename=?, address=?, gender=?, age=?, birthdate=?, email=?
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssisss", $firstname, $lastname, $middlename, $address, $gender, $age, $birthdate, $email, $id);

    if ($stmt->execute()) {
        // Update the username, password, and user_type in tbl_user
        $sql = "UPDATE tbl_user
                SET username=?, password=?, user_type=?
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $password, $user_type, $id);

        if ($stmt->execute()) {
            $message = "<p>Record updated successfully</p>";
        } else {
            $message = "<p>Error updating record: " . $stmt->error . "</p>";
        }
    } else {
        $message = "<p>Error updating record: " . $stmt->error . "</p>";
    }
  
    $conn->close();

    // Redirect to another PHP file
    header("Location: ../admin_homepage.php");
    exit;
}
?>
