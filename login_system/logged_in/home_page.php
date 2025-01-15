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

    <title>Home Page</title>    

    <style>    

    *{    
      font-family: Calibri;

    margin: 0;    

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
    z-index: 10;

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
.aboutImage{   
    padding-right: 100px;
    float: right;
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
        .fileFrame{
        cursor:pointer;
        background-color:#fff;
        border: 2px dashed #ccc;
        color: #0070c0;
        border-radius: 20px;
        padding:5px;
        margin:20px;
        width: 85%;
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
      background-color: #0070c0;
        color:#fff;
    }

.mySlides {display: none}
img {vertical-align: middle; max-width: 100%;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  border-radius: 100%;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 100%;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
        .dashboardContainer{
            border: 2px solid #0070c0;
            border-radius:15px;
            width: 85%;
            height:250px;
            margin:auto;
        }
        table{
            float:right;
            margin-top: 10px;
            margin-right: 10px;
            width: 79%;
            max-width: 79%;
            height: 116px;
            text-align: left;
            padding: 0px;
            border-style: none; ;
        }
        th{
            font-size: 35px;
        }
        .Topic{
          padding-left:50px;
            margin:auto;
            font-size: 40px;
            color:#0070c0;
            margin-bottom: 15px;
        }
        #session_username{
     font-size:28px;margin-right:5px;
}.CenterPannelCampus{
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

                <h2 class="logo"style="width : 279px; height: 47.3px;"><img src="https://www.hkit.edu.hk/en/images/logo_ebooklet.png" ></h2>    

            </div>    

            <div class="menu">    

                <ul>    

                    <li><a href="#"style="background: #ddd; color: black;">HOME</a></li>    

                    <li><a href="about_us_page.php">ABOUT</a></li>    

                    <li><a href="student_work/student_work.php">STUDENT WORK</a></li>    

                    <li><a href="message/index.php">MESSAGING</a></li>    

                    <li><a href="edit_profile/profile_page.php">PROFILE</a></li>    

                    <li><a href="contact_us_page.php">CONTACT US</a></li>   

                </ul>    

            </div>    
            </div>
            <div class="TopRightCorner"> 

                <div style="line-height:27px; font-size:24px;margin-right:5px;"><b>Welcome,</b></div>
                <b><div id="session_username" style="font-size:24px;margin-right:5px;"> <?php echo $_SESSION['role']; ?>: <?php echo $_SESSION['username']; ?></div></b>
                <a href="logout.php"><button id="LoginPage"><b>LOGOUT</b></button></a>

            </div> 
	<div class = "CenteredPannel">

        
        <div class = "SubTitle">Welcome to our website</div><br>
        
<div class="slideshow-container">

    <div class="mySlides fade">
      <a href="https://web.hkit.edu.hk/graduation/">
        <img src="../../images/banner/main_banner_graduation_2024_v1.jpg">
      </a>
    </div>
    
    <div class="mySlides fade">
      <a href="https://www.hkit.edu.hk/tchk/programmes/hd/">
        <img src="../../images/banner/main_banner_hd_2024_c.jpg">
      </a>
    </div>
    
    <div class="mySlides fade">
      <a href="https://www.hkit.edu.hk/en/degree_intro_uwl.php">
        <img src="../../images/banner/main_banner_uwl_2024_v1.jpg" >
      </a>
    </div>
    
    <div class="mySlides fade">
      <a href="https://www.hkit.edu.hk/tchk/degree_gu.php">
        <img src="../../images/banner/main_banner_WU_2024_v1_c.jpg">
      </a>
    </div>

    <div class="mySlides fade">
      <a href="https://www.hkit.edu.hk/tchk/about-hkit/facilities-and-services/?fs=campus-facilities&rs=library">
        <img src="../../images/banner/mainbanner_2024_library_10.jpg" >
      </a>
    </div>

    <div class="mySlides fade">
      <a href="https://dae.hkit.edu.hk/">
        <img src="../../images/banner/mainbanner_202307_oa_v1-1.jpg" >
      </a>
    </div>

    <div class="mySlides fade">
      <a href="https://www.hkit.edu.hk/en/media/news/nd/?n=240">
        <img src="../../images/banner/mainbanner_20220909_v2.jpg" >
      </a>
    </div>

    <div class="mySlides fade">
      <a href="https://www.hkit.edu.hk/tchk/#">
        <img src="../../images/banner/mainbanner_20230701_gubus.jpg" >
      </a>
    </div>

      <div class="mySlides fade">
        <a href="https://web.hkit.edu.hk/oapp/as/">
          <img src="../../images/banner/mainbanner_AS_system_v2_c.jpg">
        </a>
      </div>

      <div class="mySlides fade">
        <a href="https://www.hkit.edu.hk/tchk/programmes/hd/">
          <img src="../../images/banner/mainbanner_BHD.jpg">
        </a>
      </div>

      <div class="mySlides fade">
        <a href="https://dae.hkit.edu.hk/">
          <img src="../../images/banner/mainbanner_dae_002a_v2.jpg" >
        </a>
      </div>

      <div class="mySlides fade">
        <a href="https://www.hkit.edu.hk/tchk/programmes/degree/">
          <img src="../../images/banner/mainbanner_nmtss_2024-25_v1_c.jpg">
        </a>
      </div>

      <div class="mySlides fade">
        <a href="https://yijinhkit.edu.hk/pt/locatonline.php">
          <img src="../../images/banner/mainbanner_ptdae_202409_s2.jpg">
        </a>
      </div>

      <div class="mySlides fade">
        <a href="https://dae.hkit.edu.hk/pt/timetable/">
          <img src="../../images/banner/mainbanner_ptdyj_202409.jpg">
        </a>
      </div>

      <div class="mySlides fade">
        <a href="https://www.hkit.edu.hk/tchk/#">
          <img src="../../images/banner/mainbanner_uwlbs_2407.jpg">
        </a>
      </div>
    
    <a class="prev" onclick="plusSlides(-1)"><b>&#11207;</b></a>
    <a class="next" onclick="plusSlides(1)"><b>	&#11208;</b></a>
    
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
      <span class="dot" onclick="currentSlide(4)"></span> 
      <span class="dot" onclick="currentSlide(5)"></span> 
      <span class="dot" onclick="currentSlide(6)"></span> 
      <span class="dot" onclick="currentSlide(7)"></span> 
      <span class="dot" onclick="currentSlide(8)"></span> 
      <span class="dot" onclick="currentSlide(9)"></span> 
      <span class="dot" onclick="currentSlide(10)"></span> 
      <span class="dot" onclick="currentSlide(11)"></span> 
      <span class="dot" onclick="currentSlide(12)"></span> 
      <span class="dot" onclick="currentSlide(13)"></span> 
      <span class="dot" onclick="currentSlide(14)"></span> 
      <span class="dot" onclick="currentSlide(15)"></span> 
    </div>
    <div class = "Topic">We guess you would like to take a look on: </div>
    <a href="student_work/student_work.php">
      <div class = "fileFrame">
        <h2>Our Student works</h2>
      </div>
    </a>
    <a href="https://www.hkit.edu.hk/tchk/">
      <div class = "fileFrame">
        <h2>Official HKIT Website</h2>
      </div>
    </a>

	</div>
    <script>
        function PleaseLoginFirst() {
            alert("Please Login First!");
        }
    </script>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
        }
        </script>
        <div class="CenterPannelCampus"></div>
        
</body>
</html>
 