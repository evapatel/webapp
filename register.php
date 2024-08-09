<?php
// Include the database configuration file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Prepare an SQL statement
    $sql = "INSERT INTO dbo.users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = sqlsrv_prepare($conn, $sql, array(&$first_name, &$last_name, &$email, &$password));

    // Execute the statement
    if (sqlsrv_execute($stmt)) {
        echo "Registration successful!";
    } else {
        echo "Error: Could not execute the query.";
        die(print_r(sqlsrv_errors(), true));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIT Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="register.php">
        <h2>WIT Registration Form</h2>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Register">
    </form>
</body>
</html>