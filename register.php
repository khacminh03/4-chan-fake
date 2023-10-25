<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $conn = mysqli_connect("localhost", "root", "", "forum");
        if ($conn->connect_error) {
            die ("connection failed: " . $conn->connect_error);
        }
        $unique = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($unique);
        if ($result->num_rows > 0) {
            echo "<script>alert('Username has been taken')</script>";
            echo "<script>window.location = 'register.html'</script>";
            exit();
        }
        $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'normal')";
        if ($conn->query($sql) === true) {
            echo "<script>alert('Register successfully')</script>";
            echo "<script>window.location = 'index.html';</script>";
        } else {
            echo "Đéo ổn rồi!";
        }
        $conn->close();
    }
    
?>
