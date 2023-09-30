<?php
function isPrime($n) {
    $count = 1;
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0 && $i < $n) {
            $count++;
        }
    }
    if ($count == 2) {
        return true;
    } else {
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST["number"];

    // Check positive integer
    if (is_numeric($userInput) && $userInput > 0 && intval($userInput) == $userInput) {
        if (isPrime($userInput)) {
            echo "$userInput is a prime number.";
        } else {
            echo "$userInput is not a prime number.";
        }
    } else {
        echo "Please enter a positive integer.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prime Number Checker</title>
</head>
<body>
    <h1>Prime Number Checker</h1>
    <form method="POST">
        <label for="number">Enter a positive integer:</label>
        <input type="text" name="number" id="number">
        <input type="submit" value="Check">
    </form>
</body>
</html>
