<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: index.php");
    exit;
}
if ($_SESSION['role'] != "student") {
    if ($_SESSION['role'] == "admin") {
        header("Location: home.php");
        exit;
    }

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            background-color: #2c3e50;
            width: 100%;
            padding: 15px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
        }

        .navbar h2 {
            margin: 0;
            font-size: 1.5rem;
            letter-spacing: 1px;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .container {
            max-width: 600px;
            width: 90%;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            text-align: center;
        }

        .welcome-message {
            font-size: 1.2rem;
            color: #333;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h2>Student Portal</h2>
        <a href="logout.php" class="logout-btn">Log Out</a>
    </div>

    <div class="container">
        <div class="welcome-message">
            <?php
            echo "You're logged in as a " . htmlspecialchars($_SESSION['role']) . ".";
            ?>
        </div>
    </div>

</body>
</html>