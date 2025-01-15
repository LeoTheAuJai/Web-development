<?php
session_start();

$servername = "127.0.0.1"; // Change if your server is different
$db_username = "root"; // Your database username
$db_password = ""; // Your database password
$dbname = "sms";
$pdo = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting List</title>
    <link rel="stylesheet" href="file_upload_button.css">
    <style>
        *{    
            margin: 0;    
            padding: 0;    
        }  
        body{
            
            background-image: linear-gradient(to top, rgba(255, 255, 255, 0.5)50%,rgba(255, 255, 255, 0.5)50%), url(../../../images/background\ image.png);    
            background-repeat: repeat;
            background-attachment: fixed;   
            background-size: cover;    
        }

        .navbar{    

            height :50px;
            position: fixed;
            top: 0;
            width: 100%; 
            background-color: #80c4e9;      

        }   
        .navbar a {
            max-height: 20px;
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
            margin-left: 2px;    
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
            width: 200px;    
            float: left;    
            height: 70px;    
        }    

        .logo{    
            margin-right: 15px; 
            padding-right: 20px; 
            float: left;    


        }    

        .menu{    
            padding-left: 30px; 
            height:50px;
            float: left;    
            text-align: center;    
        }    

        .TopRightCorner{ 
            max-height:30px;
            border:solid;
            position: fixed;
            top: 0px;
            right:5px;
            float: right; 
            display: flex;
            flex-direction: row;
            padding:10px;  
            font-size: 14px; 
            color: #fff;
            text-align: center;    
        } 

        .CenteredPannel{
            padding-top:70px;
            padding-bottom: 5%;
            width: 850px;
            height: 1100px;
            background-color: #fff;  
            margin: auto;
        }
        .SubTitle{
            padding-left: 50px; 
            padding-right: 50px; 
            float: left;    
            text-align: center;   
            color: #0070c0;  
            text-align: left;
            font-size: 50px; 
            text-shadow: 1px 1px 2px white; 
        }
        .content{
            padding-left: 50px; 
            padding-top:20px;
            float: left;    
            text-align: center;   
            color: #0070c0;  
            text-align: left;
            font-size: 25px; 
        }
        th.data{
            font-size: 35px;
        }
        .Topic{
            margin:auto;
            font-size: 40px;
            color:#0070c0;
            margin-bottom: 15px;
        }
    .image_frame{
      width: 230px;
      height: 280px;
      margin-left:20px;
      margin-top:20px;
      float: left;
    }
    .data_frame{
      width: 550px;
      height: 280px;
      float:right;
      margin-top:20px;
    }
    .fileFrame{
        cursor:pointer;
      border: 2px dashed #ccc;
      border-radius: 20px;
      padding:5px;
      margin:20px;
      width: 750px;
      height: 50px;
      text-align: center;
      border-radius: 50px ;
      float:left;
      font-size: 25px;
      font-weight: 450;
      color: #000;
      padding-left:30px;
      padding-right:30px;
      transition: 0.4s ease;    
    }
    .fileFrame:hover{
        background-color: #74b72e;
        color:#fff;
    }

 
.preview-container {
  border: 2px dashed #ccc;
      border-radius: 20px;
      width: 210px;
      height: 275px;
      text-align: center;
      margin:2px;
      border-radius: 50px ;
      line-height: 240px;
}

.preview-image {
  max-width: 230px;
  max-height: 275px;
  text-align: center;
  border-radius: 50px ;
}
#LoginPage{    
width: 70px;    
max-width:70px;
height: 30px;    
background: #ffc107;    
border: none;    
margin-top: 30px;    
font-size: 18px;    
border-radius: 10px;    
cursor: pointer;    
transition: 0.4s ease;    
color: #fff; 
margin:0px;
text-align:center;
}    

#LoginPage{    
height:100%;
color: #fff;    
text-align:center;
padding:auto;
}    

#LoginPage:hover{    
background: #74b72e;    
color: #fff;    
}    

#LoginPage a{    
text-decoration: none;    
color: #000;    
text-align:center;
font-weight: bold;    
}    
#session_username{
     font-size:28px;margin-right:5px;
}
.TopRightCorner{ 
    max-height:30px;
    border:solid;
	  position: fixed;
	  top: 0px;
    right:5px;
    float: right; 
    display: flex;
    flex-direction: row;
    padding:10px;  
    font-size: 14px; 
    color: #fff;
    text-align: center;    
} 

    .submitFrame{
        cursor:pointer;
        background-color:#fff;
        border: 2px dashed #ccc;
        border-radius: 20px;
        padding:5px;
        margin:20px;
        width: 814px;
        height: 64px;
        text-align: center;
        border-radius: 50px ;
        float:left;
        font-size: 25px;
        font-weight: 450;
        color: #000;
        padding-left:30px;
        padding-right:30px;
        transition: 0.4s ease;    
    }
    .submitFrame:hover{
        background-color: #74b72e;
        color:#fff;
    }
    .submitFrame-red{
        cursor:pointer;
        background-color:#fff;
        border: 2px dashed #ccc;
        border-radius: 20px;
        padding:5px;
        margin:20px;
        width: 814px;
        height: 64px;
        text-align: center;
        border-radius: 50px ;
        float:left;
        font-size: 25px;
        font-weight: 450;
        color: #000;
        padding-left:30px;
        padding-right:30px;
        transition: 0.4s ease;    
    }
    .submitFrame-red:hover{
        background-color: #F00;
        color:#fff;
    }
    #session_username{
     font-size:28px;margin-right:5px;
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
      width: 235px;
      height: 275px;
      text-align: center;
      margin:2px;
      border-radius: 50px ;
      line-height: 240px;
}

