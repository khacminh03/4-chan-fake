<?php
    include 'config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $uid = $_POST['id'];
        $sid = $_POST['sid'];
        $sql = "UPDATE status SET status.banned = 1 WHERE status_id = '$sid' AND user_id = '$uid';";

        if ($conn->query($sql) === true) {
            echo "<script>alert('Banned successfully')</script>";
            echo "<script>window.location = 'admin.php'</script>";
        } else {
            echo "<script>alert('Banned not successfully')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ban status</title>
</head>
<body>
    <form action="" method="post">
    <p>Do you want to ban this status?</p>      
        <input type="hidden" value="<?php echo $_POST['id']; ?>">
        <input type="hidden" value="<?php echo $_POST['sid']; ?>">
        <input type="submit" value="Ban">
    </form>
</body>
</html>