<?php
    session_start();
    require_once('db.php');

    $sql = "CREATE TABLE IF NOT EXISTS LAV_users (
        id_user INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(45),
        first_name VARCHAR(50),
        last_name VARCHAR(50),
        email VARCHAR(50),
        pass VARCHAR(50),
        perm INT
    );";

    if($db->query($sql))
        header('Location: admin_pan.php');
    else
        echo "Error, LAV_users.";
?>