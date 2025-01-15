<?php
$servername = "127.0.0.1"; // Change if your server is different
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "sms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sender_id = $_POST['sender_id'];
    $recipient_id = $_POST['recipient_id'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO messages (sender_id, recipient_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $sender_id, $recipient_id, $message);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>