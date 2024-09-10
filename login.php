<?php
session_start();

// Database connection
$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "login"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];


    // Vulnerable query with SQL injection risk
    $query = "SELECT * FROM users WHERE username = '$username' AND password_hash = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION["loggedin"] = true;
        header("Location: home.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }

//     // Prepare and bind
//     $stmt = $conn->prepare("SELECT password_hash FROM users WHERE username = ?");
//     $stmt->bind_param("s", $input_username);
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows > 0) {
//         $stmt->bind_result($stored_hash);
//         $stmt->fetch();

//         // Verify password
//         if (password_verify($input_password, $stored_hash)) {
//             $_SESSION["loggedin"] = true;
//             header("Location: home.php"); // Redirect to the main page
//             exit();
//         } else {
//             $error = "Invalid username or password!";
//         }
//     } else {
//         $error = "Invalid username or password!";
//     }

//     $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="website.css"> <!-- Link to your external CSS file -->
    <title>Admin Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" name="username" placeholder="Enter Username" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" placeholder="Enter Password" required><br><br>

            <button type="submit">Login</button>
        </form>
        <?php
        if (isset($error)) {
            echo "<p style='color:red;'>$error</p>";
        }
        ?>
    </div>
</body>
</html>
