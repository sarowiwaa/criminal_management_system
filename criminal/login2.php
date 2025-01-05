<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Admin Login - Criminal Management System</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
         /* General Button Styling */
         button, .back-button {
            background-color: #003366; /* Police Blue */
            color: white;
            border: 2px solid #FFD700; /* Gold border */
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            width: 100%;
            display: block;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
         }

         /* Button Hover Effect */
         button:hover, .back-button:hover {
            background-color: #FFD700;
            color: #003366;
            transform: scale(1.1);
         }

         /* Styling for the login container */
         .login-container {
            margin: 0 auto;
            margin-top: 100px;
            width: 400px;
            background-color: #f9f9f9;
            border: 2px solid #003366;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
         }

         /* Input fields */
         input[type="text"],
         input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #003366;
            border-radius: 5px;
            font-size: 16px;
         }

         /* Link styling for 'Change Password' */
         .change-password {
            display: inline-block;
            margin-top: 10px;
            color: #FFD700;
            text-decoration: none;
            font-weight: bold;
         }

         .change-password:hover {
            color: #003366;
            text-decoration: underline;
         }

         /* Center the logo */
         .logo {
            text-align: center;
            margin-bottom: 20px;
         }

         .logo img {
            width: 20%;
         }

         /* Title styling */
         .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #003366;
            margin-bottom: 20px;
         }

         /* Remove background */
         body {
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* White background */
            font-family: Arial, sans-serif;
         }
      </style>
   </head>
   <body>
      <div class="logo">
         <img src="police_logo.png" alt="Police Logo">
      </div>
      <div class="title">Criminal Management System - Admin Login</div>
      <div class="login-container">
         <form action="listOfOff.php" method="POST">
            <label for="username" style="font-weight: bold; color: #003366;">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
            
            <label for="password" style="font-weight: bold; color: #003366;">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            
            <button type="submit">Login</button>
      
         </form>
         
         <a href="offregister.php" class="change-password">Change Admin Password</a>
         
      </div>
      <a href="index.php" class="back-button">Back</a>
   </body>
</html>
