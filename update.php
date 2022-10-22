<?php

// Include style sheet file
echo "<style>";
include('styles.css');
echo "</style>";

// Include the config file
include('config.php');

// Get record id from landing page link
$id=$_GET["id"];

// Select the field to be updated
$sql = "SELECT * FROM address_table where id=$id";

// execute the query
$result = mysqli_query($conn, $sql);

// Get the row
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Record</title>
</head>
<body>
    <h1>CRUD application with PHP and MySQL</h1>
    <!-- HTML form with old data. Form submits to itself to execute PHP code bellow -->
    <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="form_name">Name</label>
        <input type="text" id="form_name" name="form_name" value="<?php echo $row["name"]; ?> ">
        <label for="form_address">Address</label>
        <textarea id="form_address" name="form_address"><?php echo $row["address"]; ?></textarea>
        <label for="form_phone">Phone</label>
        <!-- Input type tel for phone number with formating (3 numbers - 3 numbers - 4 numbers) -->
        <input type="tel" id="form_phone" name="form_phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo $row["phone"]; ?>">
        <small>Format: 123-456-7890</small><br>
        <!-- Input type email for validation -->
        <label for="form_email">Email</label>
        <input type="text" id="form_email" name="form_email" value="<?php echo $row["email"]; ?> ">
        <input type="submit">
    </form>
</body>
</html>
<?php  
    // If form submits and method is POST? Get form data into variables
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input_name = $_POST["form_name"];
        $input_address = $_POST["form_address"];
        $input_phone = $_POST["form_phone"];
        $input_email = $_POST["form_email"];
        // Update record with new changed data
        $sql = "UPDATE address_table SET name='$input_name', address='$input_address', phone='$input_phone', email='$input_email' where id='$id'";
        // Execute the query
        if(mysqli_query($conn, $sql)){
            // If successfull, redirect to landing page
            header("location: index.php");
            exit();
        } else{
            // If faild, throw an error
            echo "Something went wrong. Please try again later.";
        }
    }
// Close mysql connection
mysqli_close($conn);
?>