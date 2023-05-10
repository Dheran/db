<?php 
if (isset($_POST["id"])) {
    $id = $_POST["id"];
    include ('connection.php');

    $sql = "DELETE FROM tbl_info WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header("admin_homepage.php");
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }

      $sql = "DELETE FROM tbl_user WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        header("admin_homepage.php");
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
}
?>