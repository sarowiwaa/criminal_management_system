<?php 
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "criminalinfo";
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = ''; // Variable to store feedback messages

// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize inputs
    $offName = isset($_POST['offName']) ? mysqli_real_escape_string($conn, trim($_POST['offName'])) : '';
    $offID = isset($_POST['offID']) ? mysqli_real_escape_string($conn, trim($_POST['offID'])) : '';
    $ID = isset($_POST['ID']) ? mysqli_real_escape_string($conn, trim($_POST['ID'])) : '';
    $contact = isset($_POST['contact']) ? mysqli_real_escape_string($conn, trim($_POST['contact'])) : '';
    $gender = isset($_POST['gender']) ? mysqli_real_escape_string($conn, trim($_POST['gender'])) : '';
    $weapon = isset($_POST['weapon']) ? mysqli_real_escape_string($conn, trim($_POST['weapon'])) : '';
    $role = isset($_POST['role']) ? mysqli_real_escape_string($conn, trim($_POST['role'])) : '';

    // Check for empty fields
    if (!empty($offName) && !empty($offID) && !empty($ID) && !empty($contact) && !empty($gender) && !empty($weapon) && !empty($role)) {
        // Prepare and execute SQL statement
        $stmt = $conn->prepare("INSERT INTO officer (offName, offID, ID, contact, gender, weapon, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $offName, $offID, $ID, $contact, $gender, $weapon, $role);

        if ($stmt->execute()) {
            $message = "Officer registered successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close(); // Close the statement
    } else {
        $message = "Please fill out all fields.";
    }
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer Registration - Criminal Management System</title>
    <style>
        /* Include the CSS code you already styled earlier */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #004085, #002752);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 500px;
            text-align: center;
            border: 4px solid #ffc107; /* Yellow border */
        }

        .logo {
            width: 70px;
            margin-bottom: 20px;
        }

        h1 {
            color: #004085; /* Police blue */
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
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
            color: #004085;
        }

        input[type="text"], input[type="password"] {
            padding: 12px;
            font-size: 14px;
            border: 2px solid #004085;
            border-radius: 8px;
            outline: none;
            background: #f9f9f9;
            color: #004085;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #ffc107; /* Yellow focus */
            box-shadow: 0 0 8px #ffc107;
        }

        button {
            padding: 12px;
            background: linear-gradient(90deg, #004085, #002752);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s, transform 0.2s;
        }

        button:hover {
            background: linear-gradient(90deg, #ffc107, #ffcc00);
            color: #004085;
            transform: scale(1.05);
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
            color: #555;
        }

        .link {
            color: #004085;
            font-weight: bold;
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }

        footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="police_logo.png" alt="Police Logo" class="logo">
        <h1>Officer Registration</h1>

        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, 'successfully') !== false ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="offName">Officer Name:</label>
            <input type="text" id="offName" name="offName" required>

            <label for="offID">Officer ID:</label>
            <input type="password" id="offID" name="offID" required>

            <label for="ID">National ID:</label>
            <input type="text" id="ID" name="ID" required>

            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" required>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" required>

            <label for="weapon">Weapon:</label>
            <input type="text" id="weapon" name="weapon" required>

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login1.php" class="link">Login here</a></p>
        <footer>© 2025 Criminal Management System</footer>
    </div>
</body>
</html>
