
<!DOCTYPE html>    

<html lang="en">    

<head>    

    <title>Student Work</title>    

    <style>    
        *{    
            zoom: 100%;
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
            width: 800px;
            height: 100%;
            background-color: #fff;  
            margin: auto;
            z-index: 2;
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
        .studentWorkContainer{
            border: 2px solid #0070c0;
            border-radius:15px;
            width: 600px;
            height:250px;
            margin:auto;
            margin-bottom:15px;
            max-width: 600px;
        }
        table{
            float:right;
            margin-top: 10px;
            margin-right: 10px;
            width: 65%;
            max-width: 65%;
            text-align: left;
            padding: 5px;
            border-style: dotted; ;
        }
        th{
            font-size: 35px;
        }
        .Topic{
            margin:auto;
            font-size: 40px;
            color:#0070c0;
            margin-bottom: 15px;
        }
        .downloadButton{
            cursor: pointer;
            padding:10px;
            background-color: #0070c0;
            max-width: 100px;
            float:right;
            text-align: center;
            color: #ddd;
            margin-right: -65%;
            margin-top:33%;
            border-radius:10px;
            font-weight: bold;
            transition: 0.4s ease-in-out;    
        }
        .downloadButton:hover{
            background-color: #28a745;
        }
        .visitButton{
            cursor: pointer;
            height:38px;
            border:none;
            padding:10px;
            background-color: #0070c0;
            max-width: 100px;
            float:right;
            text-align: center;
            color: #ddd;
            margin-right: -48%;
            margin-top:33%;
            border-radius:10px;
            font-weight: bold;
            transition: 0.4s ease-in-out;    
        }
        .visitButton:hover{
            background-color: #28a745;
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
.float_search{
    cursor: pointer;
    border:none;
	width:50px;
	height:50px;
	background-color:#ffc107;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
    text-decoration: none;
    padding: auto;
    font-size: 40px;
    transition: 0.4s ease-in-out;
}
.float_search:Hover{
	background-color:#0C9;
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
        <div class ="Topic"><Center><b>Search Result of: 

        <?php
            if(isset($_POST["search"]))
            {
                $Search_word = $_POST["search_word"];
                echo $Search_word;
                // Database connection
                $servername = "127.0.0.1";
                $username = "root"; // Change as needed
                $password = ""; // Change as needed
                $dbname = "sms";
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                echo'</b></Center></div>';
                $sql = "SELECT sw_id,logo_name,file_name,title,description FROM studentworks WHERE sw_id  ='" . $Search_word . "' OR title LIKE '%" . $Search_word . "%'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Get the field names and create table headers
                    // Fetch rows and output data
                    while ($row = $result->fetch_assoc()) {
                        $path_logo= "../../uploads/logo/$row[logo_name]";
                        $path_file= "../../uploads/file/$row[file_name]";
                        
                        echo '<form class ="studentWorkContainer" action="detailed_student_work.php" method="post">
                            <img src="' . $path_logo . '" alt="Image"  width="170px" height="230px"style="padding:10px">
                            <table>
                                <tr>
                                    <th>';
                                        echo "$row[title]";
                                    echo'</th>
                                </tr>
                                <tr>
                                    <td>';
                                        echo "$row[description]";
                                    echo'</td>
                                </tr>
                            </table>
                            <a href="' . $path_file . '">
                                <div class="downloadButton">Download</div>
                            </a>';
                            echo '<input type="hidden" name="sw_id" value="' . htmlspecialchars($row["sw_id"]) . '">';
                            echo'<button type="submit" class="visitButton" name="visit" id="visit">Visit</button>';
                            

                        echo'</form>';
                        
                    }
                } else {
                    echo "<div class ='Topic' style='padding: 20px;'>0 results found in the database. The search word need to be a ID or a title of the student work.</div>";
                }

                $conn->close();
            }
        ?>
        

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
 

