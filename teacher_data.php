<!-- this file stores the data into table and display on the web that thank you for registration and then show a continue button to log in-->


<?php
$conn=mysqli_connect("localhost","root","","dbw");
if(!$conn){
die("Connection not Successfull!");
}
//print "Connection Created Succesfully! <br>";

// Retrieve data from the form
$tuser_id = $_POST['tuser_id'];
$tname = $_POST['tname'];
$tpass = $_POST['tpass'];
$tphone_no = $_POST['tphone_no'];
$tdob = $_POST['tdob'];
$tgender = $_POST['tgender'];
$tcity = $_POST['tcity'];
$qual= $_POST['qual'];
$pay= $_POST['pay'];
$pay_no=$_POST['pay_no'];

// SQL query to insert data into the 'teacher' table
$sql = "INSERT INTO teacher (tuser_id, tname, tpass, tphone_no, tdob, tgender, tcity,qual,pay,pay_no) 
        VALUES ('$tuser_id', '$tname', '$tpass', $tphone_no, '$tdob', '$tgender', '$tcity','$qual','$pay','$pay_no')";

// Execute the query
if (mysqli_query($conn,$sql)) {
    echo "REGISTRATION SUCCESSFUL!!";
// Add a "Continue" button to redirect to teacher.html
echo '<form action="teacher.html">
<input type="submit" value="Continue">
</form>';


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