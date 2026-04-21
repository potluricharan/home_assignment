<?php
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check existing user
    $check = "SELECT * FROM students WHERE username='$username'";
    $result = mysqli_query($conn, $check);

    if ($result && mysqli_num_rows($result) > 0) {
        $message = "Username already exists!";
    } else {
        $query = "INSERT INTO students (username, password) VALUES ('$username', '$password')";
        
        if (mysqli_query($conn, $query)) {
            $message = "Registration successful! You can login now.";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #43e97b, #38f9d7);
        }
        .register-box {
            width: 380px;
            padding: 30px;
            background: #fff;
            margin: 80px auto;
            border-radius: 10px;
            box-shadow: 0px 0px 12px gray;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            width: 95%;
            padding: 10px;
            background: #43e97b;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #28a745;
        }
        .message {
            margin-bottom: 10px;
            color: red;
        }
        .success {
            color: green;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>

<body>

<div class="register-box">
    <h2>Student Registration</h2>

    <?php if ($message != "") { ?>
        <div class="message <?php echo (strpos($message, 'successful') !== false) ? 'success' : ''; ?>">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <form method="post">
        <input type="text" name="username" placeholder="Enter Username" required><br>
        <input type="password" name="password" placeholder="Enter Password" required><br>
        <input type="submit" value="Register">
    </form>

    <br>
    <p>Already have an account? <a href="login.php">Login Here</a></p>
</div>

</body>
</html>