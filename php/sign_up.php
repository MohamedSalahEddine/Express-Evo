<?php
    include_once("../includes/connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

        $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>

<body>
    
    <?php  include_once("../includes/header.php");?>
    <form action="sign_up.php" method="post">
        <h2>Sign Up</h2>
        <label for="name">Name:</label>
        <input type="text" name="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Sign Up</button>

        <p class="login-link">Already have an account? <a href="log_in.php">Log In</a></p>

    </form>
</body>
</html>