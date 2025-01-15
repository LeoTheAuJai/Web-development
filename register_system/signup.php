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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="file_upload_button.css">
    <style>
        body { font-family: Arial, sans-serif;}
        form { 
            max-width: 400px; 
            margin: auto;
            padding-top:-10px;
         }
        input { width: 100%; margin: 10px 0; padding: 10px; }
        select { padding: 10px; width: 106%;margin: 12px 0; }
        .navbar{    

            height :60px;
            position: fixed;
            top: 0;
            width: 100%; 

            background-color: #80c4e9;      

        }   
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .navbar a:hover {
            background: #ddd;
            color: black;
        }


        ul{    

            float: left;    

            display: flex; 

            position:absolute;   

            justify-content: center;    

            align-items: center;    

        }    

        ul li{    

            list-style: none;    

            margin-left: 0px;    

            margin-top: 0px;    

            font-size: 14px;    

        }    

        ul li a{    

            text-decoration: none;    

            color: #fff;    

            font-family: Arial;    

            font-weight: bold;    

            transition: 0.4s ease-in-out;    

        }    

        .icon{    
            color: white;
            font-size: 25px;
            font-weight: 600;  
            padding-left:15px;
            padding-top:15px;
        }    
        button
        { 
            margin-top:10px;
            width: 424px;
            padding: 12px 40px; 
            background: #ff7200;   
            border: 0px solid #ff7200;   
            color: #fff;   
            font-size: 15px;   
            transition: 0.2s ease;   
            cursor: pointer;   
            border-radius: 12px; 
        }   

        button:hover{   
            background: #74b72e;   
        }   

        button:focus{   
            outline: none;   
        }   
        .frame { 
            max-width: 400px; 
            margin: auto;
            padding-top:70px;
         }
         #delete
        { 
            margin-top:10px;
            width: 424px;
            padding: 12px 40px; 
            background: #ff7200;   
            border: 0px solid #ff7200;   
            color: #fff;   
            font-size: 15px;   
            transition: 0.2s ease;   
            cursor: pointer;   
            border-radius: 12px; 
        }   
        #delete:hover{   
            background: #ff0000;   
        }   
         #delete:focus{   
            outline: none;   
        }   
        
.old_data_frame{
      width: 550px;
      height: 309px;
      float:right;
      margin-top:20px;
    }
.old_fileFrame{

border: 2px dashed #ccc;
border-radius: 20px;
padding:5px;
margin:20px;
margin-top:50px;
width: 750px;
height: 200px;
text-align: center;
border-radius: 50px ;
float:left;
font-size: 25px;
font-weight: 450;
color: #000;
padding-left:30px;
padding-right:30px;
}
.old_preview-container {
  border: 2px dashed #ccc;
      border-radius: 20px;
      width: 424px;
      height: 500px;
      text-align: center;
      margin:2px;
      border-radius: 50px ;
      line-height: 500px;
}

.old_preview-image {
  max-width: 230px;
  height: 500px;
  text-align: center;
  border-radius: 50px ;
}
.preview-image {
  max-width: 425px;
  height: 500px;
  text-align: center;
  border-radius: 50px ;
}
    </style>
