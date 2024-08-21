<?php
$conn=mysqli_connect("localhost","root","","dbw");
if(!$conn){
die("Connection not Successfull!");
}
//print "Connection Created Succesfully! <br>";


    // Get selected course ID from the form
    $CourseID = $_POST['course'];
    //echo "$CourseID";
    //$CourseName=$_POST[""]

    // Retrieve selected course details
    $sql = "SELECT c_name FROM catalogue WHERE c_id = $CourseID";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row=mysqli_fetch_array($result)) {
            $course_name=$row["c_name"];
          
        }
    }

    //$random_value VARCHAR2(100);
    $sql2="SELECT tuser_id  FROM (SELECT tuser_id FROM teacher where qual='$course_name' ORDER BY RAND() )as subquery limit 1";
$result2=mysqli_query($conn,$sql2);
if (mysqli_num_rows($result2) > 0) {
    while ($row2=mysqli_fetch_array($result2)) {
        $teacher=$row2["tuser_id"];
    }

    session_start();

// Now $_SESSION['variableToAccess'] is accessible in this file
$tanya2= $_SESSION['$tanya'];
        // Insert data into the "courses" table
        $insertSql = "INSERT INTO courses (c_id, c_name,s_name,t_name) VALUES (' $CourseID', '$course_name','$tanya2','$teacher')";

        if (mysqli_query($conn,$insertSql) === TRUE) {
            echo "Course selected and stored in the 'courses' table successfully!";
        } else {
            echo "Error: " ;
        }}
    else{
        echo "You cannot enroll in this course as no teacher available. ";
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
<form action="courses.html" method="get">
    <button type="submit">CHOOSE ANOTHER COURSE?</button>
</form>

<form action="home.html" method="get">
    <button type="submit">LOGOUT</button>
</form>
</body>
</html>