<?php
    include 'config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Delete'])) {
        $id = $_POST['id'];
        $sid = $_POST['sid'];
        $sql = "DELETE FROM status WHERE user_id = $id AND status_id = $sid;";
        
        if ($conn->query($sql) === true) {
            echo "<script>alert('Delete successfully')</script>";
            echo "<script>window.location = 'yourpost.php'</script>";
        } else {
            echo "<script>alert('not good')</script>";
            echo "<script>window.location = 'yourpost.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <form action="" method="post">
    <p>Do you want to delete?</p>
    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
    <input type="hidden" name="sid" value="<?php echo $_POST['sid'] ?>">
    <input type="submit" name="Delete" value="Delete">
    </form>
</body>
</html>