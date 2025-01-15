<?php
session_start();
$servername = "127.0.0.1"; // Change if your server is different
$db_username = "root"; // Your database username
$db_password = ""; // Your database password
$dbname = "sms";
$pdo = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}
?>
    <?php
	$system='sys';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection
        $servername = "127.0.0.1"; // Change if your server is different
		$username = "root"; // Your database username
		$password = ""; // Your database password
		$dbname = "sms";


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        if(isset($_POST["update"]))
        {
            // Set parameters and execute
            $user_code = $_POST['user_code'];
            $user_name = $_POST['user_name'];
            $user_password = $_POST['user_password'];
            $user_email_addr = $_POST['user_email_addr'];
            $user_role = $_POST['user_role'];

            $fk_user_id = $_SESSION['user_id'];

            // Prepare and bind
            $stmt = $conn->prepare("UPDATE staff SET user_code=?, user_name=?,user_password=?,user_email_addr=?,user_role=?WHERE user_id=?");
            $stmt->bind_param("sssssi", $user_code, $user_name, $user_password, $user_email_addr, $user_role, $fk_user_id);

            if ($stmt->execute()) {
            echo '<script>alert("Updated successfully!")</script>';
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close connections
            $stmt->close();
            $conn->close();
        }
        if(isset($_POST["delete"]))
        {
            $stmt = $conn->prepare("DELETE FROM staff WHERE user_id = ?");
            $stmt->bind_param("i",$fk_user_id );
            $stmt->execute();
            $stmt->close();

            $stmt1 = $conn->prepare("DELETE FROM users WHERE id = ?");

            $stmt1->bind_param("i",$fk_user_id );
            if ($stmt1->execute()) {
                echo"done";
            echo '<script>
                alert("Deleted successfully!");
                window.location.href="../logout.php";
                </script>';
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close connections
            $stmt1->close();
            $conn->close();
        }
    }
    ?>
