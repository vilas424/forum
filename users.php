<?php
session_start();
$success=0;
include 'database.php';
?>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>Webtech|Home</title>
	<link rel="stylesheet" href="style01.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
	
</head>
<body>
    <form action="" method="POST">
        <img alt="no preview available" src="images/nihon-001.jpg" id="full-screen-background-image" />
        <?php
        
    
    
    $query="Select firstname, lastname, username from users ";
    $res=  mysql_query($query);
    echo"<br><br><h2 class=ba2>Displaying all users</h2><br><br><hr width=85%>";
    echo "<table class=ba2 align=right><tr><td><a href=webtech.php><input type=button value=back></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr></table>";
    echo"<table class=ba4 align=center>
        <tr>
        <th>Name</th><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><th>username</th>
        </tr>";
    while($row=  mysql_fetch_array($res))
    {
        $fn=$row['firstname'];
        $ln=$row['lastname'];
        $un=$row['username'];
        echo"<tr>
            <td>
            $fn. $ln
            </td>
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
        
            <td>
            $un
            </td>
        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
            <td>
            
            </td>
            </tr>
        ";
    }
        echo"</table>";    
        //<button name=but><a>view info</a></button>
//            if(isset($_POST['but']))
//            {
//                $u=$_POST['nm1'];
//                $query="Select firstname, lastname, username,phone from users where username= '$u';";
//                $res=  mysql_query($query);
//                $row = mysql_fetch_array($res);
//                echo"<h4>Name : $row[firstname] $row[lastname]</h4>";
//                echo"<h4>username : $row[username]</h4>";
//                echo"<h4>phone number : $row[phone]</h4>";
//                
//            
//        }
    ?>
    </form>
</body>
</html>