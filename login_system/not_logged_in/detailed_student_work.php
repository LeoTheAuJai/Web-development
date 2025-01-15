
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details of Student Work</title>
    <style>
        *{    
            margin: 0;    
            font-family: Calibri;
            padding: 0;    
        }  
        body{
            
            background-image: linear-gradient(to top, rgba(255, 255, 255, 0.5)50%,rgba(255, 255, 255, 0.5)50%), url(../../images/background\ image.png);    
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
  z-index: 10;
    border-radius:20px;
    background:#888;
    height:30px;
    max-height:30px;
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
    font-family:Calibri;
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


      </style>
</head>
<body>
  
 
<div class="navbar">    

<div class="icon">    

    <img src="https://www.hkit.edu.hk/en/images/logo_ebooklet.png" width ="279" height="45" >   

</div>    

<div class="menu">    

    <ul>    

        <li><a href="home_page.html">HOME</a></li>    

        <li><a href="about_us_page.html" >ABOUT</a></li>    

        <li><a href="student_work_for_guest.php"style="background: #ddd; color: black;">STUDENT WORK</a></li>    

        <li><a href="#" onclick="PleaseLoginFirst()">MESSAGING</a></li>    

        <li><a href="#" onclick="PleaseLoginFirst()">PROFILE</a></li>    

        <li><a href="contact_us_page.html">CONTACT US</a></li>    

    </ul>    

</div>    
</div>  
<div class="TopRightCorner"> 

              <h2 style="line-height:25px; font-size:24px;margin-right:9px;">Welcome, Guest</h2>
              <a href="../../login.php"><button id="LoginPage">Login</button></a>

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
            $stmt = $conn->prepare("SELECT sw_id,logo_name,file_name,title,description,course_id,student_id FROM studentworks where sw_id = ?");
            $stmt->bind_param("i", $student_work_id);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $student_work_logo= "../../uploads/logo/$row[logo_name]";
                        $path_file= "../../uploads/file/$row[file_name]";
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
        }
    ?>


  <h1 style="color:#0070c0; margin:auto;padding-left:10px; "> Student work information:</h1>
    <div id="works_info"style="left: 50px;width:850px; height:100%;  text-align: center;">
      <div class="image_frame">
        <div id="previewContainer" class="preview-container" >
            <?php echo'<img src="' . $student_work_logo . '" alt="Image"  width="100%" height="100%"style="padding:0px;      border-radius: 20px;">';?>
        </div>
      </div>

      <div class="data_frame">
        <input type="String" readonly value="<?php echo $title;?>" name="Title" id="Title" placeholder = "Title"style="padding-left: 10px;float:left;border-radius: 50px ;font-size: 35px;width: 510px;height: 50px;">
        <textarea readonly name="Description" id="Description"placeholder = "Type some description to describe your work in under 200 characters."style="padding: 7px;float:left;border-radius: 20px ; margin-top:10px;width: 510px;height:200px; " rows="2" cols="50"><?php echo $description;?>
        </textarea>
    </div>
    <a href="<?php echo $path_file;?>">
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
            <td><?php echo $course_code;?></td></tr>
            <input type="hidden" name="courseID" value="<?php echo $course_code; ?>">
            <tr><td>Course name:</td>
            <td><?php echo $course_name;?></td></tr>
            <tr><td>Responsible teacher ID:</td>
            <td><?php echo $course_teacher;?></td></tr>
            <input type="hidden" name="teacherID" value="<?php echo $course_teacher; ?>">
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
            <td ><?php echo $student_id;?></td></tr>
            <input type="hidden" name="studentID" value="<?php echo $student_id; ?>">
            <tr><td>Student name:</td>
            <td><?php echo $student_name;?></td></tr>
            <tr><td>Email address:</td>
            <td><?php echo $student_email;?></td></tr>
            <tr><td>Phone number:</td>
            <td><?php echo $student_phone;?></td></tr>
        </table>
        <button type="submit" class="submitFrame" name="student_click">
            <header style="padding:10px;">Know more about this student?</header>
        </button>
    </form>
    <script>
    function PleaseLoginFirst() {
            alert("Please Login First!");
        }
    </script>


</div>
</body>
</html>