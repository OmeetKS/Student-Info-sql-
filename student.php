<?php 

$dsn = "mysql:host=localhost;dbname=studentsinfo";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn,$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOEXCEPTION $e) {
    echo "Connection failed: " . $e->getMessage();
    
}
