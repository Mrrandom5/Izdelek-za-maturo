<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
            margin-top: 2rem;
            text-align: center;
        }

        h1 {
            color: #007bff;
        }

        .links {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .links a {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Redirect to index.php if user does not have sufficient permission
    if (!isset($_SESSION["perm"]) || $_SESSION["perm"] != "10") {
        header("Location: index.php");
        exit();
    }
    ?>

    <div class="container">
        <h1>Admin Panel</h1>
        <p>Welcome to the admin panel. Use the links below to manage data and users.</p>
        <div class="links">
            <a href="create_data.php">Create Data</a>
            <a href="create_users.php">Create Users</a>
            <a href="add_data.php">Add Data</a>
            <a href="add_users.php">Add Users</a>
            <a href="users.php">View Users</a>
            <a href="index.php">Go to Home Page</a>
        </div>
    </div>
</body>
</html>