</head>
<body>

    <div class="navbar"> 
        <div class="icon">
        <?php echo $_SESSION['role']; ?>
        </div>
    </div>
    <div class="frame">

        <?php 
            switch ($_SESSION["role"]) {
                    case "Student":
                        echo'<form action="signupSForm.php" method="post" enctype="multipart/form-data">
                        <center>
                            <div id="previewContainer" class="old_preview-container" >
                            Select a image file for logo  
                            </div>
                            <input type="file" class="form-control" name="imageFile"  id="imageFile" accept="image/*" required style="border:solid,2px;border-radius:5px;width:396px;margin-top:10px;">
                        </center>';
                        echo'Student ID<input type="text" name="student_id" placeholder="Student ID" required>
                        First Name<input type="text" name="first_name" placeholder="First Name" required>
                        Last Name<input type="text" name="last_name" placeholder="Last Name" required>
                        Date of Birth<input type="date" name="date_of_birth" placeholder="Date of Birth" required>
                        Intake Year<input type="number" name="intake_year" placeholder="Intake Year" required>
                        Gender
                        <select name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        Grade level
                        <select name="gradelevel" required>
                            <option value="">Select Grade</option>
                            <option value="Higher Diploma">Higher Diploma</option>
                            <option value="Bachelor">Bachelor</option>
                            <option value="Diploma of Yi Jin">Diploma of Yi Jin</option>
                        </select>';
                        
                        echo'
                        Programme<input type="text" name="programme" placeholder="Programme" required>
                        Email<input type="text" name="email" placeholder="Email Address" required>
                        Address<input type="text" name="address" placeholder="Address" required>
                        Phone Number<input type="number" name="phoneNumber" placeholder="Phone Number" required>
                        Guardian<input type="text" name="guardian_info" placeholder="Guardian Info" required>
                        <button type="submit" name = "update" id="update">Upload</button>
                        </form>';
                        break;
                    case 'Teacher':
                        echo '<form action="signupTForm.php" method="post" enctype="multipart/form-data">
                        <center>
                        <div id="previewContainer" class="old_preview-container" >
                            Select a image file for logo  
                            </div>
                            <input type="file" class="form-control" name="imageFile"  id="imageFile" accept="image/*" required style="border:solid,2px;border-radius:5px;width:396px;margin-top:10px;">
                        </center>';
                        $servername = "127.0.0.1";
                        $username = "root"; // Change as needed
                        $password = ""; // Change as needed
                        $dbname = "sms";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }
                        // Query to retrieve data from users table
                        $sql = "SELECT * FROM course";
                        $result = $conn->query($sql);
                        echo'Responsible course:
                        <select name="Course"  onchange="disableDefaultOption(this)">
                        <option value="" selected>Choose your course code</option>';
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo '<option  value="' . $row["course_code"] . '">' . $row["course_code"] . " " . $row["course_name"] . '</option>';
                            }
                        } else {
                            echo '<option value="">No course found</option>';
                        }
                        echo '</select>';
                      // Close the database connection
                      $conn->close();
                        echo'Teacher ID<input type="text" name="teacher_id" placeholder="Teacher ID" required>
                        First Name<input type="text" name="first_name" placeholder="First Name" required>
                        Last Name<input type="text" name="last_name" placeholder="Last Name" required>
                        Date of Birth<input type="date" name="date_of_birth" placeholder="Date of Birth" required>
                        Gender<select name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        Qualification<input type="text" name="qualification" placeholder="For multiple qualification, please use [, ] to denote for each one">
                        Years of Experience<input type="number" name="working_experience" placeholder="Years of Experience" min="0">
                        Department<input type="text" name="department" placeholder="Department">
                        Phone Number<input type="number" name="phone_number" placeholder="Phone Number" required>
                        Email Address<input type="email" name="email_address" placeholder="Email Address" required>
                        <button type="submit" name = "update" id="update">Update</button>
                        </form>';
                        break;
                    case 'Staff';
                        echo '<form action="signupGForm.php" method="post">
                        User code<input type="text" name="user_code" placeholder="User code" required>
                        User Name<input type="text" name="user_name" placeholder="User Name" required>
                        User Password<input type="text" name="user_password" placeholder="User Password" required>
                        Email Address<input type="email" name="user_email_addr" placeholder="user_email_addr" required>
                        User Role<select name="user_role" required>
                            <option value="">Select position</option>
                            <option value="Manager">Manager</option>
                            <option value="Admin">Admin</option>
                        </select>
                        <button type="submit" name = "update" id="update">Update</button>
                        </form>';
                        break;
                        default:
                        echo 'Invalid option selected.';
                }
        ?>
    </div>
    <script>
        /*
        document.getElementById('mySelect').addEventListener('change', function() {
            var selectedValue = this.value;
            var contentDiv = document.getElementById('content');

            if (selectedValue) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'getContent.php?option=' + selectedValue, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        contentDiv.innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            } else {
                contentDiv.innerHTML = 'Please select an option from the dropdown.';
            }
        });*/
    </script>
    <script>
        document.getElementById('imageFile').addEventListener('change', function preview(event) {
            const previewContainer = document.getElementById('previewContainer');
            previewContainer.innerHTML = ''; // Clear previous previews
            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = file.name;
                    img.classList.add('preview-image');
                    previewContainer.appendChild(img);
                    previewContainer.style.border="none";
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</body>
</html>