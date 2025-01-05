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
            background-color: #f4f4f4;
            color: #333;
        }

        /* Main container styling */
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border: 2px solid #ffc107;
            margin-top: 50px;
            box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        /* Header styling */
        h2 {
            text-align: center;
            color: #004085;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: center;
            padding: 12px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        th {
            background-color: #004085;
            color: white;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
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
            border: 1px solid #ffc107;
            outline: none;
        }

        button {
            background-color: #004085;
            color: #fff;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ffc107;
            color: #000;
        }

        /* Navbar styling */
        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
            background-color: #004085;
            border-radius: 5px;
            overflow: hidden;
        }

        .navbar ul li {
            display: inline;
            margin: 0;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            padding: 14px 20px;
            display: inline-block;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .navbar ul li a:hover, .navbar ul li a.active {
            background-color: #ffc107;
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
            color: #004085;
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
            background-color: #ffc107;
        }

        .logout-btn {
            background-color: #f44336;
        }

        .logout-btn a {
            text-decoration: none;
            color: white;
        }

        .logout-btn:hover, .print-btn:hover {
            opacity: 0.9;
        }

        /* Table background image */
        table {
            background-image: url('police_logo_1.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
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
                <li><a href="addOfficer.php" ><b>Add Officer</b></a></li>
                <li><a href="searchOff.php"  class="active"><b>Search Records</b></a></li>
                <li><a href="weapon.php"><b>Weapons Assigned</b></a></li>
            </ul>
        </div>
            </div>
            <span class="searchGroup">
                <form method="post">
                    <input type="text" class="searchBar" placeholder="Search for Police Officer" name="search">
                    <button type="submit" class="searchBtn">Search</button>
                </form>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "criminalinfo";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $data = trim($_POST['search']);
                    
                    if (empty($data)) {
                        echo "<script>alert('Please enter a name to search');</script>";
                    } else {
                        $stmt = $conn->prepare("SELECT offName, offID, ID, contact, gender, weapon, role FROM officer WHERE offName LIKE ?");
                        $searchQuery = "%" . $data . "%";
                        $stmt->bind_param("s", $searchQuery);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo '<table>
                                <tr>
                                    <th>Officer Name</th>
                                    <th>Officer ID</th>
                                    <th>Assigned Case ID</th>
                                    <th>Contact</th>
                                    <th>Gender</th>
                                    <th>Weapon</th>
                                    <th>Role</th>
                                </tr>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>
                                    <td>' . htmlspecialchars($row['offName']) . '</td>
                                    <td>' . htmlspecialchars($row['offID']) . '</td>
                                    <td>' . htmlspecialchars($row['ID']) . '</td>
                                    <td>' . htmlspecialchars($row['contact']) . '</td>
                                    <td>' . htmlspecialchars($row['gender']) . '</td>
                                    <td>' . htmlspecialchars($row['weapon']) . '</td>
                                    <td>' . htmlspecialchars($row['role']) . '</td>
                                </tr>';
                            }
                            echo '</table>';
                        } else {
                            echo "<script>alert('No records found for the search term');</script>";
                        }

                        $stmt->close();
                    }
                }

                $conn->close();
                ?>
            </span>
        </div>
    </div>
</body>
</html>