.old_preview-image {
  max-width: 230px;
  max-height: 275px;
  text-align: center;
  border-radius: 50px ;
}
      </style>
</head>
<body>
  
 
<div class="navbar">    

<div class="icon">    

    <img src="https://www.hkit.edu.hk/en/images/logo_ebooklet.png" width ="279" height="45" >   

</div>    

<div class="menu">    

    <ul>    

        <li><a href="../home_page.php">HOME</a></li>    

        <li><a href="../about_us_page.php">ABOUT</a></li>    

        <li><a href="student_work.php" style="background: #ddd; color: black;">STUDENT WORK</a></li>    

        <li><a href="../message/index.php">MESSAGING</a></li>    

        <li><a href="../edit_profile/profile_page.php">PROFILE</a></li>    

        <li><a href="../contact_us_page.php">CONTACT US</a></li>    

    </ul>    

</div>    
</div>  
<div class="TopRightCorner"> 

<h2 style="line-height:25px; font-size:28px;margin-right:5px;">Welcome, </h2>
<b><div id="session_username"> <?php echo $_SESSION['role']; ?>: <?php echo $_SESSION['username']; ?></div></b>
<a href="../logout.php"><button id="LoginPage">Logout</button></a>

</div> 
<div class = "CenteredPannel">

    <?php
        //initializing
        //student work info
        $student_work_logo = "";
        $title = "";
        $description = "";
        $path_file = "#";
        //course info
        $course_code = "";
        $course_name = "";
        $course_teacher = "";
        //student info
        $student_id = "";
        $student_name = "";
        $student_email = "";
        $student_phone = "";
        if(isset($_POST["accept"])){
            // Database connection
            $servername = "127.0.0.1";
            $username = "root"; // Change as needed
            $password = ""; // Change as needed
            $dbname = "sms";
            $conn = new mysqli($servername, $username, $password, $dbname);
            $student_work_id = $_POST['sw_id']; // This fetches the submitted sw_id value
            echo $student_work_id;
            // Prepare and bind for student work

            $sql = "SELECT * FROM waitinglist WHERE sw_id='".$student_work_id."'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $logo_name=$row["logo_name"];
                $logo_type=$row["logo_type"];
                $path_file= $row["file_name"];
                $file_type=$row["file_type"];
                $title = $row["title"];
                $description = $row["description"];
                $course_code = $row["course_id"];
                $student_id = $row["student_id"];
            }
            $sql = "INSERT INTO studentworks (logo_name, logo_type, file_name, file_type, title, description, student_ID, course_ID) 
    VALUES ('$logo_name', '$logo_type', '$path_file', '$file_type', '$title', '$description','$student_id', '$course_code')";
            if ($conn->query($sql) === TRUE) {
                $sql = "DELETE FROM waitinglist WHERE sw_id = '".$student_work_id."'";
                if($result = $conn->query($sql)){
                    echo '<script>alert("Work '.$student_work_id.' posted to public successfully!");
                    window.location.href="waiting_list.php";
                    </script>';
                } else {
                    echo "Error: " . $stmt->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        

        if(isset($_POST["deny"])){
            // Database connection
            $servername = "127.0.0.1";
            $username = "root"; // Change as needed
            $password = ""; // Change as needed
            $dbname = "sms";
            $conn = new mysqli($servername, $username, $password, $dbname);
            $student_work_id = $_POST['sw_id']; // This fetches the submitted sw_id value
            $sql = "DELETE FROM waitinglist WHERE sw_id = '".$student_work_id."'";
            if($result = $conn->query($sql)){
                echo '<script>alert("Work '.$student_work_id.' has been denied successfully!");
                window.location.href="waiting_list.php";
                </script>';
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        if(isset($_POST["visit"]))
        {
            $student_work_id = $_POST['sw_id']; // This fetches the submitted sw_id value
            echo "<h1 style='color:#0070c0; margin:auto;padding-left:10px; '> Student work ID: " . htmlspecialchars($student_work_id) . "</h1>";

            // Database connection
            $servername = "127.0.0.1";
            $username = "root"; // Change as needed
            $password = ""; // Change as needed
            $dbname = "sms";
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Prepare and bind for student work
            $stmt = $conn->prepare("SELECT sw_id,logo_name,file_name,title,description,course_id,student_id FROM waitinglist where sw_id = ?");
            $stmt->bind_param("i", $student_work_id);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $student_work_logo= "../../../uploads/logo/$row[logo_name]";
                        $path_file= "../../../uploads/file/$row[file_name]";
                        $title = $row["title"];
                        $description = $row["description"];
                        $course_code = $row["course_id"];
                        $student_id = $row["student_id"];
                    }
                }
            } else {
                echo "Error: " . $stmt->error;
            }  
            //for course
            $stmt = $conn->prepare("SELECT course_name,teacher_ID FROM course where course_code = ?");
            $stmt->bind_param("s", $course_code);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $course_name = $row["course_name"];
                        $course_teacher = $row["teacher_ID"];
                    }
                }
            } else {
                echo "Error: " . $stmt->error;
            } 
            //for student
            $stmt = $conn->prepare("SELECT student_id, lastName, firstName, phoneNumber,email FROM student where user_id = ?");
            $stmt->bind_param("i", $student_id);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $student_id = $row["student_id"];
                        $student_name = $row["lastName"] . " " . $row["firstName"];
                        $student_email = $row["email"];
                        $student_phone = $row["phoneNumber"];
                    }
                }
            } else {
                echo "Error: " . $stmt->error;
            }  

            $conn->close();
            echo '

            <h1 style="color:#0070c0; margin:auto;padding-left:10px; "> Student work information:</h1>
                <div id="works_info"style="left: 50px;width:850px; height:100%;  text-align: center;">
                <div class="image_frame">
                    <div id="previewContainer" class="preview-container" >
                        <img src="' . $student_work_logo . '" alt="Image"  width="100%" height="100%"style="padding:0px;      border-radius: 20px;">
                    </div>
                </div>

                <div class="data_frame">
                    <input type="String" readonly value="'.$title.'" name="Title" id="Title" placeholder = "Title"style="padding-left: 10px;float:left;border-radius: 50px ;font-size: 35px;width: 510px;height: 50px;">
                    <textarea readonly name="Description" id="Description"placeholder = "Type some description to describe your work in under 200 characters."style="padding: 7px;float:left;border-radius: 20px ; margin-top:10px;width: 510px;height:200px; " rows="2" cols="50">'.$description.'
                    </textarea>
                </div>
                <a href="'.$path_file.'">
                    <div class="fileFrame">
                    <header style="padding:10px;">You may download the file from here </header>
                    </div>
                </a>
                <h1 style="color:#0070c0; margin:auto;padding-left:10px; float:left;"> Course information:</h1><br>


                <form action="details.php" method="post">
                    
                    <table id="course_info"style=
                        "width:90%;
                        margin:auto;
                        border-radius:15px;
                        border:1px solid;
                        text-align:left;
                        padding-left:20px;
                        font-size:30px;">
                        <tr><td style="width: 40%;">Course code:</td>
                        <td>'.$course_code.'</td></tr>
                        <input type="hidden" name="courseID" value="'.$course_code.'">
                        <tr><td>Course name:</td>
                        <td>'.$course_name.'</td></tr>
                        <tr><td>Responsible teacher ID:</td>
                        <td>'.$course_teacher.'</td></tr>
                        <input type="hidden" name="teacherID" value="'.$course_teacher.'">
                    </table>
                    <button type="submit" class="submitFrame" name="course_click">
                        <header style="padding:10px;">Know more about the course?</header>
                    </button>
                    <button type="submit" class="submitFrame" name="teacher_click">
                        <header style="padding:10px;">Know more about the teacher?</header>
                    </button>
                    <h1 style="color:#0070c0; margin:auto;padding-left:10px; float:left;"> Student inforamtion:</h1><br>
                    <table id="student_info"style=
                        "width:90%;
                        margin:auto;
                        border-radius:15px;
                        border:1px solid;
                        text-align:left;
                        padding-left:20px;
                        font-size:30px;">
                        <tr><td>Student ID:</td>
                        <td >'.$student_id.'</td></tr>
                        <input type="hidden" name="studentID" value="'.$student_id.'">
                        <tr><td>Student name:</td>
                        <td>'.$student_name.'</td></tr>
                        <tr><td>Email address:</td>
                        <td>'.$student_email.'</td></tr>
                        <tr><td>Phone number:</td>
                        <td>'.$student_phone.'</td></tr>
                    </table>
                    <button type="submit" class="submitFrame" name="student_click">
                        <header style="padding:10px;">Know more about this student?</header>
                    </button>
                </form>';
            }
    ?>

<script>
        document.getElementById('imageFile').addEventListener('change', function(event) {
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
                };
                reader.readAsDataURL(file);
            });
        });
    </script>


</div>
</body>
</html>