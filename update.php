<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="website.css"> <!-- Link to an external CSS file for styling -->

    <title>Students Information</title>
</head>

<body>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="create.php">Create Profile</a></li>
                <li><a href="search.php">Search Profile</a></li>
                <li><a href="update.php">Update Profile</a></li>
                <li><a href="delete.php">Delete Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        
        
        <h1>Update Student Profile</h1>
            <div> 
                <form action="studentupdate.php" method="post">
                <label for="studentID">Student ID:</label><br>
                <input type="text"  name="id" placeholder="Student ID"><br><br>

                <label for="name">Name:</label><br>
                <input type="text" name="name" placeholder="Full Name"><br><br>
                
                <label for="priorEducation">Prior Education:</label><br>
                <input type="text"  name="predu" placeholder="Level of Education"><br><br>
                
                <label for="enrollmentDate">Date of Enrollment:</label><br>
                <input type="date"  name="enrdate"><br><br>
                
                <label for="currentStatus">Current Status:</label><br>
                <input type="text"  name="stat" placeholder="Active/Graduated"><br>
                
                <label for="currentGrade">Current Grade:</label><br>
                <input type="text" name="grade" placeholder="CPA" ><br><br>
                
                <label for="academicOffenses">Academic Offense(s):</label><br>
                <textarea type="text" name="acdoff" rows="4" cols="50"></textarea><br><br>
                
                <label for="graduationEligibility">Eligibility for Graduation:</label><br>
                <input type="text" name="elig" placeholder="Eligible/Not Eligible"><br>

                <button>Update Student</button>
            <div>
        
    
    </body>

</html>