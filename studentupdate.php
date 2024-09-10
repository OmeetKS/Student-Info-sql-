<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $predu = filter_input(INPUT_POST, "predu", FILTER_SANITIZE_STRING);
    $enrdate = filter_input(INPUT_POST, "enrdate", FILTER_SANITIZE_STRING);
    $stat = filter_input(INPUT_POST, "stat", FILTER_SANITIZE_STRING);
    $grade = filter_input(INPUT_POST, "grade", FILTER_SANITIZE_STRING);
    $acdoff = filter_input(INPUT_POST, "acdoff", FILTER_SANITIZE_STRING);
    $elig = filter_input(INPUT_POST, "elig", FILTER_SANITIZE_STRING);

    // Validate ID
    if (!$id || !is_numeric($id)) {
        // Log invalid ID error and redirect
        error_log("Invalid student ID provided: " . $_POST["id"], 3, "error_log.txt");
        header("Location: ../home.php");
        exit();
    }

    try {
        // Include database connection
        require_once "student.php"; // Ensure this file securely connects to your database

        // Prepare the UPDATE query with parameterized statements
        $query = "UPDATE students SET name = :name, predu = :predu, enrdate = :enrdate, stat = :stat, grade = :grade, acdoff = :acdoff, elig = :elig WHERE id = :id";
        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":predu", $predu);
        $stmt->bindParam(":enrdate", $enrdate);
        $stmt->bindParam(":stat", $stat);
        $stmt->bindParam(":grade", $grade);
        $stmt->bindParam(":acdoff", $acdoff);
        $stmt->bindParam(":elig", $elig);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Close the database connection
        $pdo = null;
        $stmt = null;

        // Redirect to the home page
        header("Location: home.php");
        exit();
    } catch (PDOException $e) {
        // Log the error and redirect to an error page
        error_log("Query failed: " . $e->getMessage(), 3, "error_log.txt");
        header("Location: error_page.php?error=Database+Error");
        exit();
    }
} else {
    // Redirect if the request method is not POST
    header("Location: ../home.php");
    exit();
}
?>
