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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDirectory1 = '../../../../uploads/logo/';
    $uploadDirectory2 = '../../../../uploads/file/';
    
    // Check if the uploads directory exists, if not, create it
    if (!is_dir($uploadDirectory1)) {
        mkdir($uploadDirectory, 0755, true);
    }
    if (!is_dir($uploadDirectory2)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $logoTmpPath = $_FILES['imageFile']['tmp_name'];

    $fileTmpPath = $_FILES['zipFile']['tmp_name'];

    $logoName = basename($_FILES['imageFile']['name']);

    $fileName = basename($_FILES['zipFile']['name']);
    
    // Sanitize the filename
    $logoName = preg_replace('/[^A-Za-z0-9._-]/', '_', $logoName);

    $fileName = preg_replace('/[^A-Za-z0-9._-]/', '_', $fileName);
    
    $destination1 = $uploadDirectory1 . $logoName;

    $destination2 = $uploadDirectory2 . $fileName;

    // Check if there were upload errors
    if ($_FILES['imageFile']['error'] !== UPLOAD_ERR_OK) {
        if ($_FILES['zipFile']['error'] !== UPLOAD_ERR_OK) {
            die('Error during file upload ');
        }
    }
    
    // Check the file extension
    $validExtensions1 = ['jpg', 'jpeg', 'png'];
    $fileExtension1 = strtolower(pathinfo($logoName, PATHINFO_EXTENSION));
    
    if (!in_array($fileExtension1, $validExtensions1)) {
        die('Only PNG, JPG, and JPEG file types are allowed for Logo.');
    }
    $validExtensions2 = ['zip'];
    $fileExtension2 = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!in_array($fileExtension2, $validExtensions2)) {
        die('Only ZIP file types are allowed for File.');
    }

    // Move the file to the uploads directory
    if (move_uploaded_file($logoTmpPath, $destination1)) {
        echo "File uploaded successfully: <a href='$destination1'>$logoName</a>";
    } else {
        echo "There was an error uploading the file.";
    }

    // Move the file to the uploads directory
    if (move_uploaded_file($fileTmpPath, $destination2)) {
       echo "File uploaded successfully: <a href='$destination2'>$fileName</a>";
    } else {
        echo "There was an error uploading the file.";
    }

    //----------------------------------------------
    //file upload end, start record database
    //----------------------------------------------

    // Database connection
    $servername = "127.0.0.1"; // Change if your server is different
	$username = "root"; // Your database username
	$password = ""; // Your database password
	$dbname = "sms";
    $conn = new mysqli($servername, $username, $password, $dbname);

    //logoName and fileName
    $title= $_POST["Title"];
    $description= $_POST["Description"];
    $author = $_SESSION['username'];
	$author_user_ID = $_SESSION['user_id'];
    $courseID = $_POST["Course"];


    $sql = "INSERT INTO waitinglist (logo_name, logo_type, file_name, file_type, title, description, student_ID, course_ID) 
    VALUES ('$logoName', '$fileExtension1', '$fileName', '$fileExtension2', '$title', '$description','$author_user_ID', '$courseID')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Uploaded successfully!");
        window.location.href="../student_work.php";
        </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
