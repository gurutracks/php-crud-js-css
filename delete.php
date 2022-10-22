<?php
// Include the config file
include('config.php');

// Get record id from landing page link
$id=$_GET["id"];

// Delete field query
$sql = "DELETE FROM address_table where id=$id";
if (mysqli_query($conn, $sql)) {
    header("location: index.php");
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
// Close mysql connection
mysqli_close($conn);
?>