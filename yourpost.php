<?php
include 'config.php';
$uid = $_SESSION['id'];
$sql = "SELECT * FROM status where id = '$uid';";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Posts</title>
    <style>
        body {
            text-align: center;
        }

        table {
            width: 70%;
            margin: 0 auto;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Your Posts</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Post Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['posttime'] . "</td>";
                    echo '<td>
                            <form method="post" action="edit.php">
                                <input type="hidden" name="id" value="' . $row['id'] . '">
                                <input type="hidden" name="status" value="' . $row['status'] . '">
                                <input type="hidden" name="posttime" value="' . $row['posttime'] . '">
                                <input type="submit" value="Edit">
                            </form>
                            |
                            <form method="post" action="delete.php">
                                <input type="hidden" name="id" value="' . $row['id'] . '">
                                <input type="hidden" name="status" value="' . $row['status'] . '">
                                <input type="hidden" name="posttime" value="' . $row['posttime'] . '">
                                <input type="submit" value="Delete">
                            </form>
                        </td>';
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>
