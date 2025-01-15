<?php
    $servername = "127.0.0.1"; // Change if your server is different
	$username = "root"; // Your database username
	$password = ""; // Your database password
	$dbname = "sms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$recipient_id = $_GET['recipient_id'];
$sender_id = $_GET['sender_id'];

$sql = "SELECT distinct * FROM messages WHERE (recipient_id = ? AND sender_id = ?) OR (recipient_id = ? AND sender_id = ?);"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiii", $recipient_id, $sender_id, $sender_id, $recipient_id );
//$stmt->bind_param("ii", $sender_id, $recipient_id);

$stmt->execute();
$result = $stmt->get_result();

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);

$stmt->close();
$conn->close();
?>