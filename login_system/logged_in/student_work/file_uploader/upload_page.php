<?php
    session_start();

    $servername = "127.0.0.1"; // Change if your server is different
    $db_username = "root"; // Your database username
    $db_password = ""; // Your database password
    $dbname = "sms";
    $pdo = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);
    //<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> this destroy my format so I extract some needed class only
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login.php");
        exit;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Student Work</title>
    <link rel="stylesheet" href="../file_upload_button.css">
    <style>
        *{    
            margin: 0;    
            padding: 0;    
            font-family:Calibri;
        }  
        body{
            
            background-image: linear-gradient(to top, rgba(255, 255, 255, 0.5)50%,rgba(255, 255, 255, 0.5)50%), url(../../../../images/background\ image.png);    
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
width: 80px;    
max-width:80px;
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

        <li><a href="../../home_page.php">HOME</a></li>    

        <li><a href="../../about_us_page.php">ABOUT</a></li>    

        <li><a href="../student_work.php" style="background: #ddd; color: black;">STUDENT WORK</a></li>    

        <li><a href="../../message/index.php">MESSAGING</a></li>    

        <li><a href="../../edit_profile/profile_page.php">PROFILE</a></li>    

        <li><a href="../../contact_us_page.php">CONTACT US</a></li>    

    </ul>    

</div>    
</div>  
<div class="TopRightCorner"> 

                <div style="line-height:27px; font-size:24px;margin-right:5px;"><b>Welcome,</b></div>
                <b><div id="session_username" style="font-size:24px;margin-right:5px;"> <?php echo $_SESSION['role']; ?>: <?php echo $_SESSION['username']; ?></div></b>
                <a href="../logout.php"><button id="LoginPage"><b>LOGOUT</b></button></a>

            </div> 

<div class = "CenteredPannel">
<?php
echo "<h1 style='color:#0070c0; margin:auto;padding-left:10px; '>Uploading Page</h1>";
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


echo '<form id="uploadForm" action="uploading.php" method="POST" enctype="multipart/form-data"style="left: 50px;width:850px; height:70%;  text-align: center;">
                        <input type="hidden" name="student_work_id">
<div class="image_frame">
    <div id="previewContainer" class="old_preview-container" >
    Select a image file for logo  
    </div>
    <input type="file" class="form-control" name="imageFile"  id="imageFile" accept="image/*" required style="border:solid,2px;border-radius:5px;width:92%;margin-top:10px;">
</div>

<div class="old_data_frame">
    <input type="String" name="Title" id="Title"  placeholder = "Title"style="padding-left: 10px;float:left;border-radius: 50px ;font-size: 35px;width: 510px;height: 50px;">
    <select name="Course" style="padding-left: 10px;float:left;border-radius: 50px;width: 520px;height: 30px;margin-top:10px;" onchange="disableDefaultOption(this)">
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
    echo'<textarea name="Description" id="Description" maxlength="350" placeholder = "Type some description to describe your work in under 200 characters."style="padding: 7px;float:left;border-radius: 20px ; margin-top:10px;width: 510px;height:220px; " rows="2" cols="50">
</textarea>
</div>
<div class="old_fileFrame">
<header style="padding:10px;">Select your zipped file for guest to download</header>

<div class="mb-3">
<label for="file" class="form-label">Select File</label>
<input type="file" class="form-control" name="zipFile" id = "zipFile" accept=".zip" required style="border:solid,2px;border-radius:5px;width:96%;margin-top:20px;">
</div>
</div>
        <button type="submit" class="submitFrame" name="edit">
            <header style="padding:10px;">SUBMIT THE STUDENT WORK</header>
        </button>
</form>';
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
    <script>
        function disableDefaultOption(selectElement) {
            const defaultOption = selectElement.options[0]; // The first option
            if (selectElement.selectedIndex !== 0) { // If anything other than the default is selected
                defaultOption.disabled = true; // Disable the default option
            } else {
                defaultOption.disabled = false; // Re-enable the option if default is selected again
            }
        }
    </script>
</body>
</html>