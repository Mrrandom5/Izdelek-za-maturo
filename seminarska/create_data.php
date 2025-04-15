<?php
    session_start();
    require_once('db.php');

    $sql = "CREATE TABLE IF NOT EXISTS LAV_data (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_user INT,
        title VARCHAR(45),
        up_date DATE
        );";

    if($db->query($sql))
        header('Location: admin_pan.php');
    else
        echo "Error, LAV_data.";

    $sql1 = "CREATE TABLE IF NOT EXISTS LAV_post (
        id INT PRIMARY KEY,
        id_user INT FOREIGN KEY REFERENCES LAV_data(id_user),
        content VARCHAR(1000)
        );";

    if($db->query($sql1))
        header('Location: admin_pan.php');
    else
        echo "Error, LAV_post.";
?>