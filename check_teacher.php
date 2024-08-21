

<?php

// Create a connection

$conn=mysqli_connect("localhost","root","","dbw");
if(!$conn){
die("Connection not Successfull!");
}
//print "Connection Created Succesfully! <br>";

// Retrieve user input
$tuser_id = $_POST['tuser_id'];
$tpassword = $_POST['tpassword'];


session_start();
$_SESSION['$avi'] = $tuser_id;

// SQL query to check if the credentials are valid
$sql = "SELECT * FROM teacher WHERE tuser_id = '$tuser_id' AND tpass = '$tpassword'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    echo "Sign-in Successful!";
} else {
   
    echo '<script>alert("Invalid credentials.");</script>';
    echo '<script>
        setTimeout(function() {
            window.location.href = "teacher_signin.html";
        }, 1000); // Delay in milliseconds (e.g., 1000 = 1 second)
      </script>';
    //header("Location: student_signin.html");
    exit(); // Ensure that no further code is executed after the redirect
}

// Close the connection
mysqli_close($conn);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<form action="course_teach.php" method="get">
    <button type="submit">continue</button>
</form>

<form action="home.html" method="get">
    <button type="submit">LOGOUT</button>
</form>

</body>
</html>