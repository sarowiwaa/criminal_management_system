<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "criminalinfo";
$conn = mysqli_connect($servername, $username, $password, $db);

$message = '';
$redirect = false;

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $offName = isset($_POST['offName']) ? trim($_POST['offName']) : '';
    $offID = isset($_POST['offID']) ? trim($_POST['offID']) : '';

    if (!empty($offName) && !empty($offID)) {
        $stmt = $conn->prepare("SELECT * FROM officer WHERE offName = ? AND offID = ?");
        $stmt->bind_param("ss", $offName, $offID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $message = "Login successful! Welcome, " . htmlspecialchars($row['offName']) . ".";
            $messageType = "success";
            $redirect = true;
        } else {
            $message = "Invalid Officer Name or Officer ID.";
            $messageType = "error";
        }

        $stmt->close();
    } else {
        $message = "Please enter both Officer Name and Officer ID.";
        $messageType = "error";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Criminal Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            text-align: center;
            border: 3px solid #ffc107; /* Yellow border */
        }

        .logo {
            width: 20%;
            margin-bottom: 20px;
        }

        h1 {
            color: #004085; /* Police blue */
            font-size: 28px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            text-align: left;
            font-size: 16px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="password"] {
            padding: 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #004085; /* Police blue focus */
        }

        button {
            padding: 12px;
            background-color: #004085; /* Police blue */
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ffc107; /* Yellow hover */
            color: #000;
        }

        .back-button {
            margin-top: 15px;
            padding: 12px;
            background-color: #ffc107; /* Yellow */
            color: #004085; /* Police blue text */
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .back-button:hover {
            background-color: #004085; /* Police blue */
            color: white;
        }

        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        p {
            font-size: 14px;
        }

        .link {
            color: #004085;
            font-weight: bold;
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
    <?php if ($redirect): ?>
        <script>
            setTimeout(() => {
                window.location.href = 'home.php';
            }, 1000);
        </script>
    <?php endif; ?>
</head>
<body>
    <div class="container">
        <img src="police_logo.png" alt="Police Logo" class="logo">
        <h1>Officer Login</h1>

        <?php if (!empty($message)): ?>
            <div class="message <?php echo htmlspecialchars($messageType); ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="offName">Officer Name:</label>
            <input type="text" id="offName" name="offName" required>

            <label for="offID">Officer ID (Password):</label>
            <input type="password" id="offID" name="offID" required>

            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php" class="link">Register here</a></p>
        <a href="index.php" class="back-button">Back</a>
        <footer>© 2025 Criminal Management System-sarowiwa</footer>
    </div>
</body>
</html>
