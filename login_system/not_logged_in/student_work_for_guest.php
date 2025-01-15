
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
            font-size: 28px;
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
.pages_container{
    margin-right:50px;
    flex: 1;
    overflow: auto;
    font-size:25px;
    padding:5px;
    text-align:center;
}
#prev,#page_num,#next,#total_page{
    display: block;
    margin:5px;
    transition: ease-in-out 0.4s;
}
#next:hover,#prev:hover{
    color:#0C9;
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

                    <li><a href="#"style="background: #ddd; color: black;">STUDENT WORK</a></li>    

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
        <div class ="Topic"><Center><b>Student Work</b></Center></div>

        <center>
            <form action="search_result.php" method="post">
                <input type="String" name="search_word" id="search_word"placeholder = "Search (By ID or Title)"style="margin:10px; margin-top:0px; padding-left: 10px;border-radius: 50px ; font-size: 30px;width: 510px;height: 50px;">	

                <button type="submit" class="float_search" name = "search">
                    &#x1F50E;&#xFE0E;
                </button>
            </form>
        </center>

        <?php
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
            $sql = "SELECT sw_id,logo_name,file_name,title,description FROM studentworks";
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
                                <th style="color:#0070c0;">';
                                    echo "$row[title]";
                                echo'</th>
                            </tr>
                            <tr>
                                <td style="font-style: italic;">';
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
                echo "0 results";
            }
            echo '
                <div class="pages_container">
                        <div id="prev"style="cursor:pointer;float:left;"><b>&#11207;</b></div>
                        <div id="page_num" value=1 style="float:left;">1</div>
                        <div style="float:left;margin:5px;">/</div>
                        <div id="total_page" style="float:left;">?</div>
                        <div id="next"style="cursor:pointer;float:left;"><b>&#11208;</b></div>
                </div>
            ';
            $conn->close();
        ?>
        

	</div>
    <div class="CenterPannelCampus"></div>
    <script>
    const elements = document.querySelectorAll('.studentWorkContainer');
    function page_seperator(){
        let i = 0;
        elements.forEach(element => {
            element.id = i;
            i++;
            //alert(element.id);
        });
        let page=1;
        prev=document.getElementById("prev");
        next=document.getElementById("next");
        pages=document.getElementById("page_num");
        total_page=document.getElementById("total_page");
        total_page.innerHTML=Math.ceil(i/3);
        pages.innerHTML=page;
        prev.addEventListener('click', () => {
            if(page<=1)
            {
                alert("This is the first page");
            }else{
                page--;
                pages.innerHTML=page;
                show_page(page);
            }
        });
        next.addEventListener('click', () => {
            if(page>=Math.ceil(i/3))
            {
                alert("This is the last page");
            }else{
                page++;
                pages.innerHTML=page;
                show_page(page);
            }
        });
        show_page(page);
        //document.getElementById("1").hidden=true;
    }
    function show_page(page){
        elements.forEach(element => {
            element.hidden=true;
        });
        a=page-1;
        for(i=a*3;i<a*3+3;i++)
        {
            elements[i].hidden=false;
        }         
    }
    page_seperator();
    function PleaseLoginFirst() {
        alert("Please Login First!");
    }
</script>
</body>
</html>
 

