<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Create Record</title>
</head>
<body>
    <h1>CRUD application with PHP and MySQL</h1>
    <!-- HTML form for user input. Form submits to itself to execute PHP code bellow -->
    <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="form_name">Name</label>
        <input type="text" id="form_name" name="form_name">
        <label for="form_address">Address</label>
        <textarea id="form_address" name="form_address"></textarea>
        <label for="form_phone">Phone</label>
        <!-- Input type tel for phone number with formating (3 numbers - 3 numbers - 4 numbers) -->
        <input type="tel" id="form_phone" name="form_phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
        <small>Format: 123-456-7890</small><br>
        <!-- Input type email for validation -->
        <label for="form_email">Email</label>
        <input type="email" id="form_email" name="form_email">
        <input type="submit">
    </form>
</body>
</html>

<?php  
    // Include the config file
    include('config.php');

    // If form submits and method is POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Get form session variables
        $input_name = $_POST["form_name"];
        $input_address = $_POST["form_address"];
        $input_phone = $_POST["form_phone"];
        $input_email = $_POST["form_email"];

        // Insert the variables's data into table
        $sql = "INSERT INTO address_table (name, address, phone, email)
            VALUES ('$input_name', '$input_address', '$input_phone', '$input_email')";

        // Execute the query
        if(mysqli_query($conn, $sql)){
            // On success, redirect to landing page
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