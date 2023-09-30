<?php
function factorial($n) {
    if ($n <= 1) {
        return 1; // Factorial of 0 and 1 is 1
    } else {
        return $n * factorial($n - 1); // Recursively calculate factorial
    }
}

// Check submitted form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST["number"];

    // Check positive integer
    if (is_numeric($userInput) && $userInput > 0 && intval($userInput) == $userInput) {
        $result = factorial($userInput);
        echo "Factorial of $userInput is $result";
    } else {
        echo "Please enter a positive integer.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
</head>
<body>
    <h1>Factorial Calculator</h1>
    <form method="POST">
        <label for="number">Enter a positive integer:</label>
        <input type="text" name="number" id="number">
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
