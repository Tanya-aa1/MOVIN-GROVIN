<?php
$conn=mysqli_connect("localhost","root","","dbw");
if(!$conn){
die("Connection not Successfull!");
}
//print "Connection Created Succesfully! <br>";


session_start();
// Now $_SESSION['variableToAccess'] is accessible in this file
$avi2= $_SESSION['$avi'];

    // Retrieve course,students
    $sql = "SELECT qual FROM teacher WHERE tuser_id='$avi2'" ;
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row=mysqli_fetch_array($result)) {
            echo "Your course is: ".$row["qual"];
            //$course_name=$row["c_name"];
          
        }
    }

        $sql2 = "select s_name,name from courses,student  where t_name='$avi2 ' and student.user_id=courses.s_name";
        $result2 = mysqli_query($conn,$sql2);

        if (mysqli_num_rows($result2) > 0) {
            echo "<br>Enrolled students are: ";
            while ($row2=mysqli_fetch_array($result2)) {
                echo $row2["name"]." , ";             
            }
        }
        else{
            echo "<br>No enrolled students yet.";
        }


    
// Close the database connection
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

<form action="home.html" method="get">
    <button type="submit">LOGOUT</button>
</form>

</body>
</html>