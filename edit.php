<?php
include 'config.php';
$id = $_POST['id'];
$oldStatus = $_POST['status'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Update'])) {
    $newStatus = $_POST['newStatus'];
    $uid = $_POST['id'];
    $newWriteDay = date('Y-m-d H:i:s');

    $sql = "UPDATE status SET status = '$newStatus', posttime = '$newWriteDay' WHERE id = $uid;";
    if ($conn->query($sql) === true) {
        echo "<script>alert('Update successfully')</script>";
        echo "<script>window.location = 'yourpost.php'</script>";
    } else {
        echo "<script>alert('Update not successful')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit status</title>
</head>
<body>
    <p>Your new status</p>
    <form action="" method="post">
        <textarea name="newStatus"><?php echo $oldStatus ?></textarea>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" name="Update" value="Update">
    </form>
</body>
</html>
