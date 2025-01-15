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

    <title>Profile Page</title>    
    <style>
        *{    
            margin: 0;    
            padding: 0;    
            font-family: Calibri;
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
            height: 800px;
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
      line-height:45px;
    }
    .fileFrame:hover{
        background-color: #0070c0;
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
}.CenterPannelCampus{
            top: 50%; left: 50%; transform: translate(-50%, -50%);
            position:fixed;
            padding-top:70px;
            padding-bottom: 5%;
            width: 850px;
            height: 100%;
            background-color: #fff;  
            margin: auto;
            z-index: -1;
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

    <li><a href="../student_work/student_work.php" >STUDENT WORK</a></li>    

    <li><a href="../message/index.php">MESSAGING</a></li>    

    <li><a href="../edit_profile/profile_page.php"style="background: #ddd; color: black;">PROFILE</a></li>    

    <li><a href="../contact_us_page.php">CONTACT US</a></li>    

</ul>    

</div>    
</div>  
<div class="TopRightCorner"> 

                <div style="line-height:27px; font-size:24px;margin-right:5px;"><b>Welcome,</b></div>
                <b><div id="session_username" style="font-size:24px;margin-right:5px;"> <?php echo $_SESSION['role']; ?>: <?php echo $_SESSION['username']; ?></div></b>
                <a href="logout.php"><button id="LoginPage"><b>LOGOUT</b></button></a>

            </div>  
       
	<div class = "CenteredPannel">
        <div class="Topic" style="padding-left:20px;">Profile Page</div>
        <center><img src="../../../images/profileImage.jpg" width=66% style="border-radius:20px;"></center>
        <div class="content">We guess you would like to:</div>
        <a href="preview_profile.php">
            <div class="fileFrame" name="preview" >Preview your profile?</div>
        </a>
        <a href="edit_profile.php">
            <div class="fileFrame" name="edit">Edit your profile?</div>
        </a>
        <a href="edit_user_info.php">
            <div class="fileFrame" name="edit">Edit your password?</div>
        </a>

	</div>

        <div class="CenterPannelCampus">
        </div>

    <script>
        function PleaseLoginFirst() {
            alert("Please Login First!");
        }
    </script>
</body>
</html>
 

