<?php
session_start();

$servername = "127.0.0.1"; // Change if your server is different
$db_username = "root"; // Your database username
$db_password = ""; // Your database password
$dbname = "sms";
$pdo = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);
/*$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../login.php");
    exit;
}


// Fetch messages
$stmt = $pdo->prepare("SELECT distinct * FROM messages WHERE recipient_id = ? OR sender_id = ?  order by id asc");
//$stmt->execute([$_SESSION['user_id'], $_SESSION['user_id']]);
$stmt->execute([$_SESSION['user_id'], $_SESSION['user_id']]);
$messages = $stmt->fetchAll();



try {
    // Create a new PDO instance
    $pdo1 = new PDO("mysql:servername=$servername;dbname=$dbname", $db_username, $db_password);
    $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$id = $_SESSION['user_id'];
    // Query to fetch data from the items table
    //$stmt_1 = $pdo1->query("SELECT distinct username FROM users");
    //$itemsAdd = $stmt_1->fetchAll(PDO::FETCH_ASSOC);
	
	$stmt_1 = $pdo1->query("SELECT distinct id,username,role FROM users where id != $id  order by id asc");
	//$stmt_1->execute($_SESSION['user_id']);
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
    <title>Real-Time Chatbot</title>
    <style>
        *{    
            margin: 0;    
            padding: 0;    
            font-family:Calibri;
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


        .CenteredPannel{
            padding-top:70px;
            width: 850px;
            height: 800px;
            background-color: #fff;  
            margin: auto;
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
#LoginPage:hover{    
background: #74b72e;    
color: #fff;    
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

        .chat { border: 1px solid #ccc; padding: 10px; height: 300px; overflow-y: scroll; }
        .message { margin: 5px; }
		.h3 {visibility: hidden;}
        .contact_person_container{
            width:30%;
            float:left;
            margin-left:20px;
            margin-right:20px;
            
        }
        .contact_person{
            width:100%;
            height:110px;
            border-radius:50px;
            margin:5px;
            cursor:pointer;
            transition: 0.4s ease-in-out;    
        }
        .contact_person:Hover{
            background:#0070c0;
            color:white;
        }
        .chat-container{
            width:60%;
            float:left;
            border-left: 3px solid black;
            height:100%;
            padding-left:5px;
        }
        .chatting_to{
            width:100%;
            padding:8px;
            background: #74b72e;
            color: #fff;    
            height:70px;
            border-radius:30px;
        }
        .message_sent{
            text-align:right;
            margin:5px;
            border-radius:10px;
            padding:3px;
            border:solid, 1px, black;
            background:#90ee90;
        }
        .message_receive{
            text-align:left;
            margin:5px;
            border-radius:10px;
            padding:3px;
            border:solid, 1px, black;
            background:#FFF;
        }
        .details{
            float:left;
            text-align:left;
        }
        .send_button{
            cursor:pointer;padding:3px;border-radius:100%;height:28px;width:28px;
            transition: 0.4s ease-in-out;    
        }
        .send_button:Hover{
            background:#90ee90;
            color:#fff;
            border:#fff;
        }
        .chat-header {
            line-height: 70px; /* Keeps line height consistent */
        }

        .chat-header h1 {
            display: inline-block; /* Allows h1 tags to be on the same line */
            margin: 0; /* Remove default margin */
        }
        #chat {
    display: flex;
    flex-direction: column; /*stacks children in a column*/
}
.CenterPannelCampus{
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

		<li><a href="../message/index.php"style="background: #ddd; color: black;">MESSAGING</a></li>    

		<li><a href="../edit_profile/profile_page.php">PROFILE</a></li>    

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
    <div class="contact_person_container">
        <h1 style="text-align:center;">Contact Person</h1>
        <?php foreach ($items as $item): ?>
			<button class="contact_person" onclick="selectContactPerson(event)" value="<?php echo $item['id']; ?>">
					<?php 
                    $servername = "127.0.0.1";
                    $username = "root"; // Change as needed
                    $password = ""; // Change as needed
                    $dbname = "sms";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $userID = $_SESSION["user_id"];
                    $sql = "SELECT * FROM ".$item["role"]." where user_id='" . $item["id"]."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // Get the field names and create table headers
                        // Fetch rows and output data
                        while ($row = $result->fetch_assoc()) {
                            $logopath="../../../images/".$item["role"]."/".$row["logo_path"];
                            $name=$row["lastName"]." ".$row["firstName"];
                        }
                    }
                    $conn->close();
                    if(Strlen($item['username'])>10)
                    {
                        $item['username']=Substr($item['username'],0,10). "..";
                    }
                    echo '<img src="'.$logopath.'" style="max-width:75px;max-height:90px;border-radius:50px;float:left;padding:10px;">
                    <b><div class="contact_person_name" style="margin-top:10px;float:left;font-size:20px;width:50%;float:left;max-height:34.5px;maxlength="14" ">'
                        .$item['username'].'</div><div class="details">'.$item['role'].'';
                        echo '<br>Name: '.$name.'<br>User ID: '.$item["id"].'</div></b>';
            
            ?>

        </button>
        <?php endforeach; ?>
    </div>
