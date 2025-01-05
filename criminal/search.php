<!DOCTYPE html>
<html>
   <head>
      <meta charset='utf-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <title>Criminal Management System - Home</title>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' type='text/css' media='screen' href='style_1.css'>
      <script src='main.js'></script>
   </head>
   <body>
      <!-- Logout Button -->
      <button name="logout" style="margin-left: 1424px;">
         <img src="logout.png" style="width:10px">
         <a href="logout.php">Log out</a>
      </button>
      <div class="container" style="height:980px;">
         <div class="finaldiv">
            <span class="head1"><img src="police_logo.png" width="16.2%"></span>
            <span class="head_txt">Criminal Management System</span>
            <span class="head2"><img src="police_logo.png" width="38%"></span>
            <br>
            <div class="navbar">
               <ul style="margin-left:20px">
                  <li><a href="home.php"><b>Criminal Information</b></a></li>
                  <li><a href="search.php" class="active"><b>Search Records</b></a></li>
                  <li><a href="offList.php"><b>List of Officers</b></a></li>
                  <li><a href="analysis.php"><b>Analytics</b></a></li>
               </ul>
            </div>
            <div class="searchGroup">
               <form method="post">
                  <!-- Search Input -->
                  <input type="text" class="searchBar" placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search Criminal's By Name" name="search">
                  <button class="searchBtn"><img src="search.png" width="50%"></button>
               </form>
               <img src="police_logo_1.png" style="position:absolute;top:140px;margin-top: -90px; background-size: 90%;margin-left: -50px; height:469px">
               <?php
                  session_start();
                  $servername = "localhost";
                  $username = "root";
                  $pass = "";
                  $db = "criminalinfo";
                  $conn = mysqli_connect($servername, $username, $pass, $db);
                  
                  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                      if (isset($_POST['search']) && !empty($_POST['search'])) {
                          $data = $_POST['search'];
                          $_SESSION['data'] = $data;
                          $q1 = "SELECT * FROM info WHERE name='$data'";
                      } elseif (isset($_POST['searchAll'])) {
                          $q1 = "SELECT * FROM info";
                      } else {
                          echo "<script>alert('Please enter a name to search.');</script>";
                      }
                  
                      $result = isset($q1) ? mysqli_query($conn, $q1) : null;
                      if ($result && mysqli_num_rows($result) > 0) {
                          echo '<table border="5" style="position:relative;left:-180px;top: 65px;">
                              <thead>
                                  <tr>
                                      <th>Criminal Image</th>
                                      <th>Criminal ID</th>
                                      <th>Criminal Name</th>
                                      <th>Complainant Name</th>
                                      <th>Assigned Officer</th>
                                      <th>Crime Type</th>
                                      <th>Section</th>
                                      <th>Criminals DOB</th>
                                      <th>Arrest Date</th>
                                      <th>Date of Crime</th>
                                      <th>Gender</th>
                                      <th>Address</th>
                                  </tr>
                              </thead>';
                          while ($row = mysqli_fetch_array($result)) {
                              echo '
                              <tr>
                                  <td><img src="' . $row['img'] . '" width="100"></td>
                                  <td>' . $row['id'] . '</td>
                                  <td>' . $row['name'] . '</td>
                                  <td>' . $row['complainantName'] . '</td>
                                  <td>' . $row['offname'] . '</td>
                                  <td>' . $row['crime'] . '</td>
                                  <td>' . $row['more'] . '</td>
                                  <td>' . $row['dob'] . '</td>
                                  <td>' . $row['arrDate'] . '</td>
                                  <td>' . $row['crimeDate'] . '</td>
                                  <td>' . $row['sex'] . '</td>
                                  <td>' . $row['address'] . '</td>
                              </tr>';
                          }
                          echo '</table>';
                  
                          // Print and Search All Buttons
                          echo '
                          <center>
                              <!-- Search All Button (above Print Button) -->
                              <form method="post" style="display: inline;">
                                  <button type="submit" name="searchAll" class="submitBtn" style="position: absolute;top: 470px;left: 400px;">Search All</button>
                              </form>
              
                              <!-- Print Button -->
                              <button onclick="window.print()" class="submitBtn" style="position: absolute;top: 530px;left: 400px;">Print</button>
                          </center>';
                  
                          // Exit Button
                          echo '<center><a href="index.php" style="text-decoration: none;"><button class="submitBtn" style="position: absolute;top: 580px;left: 400px;">Exit</button></a></center>';
                      } else {
                          echo "<script>alert('No Records Found');</script>";
                      }
                  }
               ?>
            </div>
         </div>
      </div>
   </body>
</html>
