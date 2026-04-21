<?php
// Delete cookie
setcookie("user", "", time() - 3600, "/");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #ff758c, #ff7eb3);
            margin: 0;
            padding: 0;
        }
        .logout-box {
            width: 400px;
            padding: 30px;
            background: #fff;
            margin: 120px auto;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .message {
            color: #28a745;
            font-size: 18px;
            margin: 15px 0;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

<div class="logout-box">
    <h2>Logout Successful</h2>

    <div class="message">
        You have been logged out successfully.
    </div>

    <a href="login.php" class="btn">Login Again</a>
</div>

</body>
</html>