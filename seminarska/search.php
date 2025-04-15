<?php
require_once('db.php');

// Check if a search query is provided
if (isset($_GET['query'])) {
    $query = $db->real_escape_string($_GET['query']);
    $sql = "SELECT * FROM LAV_data NATURAL JOIN LAV_post LEFT JOIN LAV_users ON LAV_post.id_user = LAV_users.id_user WHERE username LIKE '%$query%' OR title LIKE '%$query%' OR content LIKE '%$query%';";
    $result = $db->query($sql);

    // HTML structure for search results page
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Results</title>
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
                padding: 20px;
            }

            .container {
                background: #fff;
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 90%;
                max-width: 800px;
            }

            h1 {
                color: #007bff;
                margin-bottom: 1rem;
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 1rem;
            }

            th, td {
                padding: 8px 12px;
                border: 1px solid #ddd;
                text-align: left;
            }

            th {
                background-color: #007bff;
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .links {
                margin-top: 1.5rem;
                text-align: center;
            }

            .links a {
                display: inline-block;
                padding: 0.75rem 1.5rem;
                text-decoration: none;
                background-color: #007bff;
                color: #fff;
                border-radius: 5px;
                margin: 0.5rem;
                transition: background-color 0.3s ease;
            }

            .links a:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Search Results for: ' . htmlspecialchars($query) . '</h1>';

    // If results are found it displays them in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Title</th><th>Author</th><th>VIEW</th></tr>";
        while ($data = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$data['title']}</td>";
            echo "<td>{$data['username']}</td>";
            echo"<td><a href='post.php?id=$data[id]'>VIEW</a></td>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found for your search query.</p>";
    }

    // Close the result and database connection
    $db->close();

    // Link to navigate back or to the homepage
    echo '<div class="links">
            <a href="index.php">Go to Home</a>
        </div>
        </div>
    </body>
    </html>';

} else {
    // If no query is provided, show a message
    echo "<p>No search query provided.</p>";
}
?>
