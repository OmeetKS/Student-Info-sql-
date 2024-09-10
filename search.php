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
        
        <h1>Search Student Information</h1>
        <div class="form-container">
            
            <form class="searchform" action = "studentSearch.php" method = "post">
                <label for="studentID">Input Student ID</label><br>
                <input id="search" type="text" name="id" placeholder="Student ID" required><br><br>

                <button>Search</button> 
            </form>
        
        </div>
    
    </body>

</html>