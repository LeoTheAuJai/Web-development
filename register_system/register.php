<?php
session_start();
        $servername = "127.0.0.1"; // Change if your server is different
		$db_username = "root"; // Your database username
		$db_password = ""; // Your database password
		$dbname = "sms";

$pdo = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, role, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $role, $password]);
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: signup.php");
        

    } else {
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <style>
        body { font-family: Arial, sans-serif;}
        form { 
            max-width: 400px; 
            margin: auto;
            padding-top:-10px;
         }
        input { width: 100%; margin: 10px 0; padding: 10px; }
        select { padding: 10px; width: 424px;margin: 12px 0; }
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
        .frame { 
            max-width: 400px; 
            margin: auto;
            padding-top:70px;
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
            Register Page
        </div>
    </div>
    <form id = "f"method="POST" style="padding-top:70px;" action="register_action.php" onsubmit="return double_verification()">
        Username: <input type="text" name="username" required>

        Role: <select name="role" id="mySelect">
            <option value="">--Select an Option--</option>
            <option value="Teacher">Teacher</option>
            <option value="Student">Student</option>
        </select>
        Password: <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        Retype Password: <input type="password" name="password" id="retyped_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <div id="error" name="error" style="color:red;"></div>
        <input class="submit" type="submit" value="Next" onclick="double_verification()">
    </form>
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
</body>
</html>