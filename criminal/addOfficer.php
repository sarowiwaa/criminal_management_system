<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Criminal Management System - Home</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Light background */
            color: #333;
        }

        /* Main container styling */
        .container {
            width: 60%;
            margin: auto;
            padding: 20px;
            background-color: #fff; /* White background for the container */
            border: 2px solid #ffc107; /* Yellow border */
            margin-top: 50px;
            box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.3); /* Subtle shadow */
            border-radius: 10px; /* Rounded corners */
        }

        /* Header styling */
        h2 {
            text-align: center;
            color: #004085; /* Police blue color */
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            font-size: 16px;
        }

        /* Input fields and buttons styling */
        input, select, button {
            width: 95%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input:focus, select:focus {
            border: 1px solid #ffc107; /* Yellow border on focus */
            outline: none;
        }

        button {
            background-color: #004085; /* Police blue */
            color: #fff;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ffc107; /* Yellow hover effect */
            color: #000;
        }

        /* Success and error messages */
        .success {
            color: #28a745; /* Green for success */
            text-align: center;
            font-weight: bold;
        }

        .error {
            color: #dc3545; /* Red for errors */
            text-align: center;
            font-weight: bold;
        }

        /* Navbar styling */
        .navbar ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
            background-color: #004085; /* Police blue */
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .navbar ul li {
            display: inline;
            margin: 0 15px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 10px 15px;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .navbar ul li a:hover,
        .navbar ul li a.active {
            background-color: #ffc107; /* Yellow hover effect */
            color: #000;
            border-radius: 5px;
        }

        /* Logo and header styling */
        .finaldiv {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .head1, .head2 {
            flex: 1;
        }

        .head_txt {
            flex: 2;
            text-align: center;
            font-size: 24px;
            color: #004085; /* Police blue */
            font-weight: bold;
        }

        /* Button container for Print and Logout */
        .btn-container {
            display: flex;
            justify-content: flex-end;
            margin: 20px 0;
        }

        .btn-container button {
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            color: #fff;
            margin-left: 10px;
        }

        .print-btn {
            background-color: #ffc107; /* Yellow color */
        }

        .logout-btn {
            background-color: #f44336; /* Red color */
        }

        .logout-btn a {
            text-decoration: none;
            color: white;
        }

        .logout-btn:hover, .print-btn:hover {
            opacity: 0.9;
        }
    </style>
    <script>
        function printPage() {
            window.print(); // Opens the browser's print dialog
        }
    </script>
</head>
<body>
    <div class="btn-container">
        <!-- Print Button -->
        <button class="print-btn" onclick="printPage()">Print</button>
        
        <!-- Logout Button -->
        <button class="logout-btn">
            <a href="index.php">Logout</a>
        </button>
    </div>

    <div class="container">
        <div class="finaldiv">
            <span class="head1"><img src="police_logo.png" width="16.2%"></span>
            <span class="head_txt">Criminal Management System</span>
            <span class="head2"><img src="police_logo.png" width="38%"></span>
        </div>

        <div class="navbar">
            <ul>
            <li><a href="listOfOff.php"><b> Officer list</b></a></li>
                <li><a href="addOfficer.php" class="active"><b>Add Officer</b></a></li>
                <li><a href="searchOff.php"><b>Search Records</b></a></li>
                <li><a href="weapon.php" ><b>Weapons Assigned</b></a></li>
            </ul>
        </div>

        <h2>Add Officer</h2>
        <form method="POST">
            <table>
                <tr>
                    <td>Officer's Name:</td>
                    <td><input type="text" name="offName"></td>
                </tr>
                <tr>
                    <td>Officer's ID:</td>
                    <td><input type="text" name="offID"></td>
                </tr>
                <tr>
                    <td>Assigned Case ID:</td>
                    <td><input type="text" name="ID"></td>
                </tr>
                <tr>
                    <td>Contact:</td>
                    <td><input type="text" name="contact"></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="M"> Male
                        <input type="radio" name="gender" value="F"> Female
                    </td>
                </tr>
                <tr>
                    <td>Weapon Assigned:</td>
                    <td>
                        <select name="weapon">
                            <option value="">--Select weapon assigned to officer--</option>
                            <option value="M4">M4</option>
                            <option value="M107">M107</option>
                            <option value="Smith and Wesson M&P">Smith and Wesson M&P</option>
                            <option value="Glock Pistol">Glock Pistol</option>
                            <option value="Pistol Auto 9mm 1A">Pistol Auto 9mm 1A</option>
                            <option value="MP5 German Automatic Sub-machine Gun">MP5 German Automatic Sub-machine Gun</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Role:</td>
                    <td>
                        <select name="role">
                            <option value="">--Select role of officer--</option>
                            <option value="Sr.PI">Sr.PI (Senior Police Inspector)</option>
                            <option value="API">API (Asst. Police Inspector)</option>
                            <option value="PSI">PSI (Police Sub-Inspector)</option>
                            <option value="HC">HC (Head Constable)</option>
                            <option value="C">Constable</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="submit">Add Officer</button>
                    </td>
                </tr>
            </table>
        </form>

        <?php
        // Database connection details
        $db = "criminalinfo";
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Establish database connection
        $conn = mysqli_connect($servername, $username, $password, $db);
        if (!$conn) {
            die("<p class='error'>Connection failed: " . mysqli_connect_error() . "</p>");
        }

        // Handle form submission
        if (isset($_POST['submit'])) {
            // Retrieve form values
            $offName = trim($_POST['offName']);
            $offID = trim($_POST['offID']);
            $ID = trim($_POST['ID']);
            $contact = trim($_POST['contact']);
            $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';
            $weapon = trim($_POST['weapon']);
            $role = trim($_POST['role']);

            // Validate inputs
            if (empty($offName) || empty($offID) || empty($ID) || empty($contact) || empty($gender) || empty($weapon) || empty($role)) {
                echo "<p class='error'>Error: All fields are required!</p>";
            } else {
                // Prevent duplicate Officer ID
                $checkQuery = "SELECT * FROM officer WHERE offID = '$offID'";
                $checkResult = mysqli_query($conn, $checkQuery);

                if (mysqli_num_rows($checkResult) > 0) {
                    echo "<p class='error'>Error: Officer ID already exists. Please use a unique ID.</p>";
                } else {
                    // Insert into database
                    $query = "INSERT INTO officer (offName, offID, ID, contact, gender, weapon, role) 
                              VALUES ('$offName', '$offID', '$ID', '$contact', '$gender', '$weapon', '$role')";

                    if (mysqli_query($conn, $query)) {
                        echo "<p class='success'>Officer added successfully!</p>";
                    } else {
                        echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                    }
                }
            }
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>