<!DOCTYPE html>
<html>
   <head>
      <meta charset='utf-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <title>Criminal Management System - Home</title>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' type='text/css' media='screen' href='style_1.css'>
   </head>
   <body>
      <button name="logout" style="margin-left: 1424px;"><img src="logout.png" style="width:10px"><a href = "logout.php">Log out</a></button>
      <div class="container" style="height:980px;"> 
      <div class="finaldiv">
      <span class="head1"><img src="police_logo.png" width="16.2%"></span>
      <span class="head_txt">Criminal Management System</span>
      <span class="head2"><img src="police_logo.png" width="38%"></span>
      <br>
      <div class="navbar">
         <ul style="margin-left:20px">
            <li><a href="home.php"><b>Criminal Information</b></a></li>
            <li><a href="search.php" ><b>Search Records</b></a></li>
            <li><a href="offList.php" class="active"><b>List of Officers</b></a></li>
            <li><a href="analysis.php"><b>Analytics</b></a></li>
         </ul>
         <br>
         <br>
         <div>
            <table border="5" style="position:absolute; left:150px; top:200px; background-image: url('police_logo_1.png'); background-repeat:no-repeat; margin-top: 50px; background-size: 90%; width: 50%; height:469px;">
            <tr>
               <th>Officer Name</th>
               <th>Officer ID</th>
               <th>ID</th>
               <th>Contact</th>
               <th>Gender</th>
               <th>Weapon</th>
               <th>Role</th>
            </tr>
            <?php 
               $servername = "localhost";
               $username = "root";
               $password = "";
               $db = "criminalinfo";
               $conn = mysqli_connect($servername, $username, $password, $db);
               
               // Check the connection
               if (!$conn) {
                   die("Connection failed: " . mysqli_connect_error());
               }

               $q1 = "SELECT * FROM `officer`";
               $result = mysqli_query($conn, $q1);

               if ($result) {
                   while ($row = mysqli_fetch_array($result)) {
                       echo '
                           <tr>
                               <td>'.$row['offName'].'</td>
                               <td>'.$row['offID'].'</td>
                               <td>'.(isset($row['ID']) ? $row['ID'] : 'N/A').'</td>
                               <td>'.$row['contact'].'</td>
                               <td>'.$row['gender'].'</td>
                               <td>'.$row['weapon'].'</td>
                               <td>'.$row['role'].'</td>
                           </tr>';
                   }
               } else {
                   echo "<tr><td colspan='7'>Error fetching data from database</td></tr>";
               }

               // Close the connection
               mysqli_close($conn);
            ?>
            </table>
         </div>

         <!-- Print and Exit Buttons -->
         <center>
            <!-- Print Button moved slightly to the right -->
            <button onclick="window.print()" class="submitBtn" style="position: absolute;top: 650px;left: 650px;">Print</button>
            
            <!-- Exit Button (Redirect to index.php) moved slightly to the right -->
            <a href="index.php" style="text-decoration: none;">
                <button class="submitBtn" style="position: absolute;top: 700px;left: 650px;">Exit</button>
            </a>
         </center>
      </div>
   </body>
</html>
