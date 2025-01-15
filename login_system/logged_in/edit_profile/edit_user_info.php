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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../student_work/file_upload_button.css">
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
            float:left;
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
            padding-left:0px;
            margin:0px;
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
            font-size:12px;
            padding-top:70px;
            padding-bottom: 5%;
            width: 800px;
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
            font-size: 12px; 
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
      width: 424px;
      height: 500px;
      text-align: center;
      margin:2px;
      border-radius: 50px ;
      line-height: 500px;
}

.preview-image {
  max-width: 425px;
  height: 500px;
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
        margin:10px;
        width: 100%;
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
        form { 
            max-width: 400px; 
            margin: auto;
            padding-top:-10px;
         }
        input { width: 100%; margin: 10px 0; padding: 10px; }
        select { padding: 10px; width: 106%;margin: 12px 0; }
        .frame { 
            max-width: 400px; 
            margin: auto;
            padding-top:70px;
            font-size:18px;
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
        #update
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
        #update:hover{   
            background: #74b72e;    
            color: #fff;   
        }   
         #update:focus{   
            outline: none;   
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
  max-width: 425px;
  height: 500px;
  text-align: center;
  border-radius: 50px ;
}
.CenterPannelCampus{
            top: 50%; left: 50%; transform: translate(-50%, -50%);
            position:fixed;
            padding-top:70px;
            padding-bottom: 5%;
            width: 800px;
            height: 100%;
            background-color: #fff;  
            margin: auto;
            z-index: -1;
        }
        .submit
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
            text-align:center;
        }   

        .submit:hover{   
            background: #74b72e;   
        }   

        .submit:focus{   
            outline: none;   
        }   
        /* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
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
<div class ="Topic"><Center><b>Editing Password </b></center>
        <form id = "f"method="POST"  action="edit_user_info_action.php" onsubmit="return double_verification()">
            <div class="frame">
                User ID
            <input type="text" name="fk_user_id"  readonly value=<?php echo $_SESSION['user_id']; ?>>
                Role
                <input readonly id="mySelect" value=<?php echo $_SESSION['role']; ?> style="  width: 400px;">
                
            Password: <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            Retype Password: <input type="password" name="password" id="retyped_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <div id="error" name="error" style="color:red;"></div>
            <input class="submit" type="submit" value="Submit">
        </form>
    </div>
    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
  <p id="verify" class="invalid">Retyped password<b> is same</b></p>
</div>
<script>
    function double_verification()
    {
        //alert("hi");
        var a = document.getElementById("password");
        var b = document.getElementById("retyped_password");
        var c = document.getElementById("error");
        //var f = document.getElementById("f");
        if(a.value!=b.value){
            c.innerHTML="The password retyped is not the same";
            //alert(false);
            return false;
        }else {
            //alert(true);
            return true;
        }
    }
    function hasUpperCase(str) {
        return /[A-Z]/.test(str);
    }
    </script>
    <script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var verify = document.getElementById("verify");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }

  //double verification
  if(myInput.value == document.getElementById("retyped_password").value) {
    verify.classList.remove("invalid");
    verify.classList.add("valid");
  } else {
    verify.classList.remove("valid");
    verify.classList.add("invalid");
  }
}
</script>
<script>
var myInput1 = document.getElementById("retyped_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput1.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput1.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput1.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput1.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput1.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput1.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput1.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
    //double verification
    if(myInput1.value == document.getElementById("password").value) {
    verify.classList.remove("invalid");
    verify.classList.add("valid");
  } else {
    verify.classList.remove("valid");
    verify.classList.add("invalid");
  }
}
</script>
    <div class="CenterPannelCampus"></div>

</body>
</html>