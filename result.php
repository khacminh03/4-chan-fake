<?php
    include 'config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $search = $_POST['search'];
        $sql = "SELECT * FROM status JOIN users on users.id = status.user_id WHERE status.status LIKE '%$search%'";
        $result = $conn->query($sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px;
        }

        h1 {
            margin-top: 20px;
            text-align: center;
        }

        .post-container {
            background-color: white;
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px #888888;
        }

        .post {
            margin-top: 10px;
        }

        .search-container {
            text-align: center;
            margin-top: 20px;
        }

        .search-input {
            padding: 10px;
        }
    </style>
</head>
<body>
    <header>
        Result of "<?php echo $search; ?>"
    </header>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['banned'] == 0) {
                echo '<div class="post-container">';
                echo '<p>' . $row['username'] . ' said on ' . $row['posttime'] . ':</p>';
                echo '<p class="post">' . $row['status'] . '</p>';
                echo '</div>';
            }
        }
    } else {
        echo '<h2 style="text-align: center; margin-top: 20px;">0 results.</h2>';
    }
    ?>
</body>
</html>