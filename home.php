<?php
    session_start();
    include 'config.php';
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = $_POST['status'];
        $writeDay = date('Y-m-d H:i:s', strtotime('+5 hours'));

        $sql = "INSERT INTO status (user_id, status, banned, posttime) VALUES ('$id', '$status', 0, '$writeDay')";

        if ($conn->query($sql) === true) {
            echo "<script>alert('Post successfully')</script>";
        } else {
            echo "<script>alert('Not good')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4-chan</title>
    <style>
        body {
            text-align: center;
        }
        .post-container {
            display: inline-block;
            text-align: left;
        }
        .textarea-container {
            text-align: right;
        }
        textarea {
            width: 300px;
            height: 150px;
            vertical-align: middle;
        }
        input[type="submit"] {
            vertical-align: middle;
        }
        .buttons {
            margin-top: 20px;
            text-align: center;
        }
        .buttons a {
            margin: 10px;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
        }
        .logout {
            position: absolute;
            top: 10px;
            right: 10px;
            text-align: right;
        }
        .logout a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
    <p>Welcome, <?php echo $_SESSION['username']; ?></p>
    <h2>Post something</h2>
    <form method="POST" action="">
        <textarea placeholder="What do you think?" name="status" rows="10" cols="50"></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>
    <div class="buttons">
        <a href="yourpost.php">Watch All Your Posts</a>
        <a href="post.php">Watch Other Posts</a>
    </div>
</body>
</html>
