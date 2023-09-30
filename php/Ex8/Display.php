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

// SQL query to retrieve best students (mark > 75)
$sql_best = "SELECT * FROM students WHERE Mark > 75";

// SQL query to retrieve good students (mark > 60 and <= 75)
$sql_good = "SELECT * FROM students WHERE Mark > 60 AND Mark <= 75";

// SQL query to retrieve average students (mark < 60)
$sql_average = "SELECT * FROM students WHERE Mark < 60";

// Execute the queries
$result_best = $conn->query($sql_best);
$result_good = $conn->query($sql_good);
$result_average = $conn->query($sql_average);

// Function to display a table
function displayTable($result, $title)
{
    echo "<h2>$title</h2>";
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Class</th><th>Mark</th><th>Sex</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Class'] . "</td>";
            echo "<td>" . $row['Mark'] . "</td>";
            echo "<td>" . $row['Sex'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
}

// Display the three tables
displayTable($result_best, "Best Students (Mark > 75)");
displayTable($result_good, "Good Students (Mark > 60 and <= 75)");
displayTable($result_average, "Average Students (Mark < 60)");

// Close the connection
$conn->close();
?>
