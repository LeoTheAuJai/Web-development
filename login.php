<?php
session_start();

$servername = "127.0.0.1"; // Change if your server is different
$db_username = "root"; // Your database username
$db_password = ""; // Your database password
$dbname = "sms";
$pdo = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);
   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
    //    header("Location: chat.php");
		header("Location: login_system/logged_in/home_page.php");
        

    } else {
        echo '<script>alert("Invalid Login")</script>';
    }
}
?>

<!DOCTYPE html>    

<html lang="en">    

<head>    

    <title>HKIT</title>    

    <style>    

    *{    

    margin: 0;    

    padding: 0;    

    font-family:calibri;

}  

.main{    

    width: 100%;    

    background: linear-gradient(to top, rgba(255, 255, 255, 0.5)50%,rgba(255, 255, 255, 0.5)50%), url(images/background\ image.png);    

    background-position: center;    

    background-size: cover;    

    height: 100vh;    

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

    margin-left: 0px;    

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
    margin-top:1px;
	padding-left: 30px; 
	height:50px;
    float: left;    
    text-align: center;    
}    

 


.TopRightCorner{ 
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

 

.content{    

    width: 1200px;    

    height: auto;    

    margin: auto;    

    color: #fff;    

    position: flex;    

    padding-left: 0px;    

    padding-top: 140px;    

}    

.content .par{    

    text-shadow: 1px 1px 2px black; 

    padding-left: 20px;    

    padding-bottom: 25px;    

    font-family: Arial;    

    letter-spacing: 1.2px;    

    line-height: 30px;    

}    

 

.content h1{    

    text-shadow: 1px 1px 2px black; 

    font-family: 'Times New Roman';    

    font-size: 50px;    

    padding-left: 20px;    

    margin-top: 9%;    

    letter-spacing: 2px;    

    color:#fff;  

}    

 

.content .cn{    

    width: 240px;    

    height: 40px;    

    background: #ffc107;    

    border: none;    

    margin-bottom: 10px;    

    margin-left: 20px;    

    font-size: 18px;    

    border-radius: 10px;    

    cursor: pointer;    

    transition: .4s ease;    

}    

 

.content .cn a{    

    text-decoration: none;    

    color: #fff;    

    transition: .3s ease;    

}    

 

.cn:hover{    

    background-color: #74b72e;    

}    

.content span{    

    color: #ffc107;    

    font-size: 65px    

}    

 

form{    

    width: 250px;    

    height: 380px;    

    background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);    
	
    position: fixed;
	top: 20%;
    right:100px;

    border-radius: 10px;    

    padding: 25px;    

}    

 

form h2{    

    width: 220px;    

    font-family: sans-serif;    

    text-align: center;    

    color: #ffc107;    

    font-size: 22px;    

    margin: 2px;    

    padding: 8px;    

}    

 

form input{    

    width: 240px;    

    height: 35px;    

    background: transparent;    

    border-bottom: 1px solid #ffc107;    

    border-top: none;    

    border-right: none;    

    border-left: none;    

    color: #fff;    

    font-size: 15px;    

    letter-spacing: 1px;    

    margin-top: 30px;    

    font-family: sans-serif;    

}    

 

form input:focus{    

    outline: none;    

}    

::placeholder{    

    color: linear-gradient(to top, rgba(255, 255, 255, 0.5)50%,rgba(255, 255, 255, 0.5)50%);    

    font-family: Arial;    

}    


 

.btnn{    

    width: 240px;    

    height: 40px;    

    background: #ffc107;    

    border: none;    

    margin-top: 30px;    

    font-size: 18px;    

    border-radius: 10px;    

    cursor: pointer;    

    transition: 0.4s ease;    
    color: #fff; 

}    

.content .btnn a{    

    color: #fff;    

}    

.btnn:hover{    

    background: #74b72e;    

    color: #fff;    

}    

.btnn a{    

    text-decoration: none;    

    color: #000;    

    font-weight: bold;    

}    

