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
        $uploadDirectory1 = '../../../images/teacher/';
        if (!is_dir($uploadDirectory1)) {
            mkdir($uploadDirectory, 0755, true);
        }

        if(isset($_POST["update"]))
        {
            $logoTmpPath = $_FILES['imageFile']['tmp_name'];
            $logoName = basename($_FILES['imageFile']['name']);
            // Sanitize the filename
            $logoName = preg_replace('/[^A-Za-z0-9._-]/', '_', $logoName);
            $destination1 = $uploadDirectory1 . $logoName;
            if ($_FILES['imageFile']['error'] !== UPLOAD_ERR_OK) {
                die('Error during file upload ');
            }
            $validExtensions1 = ['jpg', 'jpeg', 'png'];
            // Move the file to the uploads directory
            if (move_uploaded_file($logoTmpPath, $destination1)) {
                echo "File uploaded successfully: <a href='$destination1'>$logoName</a>";
            } else {
                echo "There was an error uploading the file.";
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
            $stmt = $conn->prepare("UPDATE teacher SET teacher_id=?,firstName=?,lastName=?,dateOfBirth=?,gender=?,qualification=?,exp=?,dept=?,phone_num=?,email_addr=?,logo_path=? WHERE user_id = ?");
            $stmt->bind_param("sssssssssssi", $teacher_id, $first_name, $last_name, $date_of_birth, $gender, $qualification, $working_experience, $department, $phone_number, $email_address,$logoName,$fk_user_id);

            if ($stmt->execute()) {
            
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt = $conn->prepare("UPDATE course SET teacher_id=? WHERE course_code = ?");
            $stmt->bind_param("ss", $teacher_id, $courseID);
            if ($stmt->execute()) {
            // echo "New signed up successfully!";
            echo '<script>alert("Updated successfully!")
            window.location.href="preview_profile.php";
            </script>';
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close connections
            $stmt->close();
            $conn->close();
        }
        if(isset($_POST["delete"]))
        {
            $fk_user_id = $_SESSION['user_id'];
            $stmt = $conn->prepare("DELETE FROM teacher WHERE user_id = ?");
            $stmt->bind_param("i",$fk_user_id );
            $stmt->execute();
            $stmt->close();

            $stmt1 = $conn->prepare("DELETE FROM users WHERE id = ?");

            $stmt1->bind_param("i",$fk_user_id );
            if ($stmt1->execute()) {
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
