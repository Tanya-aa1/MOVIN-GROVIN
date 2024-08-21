<!-- this file stores the data into table and display on the web that thank you for registration and then show a continue button to log in-->

<!-- student_data.php -->

<?php
$conn=mysqli_connect("localhost","root","","dbw");
if(!$conn){
die("Connection not Successfull!");
}
//print "Connection Created Succesfully! <br>";

// Retrieve data from the form
$user_id = $_POST['user_id'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$phone_no = $_POST['phone_no'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$city = $_POST['city'];

// SQL query to insert data into the 'student' table
$sql = "INSERT INTO student (user_id, name, pass, phone_no, dob, gender, city) 
        VALUES ('$user_id', '$name', '$pass', $phone_no, '$dob', '$gender', '$city')";

// Execute the query
if (mysqli_query($conn,$sql)) {
    echo "REGISTRATION SUCCESSFUL!!";
// Add a "Continue" button to redirect to student.html



} else {
    echo "error: <br>";
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

        input {
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
<form action="student.html">
<input type="submit" value="Continue">
</form>
</body>
</html>