<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    try {
        require_once "student.php";

        $query = "SELECT * FROM students WHERE id = :id;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id",$id);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

    }catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    }else{
    
        header("Location: ../home.php");
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
            </ul>
        </nav>

<section>
    <h1>Search results:</h1>
    <?php

    if(empty($results)){
        echo "<div>";
        echo "<p>No results found!</p>";
        echo "</div>";
    }else{
    
        foreach($results as $row){
            echo "<div>";
            echo "<p>Student ID: " . htmlspecialchars($row["id"]) . "</p>";
            echo "<p>Name: " . htmlspecialchars($row["name"]) . "</p>";
            echo "<p>Prior Education: " . htmlspecialchars($row["predu"]) . "</p>";
            echo "<p>Date of Enrollment: " . htmlspecialchars($row["enrdate"]) . "</p>";
            echo "<p>Current Status: " . htmlspecialchars($row["stat"]) . "</p>";
            echo "<p>Grade:" . htmlspecialchars($row["grade"]) . "</p>";
            echo "<p>Acedemic Offense(s): " . htmlspecialchars($row["acdoff"]) . "</p>";
            echo "<p>Eligibility: " . htmlspecialchars($row["elig"]) . "</p>";
            echo "</div>";
        }
    }   
    ?> 
    </section>

</body>

</html>