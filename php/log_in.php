<?php
    
    include_once("../includes/connection.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
    
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
    
                header("Location: ../index.php");
                exit();
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "User not found.";
        }
    }
    
    $conn->close();
    
?>

<body>
    
    <?php include('../includes/header.php'); ?>
    <form action="log_in.php" method="post" class="log_in_form">
        <h2>Mon compte</h2>
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <button type="submit">Se connecter</button>
        <p class="login-link">Vous n'avez pas de compte? <a href="sign_up.php">Créer un compte</a></p>
    </form>

</body>
</html>