form .link{    

    font-family: Arial, Helvetica, sans-serif;    

    font-size: 17px;    

    padding-top: 20px;    

    text-align: center;    

}    

form .link a{    

    text-decoration: none;    
    color: #ffc107;    
    transition: 0.4s ease;    
}    
form .link a:hover{    
color: #74b72e;    
}   

.liw{    

    padding-top: 15px;    

    padding-bottom: 10px;    

    text-align: center;    

}    

.icons a{    

    text-decoration: none;    

    color: #fff;    

}    

.icons ion-icon{    

    color: #fff;    

    font-size: 30px;    

    padding-left: 14px;    

    padding-top: 5px;    

    transition: 0.3s ease;    

}    

 

.icons ion-icon:hover{    

    color: #ffc107;    

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
@media screen and (max-width: 700px) {
  body {
    background-color: olive;
    color: white;
  }
  #login_form {
    top:10%;
    width:90%;
    height:90%;
    bottom:0px;
    right:0px;
    background:black;
  }
  form input{
    width:100%;
    height:15%;
    font-size:30px;
  }
  form .btnn{
    width:100%;
    height:15%;
    font-size:30px;
  }
  form h2{
    width:100%;
    font-size:30px;
    height:10%;
  }
  form .link{
    font-size:30px;
  }
  form .liw{
    font-size:30px;
  }
  form .icons{
    width:100%;
    text-align:center;
  }
}

</style>    

 

</head>    

<body>    

 

    <div class="main">    

       <div class="navbar">    

            <div class="icon">    

                <h2 class="logo"><img src="https://www.hkit.edu.hk/en/images/logo_ebooklet.png" width ="279" height="45"></h2>    

            </div>    

            <div class="menu">    

                <ul>    

                    <li><a href="login_system/not_logged_in/home_page.html">HOME</a></li>    

                    <li><a href="login_system/not_logged_in/about_us_page.html">ABOUT</a></li>    

                    <li><a href="login_system/not_logged_in/student_work_for_guest.php">STUDENT WORK</a></li>    

                    <li><a href="#"onclick="PleaseLoginFirst()">MESSAGING</a></li>    

                    <li><a href="#"onclick="PleaseLoginFirst()">PROFILE</a></li>    

                    <li><a href="login_system/not_logged_in/contact_us_page.html">CONTACT US</a></li>    

                </ul>    

            </div>    

            

        </div>  
        <div class="TopRightCorner"> 

                <h2 style="line-height:25px; font-size:24px;margin-right:9px;">Welcome, Guest</h2>
                <a href="#"><button id="LoginPage" ><b>LOGIN</b></button></a>

            </div> 

        <div class="content">    

            <h1>Hong Kong Institute of <br>Technology</h1>    

            <p class="par">This website will showcase the achievements <br>   

                            and outputs of the final year undergraduate <br>   

                            students. Check our graduates good work as a guest.</p>    

                <button class="cn"><a href="login_system/not_logged_in/home_page.html">Continue as a guest</a></button>    

                <form method="POST" id="login_form">    

                    <h2>Login Here</h2>    

                    <input type="text" name="username" required placeholder="User Name">    

                    <input type="password" name="password" required placeholder="Password">    
 
                    <button class="btnn" type="submit">Login</button>

                    <div class="lower_half">
                        <p class="link">Don't have an account<br>    

                        <a href="register_system/register.php" hover{color:#74b72e;}>Sign up </a> here</p>    

                        <p class="liw">Log in with</p>    

                        <div class="icons">    

                            <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>    

                            <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>    

                            <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>    

                            <a href="#"><ion-icon name="logo-google"></ion-icon></a>    

                            <a href="#"><ion-icon name="logo-skype"></ion-icon></a>    

                        </div>    
                    </div>
                </form>
                

             </div>    

            </div>    

         </div>    

    </div>    

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>    
    <script>
        function PleaseLoginFirst() {
            alert("Please Login First!");
        }
    </script>


</body>    

 

</html> 

 