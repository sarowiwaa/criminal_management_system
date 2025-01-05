<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "criminalinfo";
$conn = mysqli_connect($servername, $username, $password, $db);

$message = '';

// Handle password change
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = isset($_POST['old_password']) ? trim($_POST['old_password']) : '';
    $newPassword = isset($_POST['new_password']) ? trim($_POST['new_password']) : '';
    $confirmPassword = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    // Validate if old password, new password, and confirm password are provided
    if (!empty($oldPassword) && !empty($newPassword) && !empty($confirmPassword)) {
        // Check if the old password is correct
        $stmt = $conn->prepare("SELECT password FROM admin WHERE username = 'admin'");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row && MD5($oldPassword) === $row['password']) {
            // Check if new passwords match
            if ($newPassword === $confirmPassword) {
                // Update password in the database
                $stmt = $conn->prepare("UPDATE admin SET password = MD5(?) WHERE username = 'admin'");
                $stmt->bind_param("s", $newPassword);

                if ($stmt->execute()) {
                    $message = "Password successfully updated!";
                    $messageType = "success";
                } else {
                    $message = "Failed to update the password.";
                    $messageType = "error";
                }

                $stmt->close();
            } else {
                $message = "New passwords do not match.";
                $messageType = "error";
            }
        } else {
            $message = "Incorrect old password.";
            $messageType = "error";
        }
    } else {
        $message = "Please fill in all fields.";
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
    <title>Change Admin Password</title>
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
            width: 100px;
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
</head>
<body>
    <div class="container">
        <img src="police_logo.png" alt="Police Logo" class="logo">
        <h1>Change Admin Password</h1>

        <?php if (!empty($message)): ?>
            <div class="message <?php echo htmlspecialchars($messageType); ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="old_password">Old Password:</label>
            <input type="password" id="old_password" name="old_password" required>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>

            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Change Password</button>
        </form>
        <a href="login2.php" class="back-button">Back to Login</a>
    </div>
</body>
</html>
