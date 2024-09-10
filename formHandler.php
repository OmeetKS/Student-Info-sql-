<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $predu = $_POST["predu"];
    $enrdate = $_POST["enrdate"];
    $stat = $_POST["stat"];
    $grade = $_POST["grade"];
    $acdoff = $_POST["acdoff"];
    $elig = $_POST["elig"];

    try {
        require_once "student.php";

        $query = "INSERT INTO students (id,name,predu,enrdate,stat,grade,acdoff,elig) VALUES (:id,:name,:predu,:enrdate,:stat,:grade,:acdoff,:elig);";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":predu",$predu);
        $stmt->bindParam(":enrdate",$enrdate);
        $stmt->bindParam(":stat",$stat);
        $stmt->bindParam(":grade",$grade);
        $stmt->bindParam(":acdoff",$acdoff);
        $stmt->bindParam(":elig",$elig);

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