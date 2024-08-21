

<?php

// Create a connection

$conn=mysqli_connect("localhost","root","","dbw");
if(!$conn){
die("Connection not Successfull!");
}
//print "Connection Created Succesfully! <br>";

// Retrieve user input
$user_id = $_POST['user_id'];
$password = $_POST['password'];

session_start();
$_SESSION['$tanya'] = $user_id;

// SQL query to check if the credentials are valid
$sql = "SELECT * FROM student WHERE user_id = '$user_id' AND pass = '$password'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    // "Sign-in Successful!";
    // header("Location: courses_stud.php");
    echo '<script>alert("Sign-in Successfull.");</script>';
// SQL query to extract course_name based on s_name
$rec = "SELECT c_id,c_name FROM courses WHERE s_name = '$user_id'";
$records = mysqli_query($conn,$rec);

if (mysqli_num_rows($records) > 0) {
    // Fetch and display course_name(s)
    while ($row=mysqli_fetch_array($records)) {
        echo "Course ID: ".$row["c_id"]."      Course Name: " . $row["c_name"] . "<br>";
    }
} else {
    echo "<br><br>You have not enrolled in any courses.<br><br>";
}
}
 else {
    // Invalid credentials. Redirect to student_login.html
    echo '<script>alert("Invalid credentials.");</script>';
    echo '<script>
        setTimeout(function() {
            window.location.href = "student_signin.html";
        }, 1000); // Delay in milliseconds (e.g., 1000 = 1 second)
      </script>';
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

<form action="courses.html" method="get">

    <button type="submit">Enroll in a New Course?</button>
</form>

<form action="home.html" method="get">
    <button type="submit">LOGOUT</button>
</form>

</body>
</html>

