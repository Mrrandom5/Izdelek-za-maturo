<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
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

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-container h1 {
            color: #007bff;
            margin-bottom: 1.5rem;
        }

        .login-container input[type="text"], 
        .login-container input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .login-container input[type="submit"] {
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

        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .login-container .error {
            color: red;
            margin-top: 1rem;
        }

        .login-container .success {
            color: green;
            margin-top: 1rem;
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
    <div class="login-container">
        <h1>Login</h1>
        <a href="index.php" class="button-link">Home</a>
        <?php
        session_start();
        require_once('db.php');

        $message = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['usernamel'] ?? '';
            $password = $_POST['passwordl'] ?? '';

            if (!empty($username) && !empty($password)) {
                
                $stmt = $db->prepare("SELECT pass, perm, id_user FROM LAV_users WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    if ($password === $user['pass']) { 
                        $_SESSION["perm"] = $user['perm'];
                        $_SESSION["id"] = $user['id_user'];

                        
                        header("Location: admin_pan.php");
                        exit();
                    } else {
                        $message = '<span class="error">Incorrect password.</span>';
                    }
                } else {
                    $message = '<span class="error">User not found.</span>';
                }
                $stmt->close();
            } else {
                $message = '<span class="error">Please fill in all fields.</span>';
            }

            $db->close();
        }
        ?>

        <form method="POST" action="">
            <input type="text" name="usernamel" placeholder="Username" required><br>
            <input type="password" name="passwordl" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>

        
        <?= $message; ?>
    </div>
</body>
</html>
