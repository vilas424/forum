<!DOCTYPE html>
<?php
require_once 'auth.php';
include 'database.php';
$bbb=$_SESSION['SESS_MEMBER_NAME'];
$add=1;
?>
<html>
    <head>
        <meta http-equiv="refresh" content="25" >
        <link rel="stylesheet" href="style01.css">
        
        
        <title></title>
        <style>
            .leftbox
{
    background-image: url('images/6.jpg');
    height : 90%;
}
        </style>
    </head>
    <body class="background">
        
        
        	
			
			
        
        <form name="f1" action="" method="post">
            <table align="center">
                <tr>                    
                    <td>
                        <h4 class="ba3">Displaying top and recent Posts</h4>
                    </td>                                        
               </tr>
            </table>
            
            <table align="right">
                <tr>
                    <td colspan="15">
                        &nbsp;<a href="3d.htm"><input type="button" value="Log out"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="15">
                        &nbsp;<a href="profile.php"><input type="button" value="my profile" name="profile"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="15">
                        &nbsp;<a href="users.php"><input type="button" value="Show Users" name="users"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            </table>
            <!--<input type="button" value="Log out" name="logout" align="center" onclick="logoutfun()"></input>
            <h4 class="ba3">Displaying top 15 Posts</h4>-->
            
            <table align="center">               
                <tr> 
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <img src="images/pic.png" alt="no preview">
                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <textarea rows="7" cols="100" name="txtarea" placeholder="What's on your mind?"></textarea>
                    </td> 
                    
                    
                </tr>
                <tr>
                    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                    
                    <td>
                        <input type="submit" name="post" value="post" id="txt"/>
                    </td>
                </tr>
            </table>
            <br><br>
            <script>
                function statusup()
                {
                    $state=1;                   
                }
                function logoutfun()
                {
                    window.close();
                    window.open("Logout.php","","");
                }
                
                
                function profileview()
                {
                    window.close();
                    window.open("profile.php", "", "");
                }
            </script>
        </form>
        <?php
        if (isset($_POST['post']))
        {
        include 'database.php';
        $data = $_POST['txtarea'];
        //echo $data.''.$bbb;
        if($data=="")
        {
            echo"<h4 class=ba4>Error while posting Topic..Try again</h4>";
        }
        else
        {
            $sql="insert into userstatus(status,username,udate) values('$data','$bbb',now())";
            $rr=mysql_query($sql);
            $res=mysql_affected_rows();
            if($res)
                echo "";
            else
                echo "error while updating status";
        }
        }
        
        ?>
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
            <?php
            
            $query="select username,status,udate,msgid from userstatus group by udate DESC limit 15";
            //$query12="select comment from comments where msgid=$ms";
            $result = mysql_query($query) or die(mysql_error());
            echo"<form action=\"\" method=POST >";
            echo"<table align=center class=ba4> "; 
            $count=1;
            

            while($row = mysql_fetch_array($result))
            { 
                $name=$row['username'];
                $data=$row['status'];   
                $date=$row['udate'];
                $ms=$row['msgid'];
                
                $query12="select comment,username,time from comments where messageid=$ms";
                $result12 = mysql_query($query12) or die(mysql_error());
                $rr=1;
                
                if($rr)
                {
                    echo" 
                    <tr>
                        <td colspam=5>Post# $count</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td><td>&nbsp;</td>
                        <td>message ID : $ms</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                    </tr>
                    <tr> 
                        <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>                       
                        <td colspan=3>$name</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>  
                        
                    </tr>
                    <tr> 
                        <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>                       
                        <td colspan=3>$date</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td>                        
                    </tr>
                    <tr>
                        <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class=biggi>Topic : $data</td>
                        
                    </tr>";
                    while($row12=  mysql_fetch_array($result12))
                    {
                        $u=$row12['username'];
                        $cn=$row12['comment'];
                        $t=$row12['time'];
                        //if($bbb==$u)
                        //{
                            echo"<tr>
                            <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td>$u commented as :</td>
                            </tr>
                            <tr>
                            <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td>&nbsp;</td><td>&nbsp;</td>
                            <td>&nbsp;</td><td>&nbsp;</td>
                            <td class=med> $cn</td>
                            </tr>
                        
                            <tr>
                            <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td>&nbsp;</td><td>&nbsp;</td>
                            <td>on: $t</td>
                            </tr>
                            
                            ";
                        //}
                    }
                        
                    
                    echo"<tr>
                        <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td colspan=15>
                        </td>
                    </tr>
                    <tr>
                        <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                       
                        
                    </tr>
                    <tr><td colspan=25><hr></td></tr>
                    
                    <tr>
                        <td >&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td></td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                        <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                       
                        
                    </tr>

                        ";
                }
            $count++;
                
            }
            
            
            
            
            
            
            echo"</table>"; 
 //<input class=ba2 type=button value=next name=next>           
            echo "<table align=center>
                <tr>
                 <td>
                    
                </td>
                </tr>
                <tr>
                 <td>
                    <h4 class=ba2>enter msg id and comment to add comment</h4>
                </td>
                </tr>
                <tr>
                <td>
                    <input type=text name=msg length=4 placeholder=message id>
 
                 </td>
                </tr>
                <tr>
                <td>
                    <input type=text name=com length=4 placeholder=add&nbsp;comment>
                </td>
                </tr>
                <tr>
                <td>
                    <input type=submit name=cm value=addcomment>
                </td>
                 </tr>
             </table>";
            
            
            if(isset($_POST['cm']))
            {
                
                $id=$_POST['msg'];
                $comm=$_POST['com'];
                
                $q1="select msgid from userstatus where msgid=$id";
                $res1=mysql_query($q1);
                //if($res1['msgid']==$id)
               // {
                if($add==1)
                {
                    if(($id=="")||($comm==""))
                    {
                        echo"<h4 class=ba2>nothing to comment</h4>";
                    }
                    else
                    {
                        $que="insert into comments values('$id','$bbb','$comm',now());";
                        $resu=mysql_query($que);
                        echo"<h4 class=ba2>Your comment will be added once after the page is refreshed.Thank You</h4>";
                    }
                    $add=2;
                }
              //  }
               // else
               // {
              //      echo"<h4 class=ba2>message ID doesnot exist.. Try again</h4>";
              //  }
                
                
                
                
            }

            
            
            echo"</form>";
            mysql_close();
            ?>
            
            
            
            
        </form>
        
        
        
        
        <br>
        <p align="right" class="ba4">&COPY;sagar madivalar&nbsp;&nbsp;</p>
    </body>
</html>
