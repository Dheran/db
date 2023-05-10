<?php 
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    include ('connection.php');

    $sql = "DELETE FROM tbl_info WHERE id=$id"; // Kulang ng semicolon after ng $id lagyan mo

    // eto yung sinasabi ko para di humaba yung code tas multi_query
    $sql .= "DELETE FROM tbl_user WHERE id = $id;";
    if ($conn->multi_query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("admin_homepage.php");
      } else {
        echo "Error deleting record: " . $conn->error;
      }

    // Wag na to pwedeng isahan nalang yan gamit yung $sql .= 
    
//       $sql = "DELETE FROM tbl_user WHERE id=$id";
//     if (mysqli_query($conn, $sql)) {
//         echo "Record deleted successfully";
//         header("admin_homepage.php");
//       } else {
//         echo "Error deleting record: " . mysqli_error($conn);
//       }
}
?>
