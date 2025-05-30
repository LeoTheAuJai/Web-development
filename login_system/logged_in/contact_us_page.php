<?php
session_start();

$servername = "127.0.0.1"; // Change if your server is different
$db_username = "root"; // Your database username
$db_password = ""; // Your database password
$dbname = "sms";
$pdo = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}

?>
<!DOCTYPE html>    

<html lang="en">    

<head>    

    <title>Contact Us</title>    

    <style>    

    *{    

    margin: 0;    
    padding: 0;    
    font-family:Calibri;

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
    margin-right :15px; 
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
    padding-left:50px;
	width: 800px;
	height: 900px;
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
.map{   
    padding-left: 80px; 
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

#LoginPage a{    
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
.CenterPannelCampus{
            top: 50%; left: 50%; transform: translate(-50%, -50%);
            position:fixed;
            padding-top:70px;
            padding-bottom: 5%;
            width: 884.67px;
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

                <h2 class="logo"><img src="https://www.hkit.edu.hk/en/images/logo_ebooklet.png" width ="279" height="45"></h2>    

            </div>    

            <div class="menu">    

                <ul>    
                    <li><a href="home_page.php">HOME</a></li>  

                    <li><a href="about_us_page.php">ABOUT</a></li>    

                    <li><a href="student_work/student_work.php">STUDENT WORK</a></li>    

                    <li><a href="message/index.php">MESSAGING</a></li>    

                    <li><a href="edit_profile/profile_page.php">PROFILE</a></li>    

                    <li><a href="#"style="background: #ddd; color: black;">CONTACT US</a></li>  

                </ul>    

            </div>    
            </div>
            <div class="TopRightCorner"> 

                <div style="line-height:27px; font-size:24px;margin-right:5px;"><b>Welcome,</b></div>
                <b><div id="session_username" style="font-size:24px;margin-right:5px;"> <?php echo $_SESSION['role']; ?>: <?php echo $_SESSION['username']; ?></div></b>
                <a href="logout.php"><button id="LoginPage"><b>LOGOUT</b></button></a>

            </div> 

	<div class = "CenteredPannel">
        
        <div class = "SubTitle" style="font-family: Calibri"><b>Contact Us</b> </div><br>
        <div class = "content" style="font-family: Calibri">
            <img src="../../images/hkit.png" style="float: right;width: 200px;height: 200px;margin-right: -40%;">
            <p><b>General and Course Enquiry</b></p>
            <p>Sham Shui Po Main Campus (ED 525898):<br>
             213 Nam Cheong Street, Sham Shui Po, Kowloon</p>
            <p>Tel: 27822433</p>
            <p>Email:enquiry@hkit.edu.hk</p>
            <p>Monday to Friday 09:00 - 17:30</p>
            <p>(Lunch-time: 12:30 - 13:30)</p>
            <p>Saturday 14:00 - 18:00</p>
            <br>
            <p><b>Technical Support</b></p>
            
            <p>itadmin@hkit.edu.hk</p>
        </div>
        <div class = "map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.5730646894995!2d114.16288301187363!3d22.331980679579008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400b532b0290f%3A0xe311e4fbd4d493f9!2z6aaZ5riv56eR5oqA5bCI5LiK5pu46Zmi!5e0!3m2!1szh-TW!2shk!4v1729097616553!5m2!1szh-TW!2shk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
	</div>
    <div class="CenterPannelCampus"></div>
</body>
</html>
 