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

// Delete the table
$sql_delete = "DROP TABLE students";

if ($conn->query($sql_delete) === TRUE) {
    echo "Table deleted successfully.";
} else {
    echo "Error deleting table: " . $conn->error;
}

// Close the connection
$conn->close();


?>