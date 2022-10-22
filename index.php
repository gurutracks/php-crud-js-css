<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script>
    // Get confirmation before deleting
    function confirm_delete(){
      if(confirm("Are you sure you want to delete?") === true){
        return true;
      } else {
        return false;
      }
    }
</script>
  <title>Home</title>
</head>
<body>
  
<?php
// Include the config file
include('config.php');

echo "<h1>CRUD application with PHP and MySQL</h1>";

// Add a link for new record addition
echo "<div align=center><a href=create.php><button type=button>Add A New Address</button></a></div>";

// Select fields
$sql = "SELECT * FROM address_table";

// Execute query
$result = mysqli_query($conn, $sql);

// Show Fields
if (mysqli_num_rows($result) > 0) {
?>
<!-- Create a HTML table to format the output -->
  <table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>EMail</th>
        <th>Actions</th>
	  </tr>
<?php
    // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        // Links to update and delete file by passing table "id" fieled
        echo "<td>";
        echo "<a href=update.php?id=" . $row["id"] . "><button type=button>Update</button></a>&nbsp;"; 
        echo "<a href=delete.php?id=" . $row["id"] . "><button type=button Onclick='return confirm_delete();'>Delete</button></a>";
        echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "<h3>No records found</h3>";
}

// Close mysql connection
mysqli_close($conn);
?>

</body>
</html>