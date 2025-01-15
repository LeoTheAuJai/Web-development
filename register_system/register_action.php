<?php
session_start();
        $servername = "127.0.0.1"; // Change if your server is different
		$db_username = "root"; // Your database username
		$db_password = ""; // Your database password
		$dbname = "sms";

$pdo = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, role, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $role, $password]);
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: signup.php");
        

    } else {
        header("Location: register.php");
    }

}
?>