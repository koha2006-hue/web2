<?php
function reverseString($str) {
    return strrev($str);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST["inputString"];

    // Validate user input to ensure it's not empty
    if (!empty($userInput)) {
        $reversedString = reverseString($userInput);
        echo "Original String: $userInput<br>";
        echo "Reversed String: $reversedString";
    } else {
        echo "Please enter a string.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>String Reverser</title>
</head>
<body>
    <h1>String Reverser</h1>
    <form method="POST">
        <label for="inputString">Enter a string:</label>
        <input type="text" name="inputString" id="inputString">
        <input type="submit" value="Reverse">
    </form>
</body>
</html>