<div class="chat-container">
    <div class="chatting_to"style="background-color: #0070c0;">
        <div class="chat-header">
            <h1>Now chatting with:</h1>
            <h1 id="on_contact_person"></h1>
        </div>
    </div>
    <div id="session_user_id" class="h3"><?php  echo $_SESSION['user_id'];  ?></div>
  <!--  <div id="messages">
        <?php foreach ($messages as $message): ?>
            <div class="message <?php echo $message['sender_id'] == $_SESSION['user_id'] ? 'sent' : 'received'; ?>">
                <strong><?php echo $message['sender_id']; ?>:</strong> <?php echo htmlspecialchars($message['message']); ?>
                <em><?php echo $message['created_at']; ?></em>
            </div>
        <?php endforeach; ?>
    </div> -->
	
    <input type="hidden" id="suId_user_id" name="suId_user_id" value="<?php  echo $_SESSION['user_id'];  ?>">
   


    <div id="chat"></div>
	<div  id="result" class="h3"></div>  <!--<input type="text" id="p1" name="p1" value=""> hidden ;style="display:none"-->
  
	<div  id="p2"></div> 
	
	<!--<input type="hidden" id="rs_id" name="rs_id" value="">
	-->
    <div style="bottom:10px; float:left;position:fixed;">
        <input type="text" id="message" placeholder="Type a message..." required style="width:500px;border-radius:30px;padding:5px;cursor: auto;">
        <button id="send" class="send_button"><b>	&#11208;</b></button>  <!--onclick="getSelectedValue()"-->
    </div>
        </div>
	
</div>
<div class="CenterPannelCampus"></div>
    <script>
        function ChangeColor()
        {
            const elements = document.querySelectorAll('.contact_person');
            // Add an event listener to each element
            elements.forEach(element => {
                element.addEventListener('click', () => {
                    elements.forEach(a=>{
                        a.style.color="black";
                        a.style.background="white";
                    })
                    element.style.color="white";
                    element.style.background="#0070c0";
                });
            });
        }
        ChangeColor();
	function getSelectedValue()
	{
		var cookieValue = document.getElementById("result").getAttribute('value');
		//document.getElementById("p1") = cookieValue.innerText;
		//$_SESSION['recipientId'] =cookieValue;
		//alert('p1:'+document.getElementById("p1").getAttribute('value') );
		//alert ('result:'+ cookieValue);
	}
	

	
			function selectItem() {
            // Get the dropdown and textbox elements
				var dropdown = document.getElementById("itemSelect");
			  //  var textbox = document.getElementById("myTextbox1");
			
  			   //it work
			  	//var textbox = document.getElementById("rs_id");
				document.getElementById("result").innerText  = dropdown.value;
				//textbox.value = dropdown.value;
				var element1 = document.createElement("input");
				element1.type = "hidden";
				element1.value = dropdown.value;
				//document.getElementById("result").appendChild(element1);
				 //  document.getElementById("result").innerText =element1.value;
				//alert('element1.value'+element1.value);	
			     var a = document.getElementById("result").appendChild(element1);
				//document.getElementById("p2").innerText  = a; 
			
				//alert(element1.value);
			}

			var su_id = document.getElementById('session_user_id');	
			var su_idValue = su_id.textContent; 

		
			const senderId = su_idValue; // Replace with dynamic user ID
			//alert('senderId'+senderId);
			var recipientId ="";
            function selectContactPerson(event) {
    const button = event.currentTarget;
    const contactPersonId = button.value;
    document.getElementById("on_contact_person").innerHTML=contactPersonId;
    let recipientId=document.getElementById("on_contact_person").innerHTML;
    //alert(recipientId);
}
		   
		document.getElementById('send').onclick = function() {
            messageInput = document.getElementById('message');
            checkmessage = messageInput.value.trim(); // Trim whitespace
            let recipientId=document.getElementById("on_contact_person").innerHTML;

            if (checkmessage === '') {
                alert("Message cannot be empty!");
            }else if(recipientId === ''){
                alert("Please select recipient!");
            }
            else{
                getSelectedValue();
                var a = document.getElementById("result");
            //-----------------------------------------------------------
                var div = document.getElementById('session_username');
                var value = div.textContent; // or div.innerHTML for HTML content
                var message = document.getElementById('message').value;
                value = message;
                fetch('send_message.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `sender_id=${senderId}&recipient_id=${recipientId}&message=${encodeURIComponent(value)}`
            
                }).then(() => {
                    document.getElementById('message').value = '';
                    loadMessages();
                });
            }
        };
        
		//get message
        function loadMessages() {
            let recipientId=document.getElementById("on_contact_person").innerHTML;
		    fetch(`get_messages.php?sender_id=${senderId}&recipient_id=${recipientId}`)
                .then(response => response.json())
                .then(messages => {
                    const chat = document.getElementById('chat');
                    chat.innerHTML = '';
                    messages.forEach(msg => {
                        const div = document.createElement('div');
                        if(msg.sender_id==senderId){
                            div.className = 'message_sent';
                            div.textContent = `${msg.message} (${msg.created_at})`;
                        }else{
                            div.className = 'message_receive';
                            div.textContent = `${msg.message} (${msg.created_at})`;
                        }
                        chat.appendChild(div);
                        
                    });
                });
				//alert(recipientId);
        }

		function func() {
			let time = new Date().toLocaleTimeString();
			var run_1 = loadMessages();
	    }
	  
		// Refresh messages every 2 seconds
		//var func = loadMessages();
		var run_2 = setInterval(func,2000);

       //
	   // setInterval("loadMessages",2000);
	   /*
		setInterval(() => {
			let time = new Date().toLocaleTimeString();
			document.querySelector(‘h1’).innerHTML = time;
			loadMessages();
			}, 2000);
			*/
		
    </script>
</body>
</html>