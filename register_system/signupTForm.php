

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


// Fetch messages
$stmt = $pdo->prepare("SELECT * FROM messages WHERE recipient_id = ? OR sender_id = ?");
//$stmt->execute([$_SESSION['user_id'], $_SESSION['user_id']]);
$stmt->execute([$_SESSION['user_id'], $_SESSION['user_id']]);
$messages = $stmt->fetchAll();



try {
    // Create a new PDO instance
    $pdo1 = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch data from the items table
    //$stmt_1 = $pdo1->query("SELECT distinct username FROM users");
    //$itemsAdd = $stmt_1->fetchAll(PDO::FETCH_ASSOC);
	
	$stmt_1 = $pdo1->query("SELECT distinct id,username FROM users order by 1 asc");
	$items = $stmt_1->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed[username]: " . $e->getMessage();
    exit;
}



?>
    <?php
        $uploadDirectory1 = '../images/teacher/';
        if (!is_dir($uploadDirectory1)) {
            mkdir($uploadDirectory, 0755, true);
        }
        $logoTmpPath="";
        
            $logoTmpPath = $_FILES['imageFile']['tmp_name'];
            $logoName = basename($_FILES['imageFile']['name']);
            // Sanitize the filename
            $logoName = preg_replace('/[^A-Za-z0-9._-]/', '_', $logoName);
            $destination1 = $uploadDirectory1 . $logoName;
            /*if ($_FILES['imageFile']['error'] !== UPLOAD_ERR_OK) {
                die('Error during file upload ');
            }*/
            $validExtensions1 = ['jpg', 'jpeg', 'png'];
            // Move the file to the uploads directory
            if (move_uploaded_file($logoTmpPath, $destination1)) {
                echo "File uploaded successfully: <a href='$destination1'>$logoName</a>";
            } else {
                echo "There was an error uploading the file.";
            }
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

        
		// Set parameters and execute
        $teacher_id = $_POST['teacher_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $date_of_birth = $_POST['date_of_birth'];
        $gender = $_POST['gender'];
        $qualification = $_POST['qualification'];
        $working_experience = $_POST['working_experience'];
        $department = $_POST['department'];
        $phone_number = $_POST['phone_number'];
        $email_address = $_POST['email_address'];
        $fk_user_id = $_SESSION['user_id'];
        $courseID = $_POST["Course"];
        // Prepare and bind
       	$stmt = $conn->prepare("INSERT INTO teacher (teacher_id,firstName,lastName,dateOfBirth,gender,qualification,exp,dept,phone_num,email_addr, user_id, logo_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)");
        $stmt->bind_param("ssssssssssis", $teacher_id, $first_name, $last_name, $date_of_birth, $gender, $qualification, $working_experience, $department, $phone_number, $email_address ,$fk_user_id, $logoName);
        $stmt->execute();
        

        $stmt = $conn->prepare("UPDATE course SET teacher_id=? WHERE course_code = ?");
        $stmt->bind_param("ss", $teacher_id, $courseID);
        if ($stmt->execute()) {
           // echo "New signed up successfully!";
		   echo '<script>alert("New signed up successfully!");
           window.location.href="../login.php";
           </script>';
        } else {
            echo "Error: " . $stmt->error;
        }
        


        // Close connections
        $stmt->close();
        $conn->close();
    }
    ?>
