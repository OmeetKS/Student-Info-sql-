<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    try {
        require_once "student.php";

        $query = "DELETE FROM students WHERE id = :id";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id",$id);

        $stmt->execute();
        

        $pdo = null;
        $stmt = null;

        header("Location: home.php");
        exit();
    }catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
    }else{
    
        header("Location: ../home.php");
        exit();
} 