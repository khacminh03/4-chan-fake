<?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $conn = mysqli_connect("localhost", "root", "", "forum");
        if ($conn->connect_error) {
            die ("connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                
                if ($row['role'] === 'admin') {
                    echo "<script>alert('Welcome admin!')</script>";
                    echo "<script>window.location = 'admin.html'</script>";
                    exit();
                } else {
                    echo "<script>alert('Login successfully')</script>";
                    echo "<script>window.location = 'home.html'</script>";
                    exit();
                }
                
            } else {
                echo "<script>alert('Wrong username or password')</script>";
                echo "<script>window.location = 'login.php'</script>";
                exit();
            }
        } else {
            echo "<script>alert('User not found')</script>";
            echo "<script>window.location = 'login.html'</script>";
            exit();
        }
        $conn->close();
    }
?>
