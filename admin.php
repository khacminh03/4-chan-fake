<?php
    include 'config.php';
    if ($_SESSION['username'] === 'admin') {
        $sql = "SELECT * FROM users JOIN status ON users.id = status.user_id;";

        $result = $conn->query($sql);
    } else {
        echo "You are not admin!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 2px 5px #888888;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        td {
            background-color: #ffffff;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .ban-button, .unban-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .unban-button {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Post Time</th>
                <th>Banned</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['posttime'] . "</td>";
                        echo "<td>" . ($row['banned'] == 0 ? 'Not banned' : 'Banned') . "</td>";
                        echo '<td class="action-buttons">';
                        if ($row['banned'] == 0) {
                            echo '<form method="post" action="banned.php">
                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                    <input type="hidden" name="sid" value="' . $row['status_id'] . '">
                                    <input type="hidden" name="status" value="' . $row['status'] . '">
                                    <input type="hidden" name="posttime" value="' . $row['posttime'] . '">
                                    <button class="ban-button" type="submit">Ban</button>
                                </form>';
                        } else {
                            echo '<form method="post" action="unBan.php">
                                    <input type="hidden" name="id" value="' . $row['id'] . '">
                                    <input type="hidden" name="sid" value="' . $row['status_id'] . '">
                                    <input type="hidden" name="status" value="' . $row['status'] . '">
                                    <input type="hidden" name="posttime" value="' . $row['posttime'] . '">
                                    <button class="unban-button" type="submit">Unban</button>
                                </form>';
                        }
                        echo '</td>';
                        echo "</tr>";
                    }
                } else {
                    echo '<tr><td colspan="5">0 results.</td></tr>';
                }
            ?>
        </tbody>
    </table>  
</body>
</html>
