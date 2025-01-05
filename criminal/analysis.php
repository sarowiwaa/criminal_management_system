<!DOCTYPE html>
<html>
   <head>
      <meta charset='utf-8'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <title>Criminal Management System - Home</title>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
      <link rel='stylesheet' type='text/css' media='screen' href='style_1.css'>
      <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-core.min.js"></script>
      <script src="https://cdn.anychart.com/releases/8.0.1/js/anychart-pie.min.js"></script>
      <style type="text/css">
         #contain{
            height: 600px;
            width: 600px;
            margin-left: 150px;
            margin-top: 20px;
         }
      </style>
   </head>
   <body>
      <button name="logout" style="margin-left: 1424px;"><img src="logout.png" style="width:10px"><a href="logout.php">Log out</a></button>
      <div class="container" style="height:780px;">
         <div class="finaldiv">
            <span class="head1"><img src="police_logo.png" width="16.2%"></span>
            <span class="head_txt">Criminal Management System</span>
            <span class="head2"><img src="police_logo.png" width="38%"></span>
            <br>
            <div class="navbar">
               <ul style="margin-left:20px">
                  <li><a href="index.php"><b>Criminal Information</b></a></li>
                  <li><a href="search.php"><b>Search Records</b></a></li>
                  <li><a href="offList.php"><b>List of Officers</b></a></li>
                  <li><a href="analysis.php" class="active"><b>Analytics</b></a></li>
               </ul>
               <div id="contain" style=""></div>

               <?php
               $servername="localhost";
               $username="root";
               $pass="";
               $db="criminalinfo";
               $conn=mysqli_connect($servername,$username,$pass,$db);  

               // Get the total number of crimes
               $q2="SELECT COUNT(*) FROM `info`";
               $result=mysqli_query($conn, $q2);
               $row = mysqli_fetch_array($result);
               $total = $row[0];

               // Query counts for each crime type
               $crimeTypes = ['Ragging', 'Robbery', 'Kidnapping', 'Rape', 'Murder', 'Fraud'];
               $data = [];
               foreach ($crimeTypes as $crime) {
                   $query = "SELECT COUNT(*) FROM `info` WHERE crime='$crime'";
                   $result = mysqli_query($conn, $query);
                   $row = mysqli_fetch_array($result);
                   $percentage = ($row[0] / $total) * 100;
                   $data[] = "{x: '$crime', value: '$percentage'}";
               }
               
               // Pass the data to JavaScript
               $dataString = implode(",", $data);
               echo "
               <script>
               anychart.onDocumentReady(function() {
                   var data = [$dataString];
                   var chart = anychart.pie();
                   chart.title('Crime Rate');
                   chart.data(data);
                   chart.container('contain');
                   chart.draw();
               });
               </script>
               ";
               ?>
            </div>
         </div>
      </div>
   </body>
</html>
