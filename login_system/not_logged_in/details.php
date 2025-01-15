
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        *{    
            margin: 0;    
            padding: 0;    
            font-family: Calibri;
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


        .CenteredPannel{
            padding-top:70px;
            padding-bottom: 5%;
            width: 850px;
            height: 800px;
            background-color: #fff;  
            margin: auto;
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

.fileFrame{
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
    .fileFrame:hover{
        background-color: #74b72e;
        color:#fff;
    }
    
    .Startingericstylesheet{}


    .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-header img {
            width: 330px;
            height: 385px;
            border-radius:50%;
        }
        .profile-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .profile-header p {
            color: #666;
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .profile-info p {
            margin: 5px 0;
            line-height: 1.5;
        }
        .contact {
            margin-top: 20px;
        }
        @media (max-width: 600px) {
            .profile-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .profile-header img {
                margin-bottom: 10px;
            }
        }
		table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
        .pagination { margin: 20px 0; }
        .pagination a { margin: 0 5px; padding: 8px 12px; border: 1px solid #ddd; text-decoration: none; }
        .pagination a.active { background-color: #007bff; color: white; }
        .pagination a:hover { background-color: #ddd; }


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

<h2 style="line-height:25px; font-size:24px;margin-right:5px;">Welcome, Guest</h2>
<a href="../../login.php"><button id="LoginPage">Login</button></a>

</div> 
<div class = "CenteredPannel">
<h1 style="color:#0070c0; margin:auto;padding-left:10px; "> Detailed information:</h1><br>
    <?php
        //start here show error message do not cover by nav bar
        // Database connection
        $servername = "127.0.0.1";
        $username = "root"; // Change as needed
        $password = ""; // Change as needed
        $dbname = "sms";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $studentID=$_POST["studentID"];
        $teacherID=$_POST["teacherID"];
        $courseID=$_POST["courseID"];
        $sw_id = "";
        $logo_path = "";
        $course = "";
        $faculty = "";
        $unique_faculty=[];

        if(isset($_POST["course_click"])){

            $sql = "SELECT * FROM course where teacher_ID=" . $teacherID;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Get the field names and create table headers
                // Fetch rows and output data
                while ($row = $result->fetch_assoc()) { 
                    $course_name=$row["course_name"];
                    $course_code=$row["course_code"];
                    $course_description = $row["course_desc"];
                    $faculty = $row["course_dept"];
                    $progName = $row["progName"];
                }
            }else {
                echo "0 results";
            } 
            echo'    <div class="container" id = "container">
                <div class="profile-header">
                    <div class="profile-info">
                        <h1>Hong Kong institutes of technology(HKIT)</h1>
                        <h1>Course Profile</h1>
                        <h1>Course code: ' . $course_code . '</h1>
                        <h2>Course name: ' . $course_name . '</h2>
                        <h2>Course description: </h2>
                        <p>' . $course_description . '</p>
                        <h2>Faculty: </h2>
                        <p>' . $faculty . '</p>
                        <h2>Under programme: </h2>
                        <p>' . $progName . '</p>
                        <h2>Responsible Teacher ID: </h2>
                        <p>' . $teacherID . '</p>
                    </div>
                </div>
            
            </div>';    
        }
        if(isset($_POST["teacher_click"])){
            $sql = "SELECT * FROM teacher where teacher_id = " . $teacherID;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Get the field names and create table headers
                // Fetch rows and output data
                while ($row = $result->fetch_assoc()) {      
                    $logo_path = "../../images/teacher/" . $row["logo_path"];
                    $name = $row["lastName"] . " " .  $row["firstName"];
                    $qualification_array = array_map('trim', explode(", ", $row["qualification"]));
                    $phonenum = $row["phone_num"];
                    $email = $row["email_addr"];
                    $experience = $row["exp"];
                    $department = $row["dept"];
                }
            }else {
                echo "0 results";
            }     
            $sql = "SELECT * FROM course where teacher_ID=" . $teacherID;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Get the field names and create table headers
                // Fetch rows and output data
                while ($row = $result->fetch_assoc()) {      
                    $course = $course . " [ " . $row["course_code"] . " " . $row["course_name"] . " ] ";
                    $faculty_name = $row["course_dept"];
                    // Check if the faculty name is not already in the array
                    if (!in_array($faculty_name, $unique_faculty)) {
                        // Add the unique faculty name to the array
                        $unique_faculty[] = $faculty_name;
                    }
                }
                $faculty = implode(", ", $unique_faculty);
            }else {
                echo "0 results";
            }   
            $conn->close();
            echo '        
            <div class="container" id = "container">
                <div class="profile-header">
                    <div class="profile-info">
                    <h1>Hong Kong Institute of Technology (HKIT)</h1>
                        <h2>Teacher Profiles</h2>
                        <div>
                            <h1>Name: ' . $name . '</h1>
                            <h2>Faculty: <h2>
                            <p>' . $faculty . '</p>
                            <h2>Responsible Programme: </h2>
                            <p>' . $course . '</p>
                        </div>
                        <h2>Qualification: </h2>
                        <div class="profile-info">
                            <p>';
                            foreach ($qualification_array as $item) {
                                echo $item . "<br>"; // Use "<br>" for new lines in HTML
                            }
                            echo'</p>
                
                        </div>
                    </div>
                    <img src="' . $logo_path . '" alt="Profile Picture" style="max-width: 400px; max-height: 400px;">
                </div>
                <div class="contact">
                    <h2>Contact Information</h2>
                    <p>Phone: ' . $phonenum . '</p>
                    <p>Email: ' . $email . '</p>
                </div>
            </div>';
        }
        if(isset($_POST["student_click"])){
            $sql = "SELECT * FROM student where student_id=" . $studentID;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Get the field names and create table headers
                // Fetch rows and output data
                while ($row = $result->fetch_assoc()) {
                    $logo_path = "../../images/student/" . $row["logo_path"];
                    $intake_year=$row["intake_year"];
                    $grade_level=$row["gradelevel"];
                    $programme = $row["programme"];
                    $name = $row["lastName"] . " " . $row["firstName"];
                    $email = $row["email"];
                    $address = $row["address"];
                    $phonenum = $row["phoneNumber"];
                    $guardian = $row["guardian_info"];
                    $user_id = $row["user_id"];
                }
            }else {
                echo "0 results";
            }
            $sql = "SELECT sw_id FROM studentworks where student_id=" . $user_id;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Get the field names and create table headers
                // Fetch rows and output data
                while ($row = $result->fetch_assoc()) {
                    $sw_id=$sw_id . " , " . $row["sw_id"];
                }
                $sw_id = substr($sw_id, 3);
            }else {
                echo "0 results";
            }

            $conn->close();
            echo '<div class="container" id = "container">
                <div class="profile-header">
                    <div class="profile-info">
                        <h1>Hong Kong institutes of technology(HKIT)</h1>
                        <h1>Student Profile</h1>
                        <h1>Name: ' . $name .'</h1>
                        <h2>Intake Year</h2>
                        <p>'. $intake_year . '</p>
                        <h2>Grade Level</h2>
                        <p>' . $grade_level . '</p>
                        <h2>Programme name:</h2>
                        <p>' . $programme . '</p>
                    </div>
                    <img src="' . $logo_path . '" alt="Profile Picture ">
                </div>
            <div class="profile-info">
                <h2>Student works</h2>
                    <p>Student work ID : ' . $sw_id . '</p>
            </div>
                
            <div class="contact">
                <h2>Contact Information</h2>
                <p>Email: ' . $email . '</p>
                <p>Corresponding address: ' . $address . '</p>
                <p>Phone: ' . $phonenum . '</p>
                <p>Guardian Information: ' . $guardian . '</p>
                
            </div>
            
            </div>';
        }
        ?> 
        
        <button id="download" class= "fileFrame">Download as PDF</button>

 
</div>
<script>
        document.getElementById('download').addEventListener('click', function () {
            // Use html2canvas to take a screenshot of the div
            html2canvas(document.getElementById('container')).then(function (canvas) {
                // Convert the canvas to an image
                const imgData = canvas.toDataURL('image/png');
                
                // Create a new jsPDF instance
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF();

                // Add the image to the PDF
                pdf.addImage(imgData, 'PNG', 0, 20,220,150); // x, y coordinates for the image on the PDF

                // Save the PDF with the specified name
                pdf.save('download.pdf');
            });
        });

        function PleaseLoginFirst() {
            alert("Please Login First!");
        }
    </script>    <!-- Include jsPDF and html2canvas from a CDN -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
</body>
</html>