<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
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

        .add_data-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .add_data-container h1 {
            color: #007bff;
            margin-bottom: 1.5rem;
        }

        .add_data-container input[type="text"], 
        .add_data-container input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            margin: 0.5rem 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .add_data-container input[type="submit"] {
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

        .add_data-container input[type="submit"]:hover {
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
    <div class="add_data-container"> 
        <?php
        require_once('db.php');
        session_start();
        if (isset($_SESSION["perm"]) && $_SESSION["perm"] == "10") {
            echo '<a href="admin_pan.php" class="button-link">Go to Admin Panel</a>';
        }
        
        if(!empty($_GET)){
            $til = $_GET['title'];
            $cont = $_GET['content'];
            $ud = date('Y-m-d');
            $id = $_SESSION["id"];
            

            $u_id = $_SESSION["id"];

            $uname = "SELECT username FROM LAV_users WHERE id = $u_id;";

            $sql = "INSERT INTO LAV_data (id_user, title, up_date) 
                    VALUES('$u_id','$til','$ud');";

            

            
            
            
            

        if($db->query($sql))
            echo '<p>It works?</p>';
        else
            echo 'Error';
        $pp_id = $db->insert_id;
        $sql1 = "INSERT INTO LAV_post (id, id_user, content)
                VALUES($pp_id, $u_id,'$cont');";
        //echo$sql1;
        if($db->query($sql1))
            echo '<p>It 1works?</p>';
        else
            echo '1Error';
        }
        
        ?>
         <a href="index.php" class="button-link">Home</a>
        
        <form method="" action="">
            <input type="text" name="title" placeholder="Title"><br>
            <input type="text" name="content" placeholder="Content"><br>
            
            <input type="submit">
            
        
        </form>
    </div>
</body>
</html>
