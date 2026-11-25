<!DOCTYPE html>
<html>
<head>
    <title>Student Array</title>

    <style>
        body {
            background-color: lightblue;
            font-family: Arial;
            text-align: center;
        }

        .container {
            background-color: white;
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            color: darkblue;
        }

        pre {
            display: inline-block;
            text-align: left;
            background-color: lightyellow;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

<?php
$students = array("Alice", "Bob", "Charlie", "David", "Eve");

echo "<h2>Original Array:</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";

asort($students);

echo "<h2>Array Sorted in Ascending Order:</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";

arsort($students);

echo "<h2>Array Sorted in Descending Order:</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";
?>

</div>

</body>
</html>
