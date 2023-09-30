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

// Check exist table
$tableName = 'students';
$tableExistsQuery = "SHOW TABLES LIKE '$tableName'";
$tableExistsResult = $conn->query($tableExistsQuery);

// Create table and insert data if not exists
if ($tableExistsResult->num_rows == 0) {
    $sql_create_insert = "CREATE TABLE students (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255),
        Class VARCHAR(10),
        Mark INT,
        Sex VARCHAR(10)
    );

    INSERT INTO students (Name, Class, Mark, Sex) VALUES
    ('John Deo', 'Four', 75, 'female'),
    ('Max Ruin', 'Three', 85, 'male'),
    ('Arnold', 'Three', 55, 'male'),
    ('Krish Star', 'Four', 60, 'female'),
    ('John Mike', 'Four', 60, 'female'),
    ('Alex John', 'Four', 55, 'male'),
    ('My John Rob', 'Fifth', 78, 'male'),
    ('Asruid', 'Five', 85, 'male'),
    ('Tes Qry', 'Six', 78, 'male'),
    ('Big John', 'Four', 55, 'female');
    ";

    if ($conn->multi_query($sql_create_insert) === TRUE) {
        echo "Table created and data inserted successfully.";
    } else {
        echo "Error creating table and inserting data: " . $conn->error;
    }
} else {
    echo "Table 'students' already exists. You can skip the table creation step.";
}


// Close connection
$conn->close();
?>
