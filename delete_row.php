<?php
include 'dbcon.php';
include 'alert.php';

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];

   // Perform the delete operation on the database table
   $sql = "DELETE FROM skills WHERE id = '$id'";
   $result = mysqli_query($dbconn, $sql);

   if ($result) {
      // Redirect to the current page after deleting the 
      header("Location: myprofile");
      exit();
   } else {
      echo "Error deleting item: ";
   }
}
?>