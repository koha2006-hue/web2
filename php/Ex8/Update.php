<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully<br>";
}

// SQL query to update the class of students with marks less than 60 to 'Two'
$sql_update = "UPDATE students SET Class = 'Two' WHERE Mark < 60";

if ($conn->query($sql_update) === TRUE) {
    echo "Class updated successfully.";
} else {
    echo "Error updating class: " . $conn->error;
}

// Close the connection
$conn->close();
?>
