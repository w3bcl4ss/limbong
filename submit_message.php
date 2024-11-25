<?php
// Database connection parameters
$host = "sql112.infinityfree.com"; // Replace with your database host
$username = "if0_37775426";  // Replace with your database username
$password = "pogimo143";      // Replace with your database password
$database = "if0_37775426_submit"; // Replace with your database name

// Establish a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into the database
    $sql = "INSERT INTO submit_table (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the thank you page with the user's name as a URL parameter
        header("Location: thankyou.html?name=" . urlencode($name));
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
