<?php
    session_start();
    if($_SESSION["perm"] != "10")
    header("index.php");

    require_once('db.php');

    if (!isset($_SESSION["perm"]) || $_SESSION["perm"] != "10") {
        header("Location: index.php");
        exit();
    }

    $db = new mysqli('88.200.86.10', '2024_TA_07', 'xhWAfqOOm', '2024_TA_07');
    
    $id = $_GET['id'];




        $sql = "DELETE FROM LAV_data WHERE id=$id";
    

        if($db->query($sql))
        {
        
            header('Location: index.php');
        }
        else
        {
            echo "napaka pri brisanju";
            echo "<a href='index.php'> nazaj</a>";
        }
        

?>