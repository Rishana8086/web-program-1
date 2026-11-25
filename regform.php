<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>

    <style>
        body {
            background-color: lightyellow;
            font-family: Arial;
            text-align: center;
        }

        form {
            background-color: white;
            width: 350px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid black;
            border-radius: 10px;
        }

        input, textarea, select {
            width: 90%;
            padding: 8px;
            margin: 8px;
        }

        button {
            padding: 10px 25px;
            background-color: lightgreen;
            border: 1px solid black;
            cursor: pointer;
        }

        .error {
            color: red;
            font-size: small;
        }
    </style>
</head>

<body>

<center>
<form method="POST">

    <h2>Registration Form</h2>

    <label>Name:</label>
    <input type="text" name="name" placeholder="Name">
    <br>

    <label>Phone:</label>
    <input type="text" name="phone" placeholder="Phone">
    <br>

    <label>Email:</label>
    <input type="email" name="email" placeholder="Email">
    <br>

    <label>Address:</label>
    <textarea name="address"></textarea>
    <br>

    <label>Qualification:</label>
    <select name="qf">
        <option value="">Select a Qualification</option>
        <option value="B">Bachelor's Degree</option>
        <option value="M">Master's Degree</option>
    </select>
    <br>

    <label>Password:</label>
    <input type="password" name="pass">
    <br>

    <label>Confirm Password:</label>
    <input type="password" name="cpass">
    <br><br>

    <button type="submit" name="submit">Register</button>

</form>
</center>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $qf = $_POST['qf'] ?? '';
    $pass = $_POST['pass'] ?? '';
    $cpass = $_POST['cpass'] ?? '';

    $errors = [];

    // Name validation
    if (empty($name)) {
        $errors['name'] = "Name is required";
    }

    // Phone validation
    if (empty($phone)) {
        $errors['phone'] = "Phone is required";
    }
    else if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors['phone'] = "Phone number must be a valid 10 digit number";
    }

    // Email validation
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required";
    }

    // Qualification validation
    if (empty($qf)) {
        $errors['qf'] = "Qualification is required";
    }

    // Address validation
    if (empty($address)) {
        $errors['address'] = "Address is required";
    }

    // Password validation
    if (empty($pass) || empty($cpass)) {
        $errors['pass'] = "Password is required";
    }
    else if ($pass != $cpass) {
        $errors['cpass'] = "Passwords do not match";
    }
    else if (strlen($pass) < 8) {
        $errors['pass'] = "Password must be at least 8 characters";
    }

    // Display errors or success message
    if (!empty($errors)) {

        foreach ($errors as $message) {
            echo "<p class='error'>$message</p>";
        }

    }
    else {
        echo "<script>alert('Registration Successful!');</script>";
    }
}

?>

</body>
</html>
