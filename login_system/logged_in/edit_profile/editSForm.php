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
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {
            echo "statement true";
        } 
        else{
            echo "statement false";
        }
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

        $uploadDirectory1 = '../../../images/student/';
        if (!is_dir($uploadDirectory1)) {
            mkdir($uploadDirectory, 0755, true);
        }

        if(isset($_POST["update"]))
        {
            $logoTmpPath="";
            echo (isset($_FILES['imageFile']));
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

            // Set parameters and execute
            $student_id = $_POST['student_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $gradelevel = $_POST['gradelevel'];
            $address = $_POST['address'];
            $phoneNumber = $_POST['phoneNumber'];
            $guardian_info = $_POST['guardian_info'];
            $fk_user_id = $_SESSION['user_id'];


            // Prepare and bind
            $stmt = $conn->prepare("UPDATE student SET student_id=?,firstName=?,lastName=?,dateOfBirth=?,gender=?,gradelevel=?,address=?,phoneNumber=?,guardian_info=?,logo_path=? WHERE user_id=?");
            $stmt->bind_param("ssssssssssi", $student_id, $first_name, $last_name, $date_of_birth, $gender, $gradelevel, $address, $phoneNumber, $guardian_info, $logoName, $fk_user_id);

            if ($stmt->execute()) {
            echo '<script>alert("Updated successfully!")
            window.location.href="preview_profile.php";</script>';
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close connections
            $stmt->close();
            $conn->close();
        }
        if(isset($_POST["delete"]))
        {
            /*$stmt = $conn->prepare("DELETE * FROM student WHERE user_id = ?");
            $stmt->bind_param("i",$fk_user_id );
            $stmt->execute();
            $stmt->close();*/
            $fk_user_id = $_SESSION['user_id'];
            echo $fk_user_id;

            $stmt1 = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt1->bind_param("i",$fk_user_id );
            if ($stmt1->execute()) {
                $stmt1 = $conn->prepare("DELETE FROM student WHERE user_id = ?");
                $stmt1->bind_param("i",$fk_user_id );
                if ($stmt1->execute()) {
                    echo "deleted";
                    echo '<script>
                    alert("Deleted successfully!");
                    window.location.href="../logout.php";
                    </script>';
                }
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close connections
            $stmt1->close();
            $conn->close();
        }
    }
    ?>
