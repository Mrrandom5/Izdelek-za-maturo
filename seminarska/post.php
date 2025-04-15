<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 1rem 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            align-items: center;
        }

        .navbar .nav-links li {
            margin-left: 20px;
        }

        .navbar .nav-links a {
            text-decoration: none;
            color: #fff;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar .nav-links a:hover {
            color: #007bff;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input[type="text"] {
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            outline: none;
        }

        .search-bar button {
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 1rem;
        }

        .search-bar button:hover {
            background-color: #0056b3;
        }

        /* Table Section */
        .table-section {
            margin: 2rem 0;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table-section h1 {
            text-align: center;
            margin-bottom: 1rem;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .fa-trash {
            font-size: 1rem;
            cursor: pointer;
        }

        .fa-trash:hover {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    ?>

    <nav class="navbar">
        <a href="index.php" class="logo">HOME</a>
        <ul class="nav-links">
            <li><a href="logout.php">Logout  </a></li>

        <?php
        //if (isset($_SESSION["perm"]) && $_SESSION["perm"] = null) 
            //{
                //echo '<li><a href="login.php">Login  </a></li>';
            //}
        //?>
            <li><a href="login.php">Login  </a></li>
            
        <?php
            if (isset($_SESSION["perm"]) && $_SESSION["perm"] == "10") 
                {
                    echo '<li><a href="admin_pan.php">Admin Panel</a></li>';
                }
            ?>
        </ul>

        <?php
            //if (isset($_SESSION["perm"]) && $_SESSION["perm"] == "10") 
                //{
                    //echo '<li><a href="add_data">POST</a></li>';
               // }
            //?>
       </ul>

        <form class="search-bar" action="search.php" method="GET">
            <input type="text" name="query" placeholder="Search RSO_data...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </nav>

    <div class="container table-section">
        <?php
        require_once('db.php');

        $id = $_GET['id'];

        $sql1 = "SELECT title FROM LAV_data WHERE id=$id";

        $rezultati1 = $db->query($sql1);

                    

                    while($data1 = $rezultati1->fetch_assoc()) {
                        
                        echo"<h1>{$data1['title']}</h1>";
                       
                    }

                    
        ?>
        <!--<h1>Latest </h1>-->
        <table>
            <thead>
                <tr>
                    <!--<th>Title</th>
                    <th>Author</th>
                    <th>Date posted</th>
                    <th>Horse Power</th>
                    <th>Torque</th>
                    -->
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once('db.php');

                    $id = $_GET['id'];




                    $sql = "SELECT content FROM LAV_post WHERE id=$id";

                    
                    $rezultati = $db->query($sql);

                    

                    while($data = $rezultati->fetch_assoc()) {
                        echo "<tr>";
                        echo"<td>{$data['content']}</td>";
                        echo "</tr>";
                    }

                    $db->close();

                    
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
