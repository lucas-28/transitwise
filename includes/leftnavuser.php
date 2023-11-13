<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Left Nav Bar User</title>
    <!--<link rel="stylesheet" href="style.css">  ignore for now-->
    <style>
        /* Add your CSS styles here */
        .navbaruser {
            background-color: #003366;
            
            padding-bottom: 6%;
            flex-direction: column;
            color: #fff;
            width: 25%;
            max-width:200px;
           
            
            overflow: auto;
            overflow-x: hidden;
            left:0%;
            z-index:-1 ;
            transition:0.5s;
        }
        .navbaruser a{
            
            display: block;
            float: left;
            color: white;
            text-align: left;
            padding: 14px 16px;
            text-decoration: none;
            transition: 0.5s;
        }

        .navbaruser a:hover{
            background-color: #ddd;
            color: black;
            cursor: pointer;
        }
        /* Position and style the close button (top left corner) */
        .navbaruser .closebtn {
            
            font-size:2em;
            padding-right: 50px;
            max-width:200px;
            
        }
  
        @media screen and (max-width: 600px) {
            .navbaruser {display:flex;}
        }
    </style>
</head>
      
<body>
    <div class="commerce">
        <!-- To open the side nav bar-->
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">☰</span>
        <div id="mynavbaruser" class="navbaruser"> 
            <!--The link below is to close the side bar.-->
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <!--The links below are placeholder should be replace with the location of those file.-->
            <a href="userhomepage.html">>User home</a>
        
            <a href="usereditprofile.html">>Edit profile</a>
        
            <a href="userchangepassword.html">>Edit password</a>
        
            <a href="userbilling.html">>Edit payment info</a>
        
            <a href="userviewtickets.html">>View tickets</a>    
        </div>
    </div>

    <script>
        /* Set the width of the side navigation to 20% */
        function openNav() {
        document.getElementById("mynavbaruser").style.width = "20%";
        document.getElementById("mynavbaruser").style.height = "20%";
        document.getElementById("content").style.marginLeft = "20%";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
        document.getElementById("mynavbaruser").style.width = "0";
        document.getElementById("mynavbaruser").style.height = "0";
        document.getElementById("content").style.marginLeft = "0";
        }
    </script>
</body>
</html>
