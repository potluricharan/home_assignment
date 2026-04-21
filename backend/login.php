<?php
include("db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM students WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        setcookie("user", $username, time() + 3600, "/");
        
        // Redirect to the web_proj folder located one level up
        header("Location: ../web_proj/login2.html");
        exit();
    } else {
        $message = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <style>
        body { font-family: Arial; background: linear-gradient(to right, #4facfe, #00f2fe); margin: 0; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-box { width: 350px; padding: 30px; background: #fff; border-radius: 10px; box-shadow: 0px 0px 10px gray; text-align: center; }
        input[type="text"], input[type="password"] { width: 90%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc; }
        input[type="submit"] { width: 95%; padding: 10px; background: #4facfe; border: none; color: white; font-size: 16px; border-radius: 5px; cursor: pointer; }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Student Login</h2>
    <?php if ($message != "") { echo "<div class='error'>$message</div>"; } ?>
    <form method="post" action="login.php">
        <input type="text" name="username" placeholder="Enter Username" required><br>
        <input type="password" name="password" placeholder="Enter Password" required><br>
        <input type="submit" value="Login">
    </form>
    <br>
    <p>New User? <a href="register.php">Register Here</a></p>
</div>
</body>
</html>