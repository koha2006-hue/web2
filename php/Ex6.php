<?php
function sortNumericArray($array) {
    sort($array);
    return $array;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST["numbers"];

    // Validate user input to ensure it's a non-empty string
    if (!empty($userInput)) {
        // Split the input string into an array using commas as the delimiter
        $inputArray = explode(",", $userInput);
        
        // Convert array elements to integers
        $inputArray = array_map('intval', $inputArray);
        
        // Check if the resulting array is not empty
        if (!empty($inputArray)) {
            $sortedNumbers = sortNumericArray($inputArray);
            echo "Sorted numbers: " . implode(", ", $sortedNumbers);
        } else {
            echo "Please enter valid numbers.";
        }
    } else {
        echo "Please enter a list of numbers separated by commas.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Numerical Array Sorter</title>
</head>
<body>
    <h1>Numerical Array Sorter</h1>
    <form method="POST">
        <label for="numbers">Enter a list of numbers separated by commas:</label>
        <input type="text" name="numbers" id="numbers">
        <input type="submit" value="Sort">
    </form>
</body>
</html>
