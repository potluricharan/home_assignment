<?php
if (isset($_COOKIE['user'])) {
    $user = $_COOKIE['user'];
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #667eea, #764ba2);
            margin: 0;
            padding: 0;
        }
        .welcome-box {
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
        .username {
            color: #007bff;
            font-weight: bold;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #ff4b5c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: #dc3545;
        }
        .info {
            margin-top: 15px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="welcome-box">
    <h2>Welcome </h2>
    
    <p>Hello, <span class="username"><?php echo $user; ?></span></p>
    
    <div class="info">
        You have successfully logged in.
    </div>

    <a href="logout.php" class="btn">Logout</a>
</div>

</body>
</html>