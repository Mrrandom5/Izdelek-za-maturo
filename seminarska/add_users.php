<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .add_users-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .add_users-container h1 {
            color: #007bff;
            margin-bottom: 1.5rem;
        }

        .add_users-container input[type="text"], 
        .add_users-container input[type="email"], 
        .add_users-container input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .add_users-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            width: 100%;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add_users-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .button-link {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.75rem 1.5rem;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .button-link:hover {
            background-color: gray;
        }
    </style>
</head>
<body>
    <div class="add_users-container">
        <?php
        require_once('db.php');
        session_start();

        if (!isset($_SESSION["perm"]) || $_SESSION["perm"] != "10") {
            header("Location: index.php");
            exit();
        }
        

        if (isset($_SESSION["perm"]) && $_SESSION["perm"] == "10") {
            echo '<a href="admin_pan.php" class="button-link">Go to Admin Panel</a>';
        }
        if(!empty($_GET)){
            $u = $_GET['username'];
            $fn = $_GET['first_name'];
            $ln = $_GET['last_name'];
            $e = $_GET['email'];
            $p = $_GET['pass'];
            $perm = $_GET['perm'];


        
            $sql = "INSERT INTO LAV_users (username, first_name, last_name, email, pass, perm) 
                    VALUES('$u','$fn','$ln','$e','$p','$perm');";

        if($db->query($sql))
            echo '<p>It works?</p>';
        else
            echo 'Error';
        }
        ?>
        <form method="" action="">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="text" name="first_name" placeholder="First name"><br>
            <input type="text" name="last_name" placeholder="Last name"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="pass" placeholder="Password"><br>
            <input type="text" name="perm" placeholder="Access level"><br>
            <input type="submit">
        </form>
    </div>
</body>
</html>