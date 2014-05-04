<!DOCTYPE html>
<?php
require_once 'auth.php';
include 'database.php';
$bbb=$_SESSION['SESS_MEMBER_NAME'];
$m=1;
?>
<html>
    <head>
        <meta http-equiv="refresh" content="25" >
         <link rel="stylesheet" href="style01.css">
        <title></title>
    </head>
    <body class="background">
        <form action="" method="POST" >
        <table align="right">
                <tr>
                    <td colspan="15">
                        &nbsp;<a href="webtech.php"><input type="button" value="Back"></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                    </td>
                </tr>
                
            </table>
        
        <?php
        $query="select firstname,lastname,phone,username from users where username = '$bbb';";
        $query1="select status,udate,msgid from userstatus where username = '$bbb' group by udate DESC";
        $result = mysql_query($query) or die(mysql_error());
        
        
        while($row = mysql_fetch_array($result))
        {
            $n1=$row['firstname'];
            $n2=$row['lastname'];
            $n3=$row['phone'];
            $n4=$row['username'];
            echo"<h4 class=ba4>Hello $n1 $n2</h4>";
            echo"<h4 class=ba4>profile information";
            echo"<table align=center class=ba2";
            echo"<tr>
            <td>
                <img src=images/pic.png alt=no preview>
            </td>
            
            </tr>          
            <tr>
                <td class=ba4>
                    Name : $n1 $n2
                </td>
                </tr>
            <tr>
                <td class=ba4>
                    Phone number : $n3
                </td>
                </tr>
            <tr>
                <td class=ba4>
                    Username : $n4
                </td>
                </tr>
            ";
        }
        echo"</table>";
        
        echo"<hr width=90%>";
        echo"<h4 class=ba2>Your recent updates</h4>";
        echo"<table align=center class=ba2>";
        $result1 = mysql_query($query1) or die(mysql_error());
        $count=1;
        
        
        
        
        while($row1 = mysql_fetch_array($result1))
        {
            $s=$row1['status'];
            $u=$row1['udate'];
            $g=$row1['msgid'];
            
            $query2="select comment,username,time from comments where messageid=$g";
            $result2 = mysql_query($query2) or die(mysql_error());
            
            
            
            echo"<tr>
            <td>&nbsp;</td><td>&nbsp;</td>
                <td>
                message id :$g
                </td>
            </tr>
            <tr>
            </td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td>
                <td class=biggi>
                 $s
                </td>
            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                </tr>";
            while($row2= mysql_fetch_array($result2))
            {
                //if($row2['messageid']==$g)
                //{
                    $c=$row2['comment'];
                    $u=$row2['username'];
                    $t=$row2['time'];
                    echo"<tr>
                    </td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td>
                        <td class=med>
                        $u commented as
                        </td>
                    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                    </tr>
                    <tr>
                    </td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td>
                        <td class=med>
                        $c on
                        </td>
                    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                    </tr>
                    <tr>
                    </td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td>
                        <td class=med>
                        $t
                        </td>
                    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                    </tr>
                    <tr>
                    </td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td>
                        <td class=med>
                        <hr>
                        </td>
                    <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                    </tr>";
                //}
                
            }
            echo"<tr>
            </td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td></td><td>&nbsp;</td><td>&nbsp;</td>
                <td colspan=25>
                $u
                </td>
                
                </tr>
            <tr>            
                <td colspan=20>
                <hr width=100% size=20% noshade>                
                </tr>";
            $count++;
        }
        echo"</table>";
        
        
        
        
        
        
        ?>
            <?php
            
echo "<table align=left>
    <tr><td><input type=submit name=del value=delete>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
    <tr><td><input type=submit name=ed value=edit>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
    </table>";
            
            
            if(isset($_POST['del']))
            {
                echo"<table align=center>
                <tr>
                <td>
                 <h4 class=ba2>enter msg id to delete<input type=text name=txt length=4></h4>
                </td>
                </tr>
                <tr>
                <td>
                <input type=submit name=del1 value=delete>
                </td>
                </tr>    
                </table>";
                //$d=$_POST['txt'];
                //$q="delete from userstatus where msgid=$d";
                //$r= mysql_query($q);
                
            }
            if(isset($_POST['del1']))
            {
                $d=$_POST['txt'];
                $q="delete from userstatus where msgid=$d";
                $q1="delete from comments where msgid=$d";
                $r= mysql_query($q);
                $r1= mysql_query($q1);
            }
            
            if(isset($_POST['ed']))
            {
                //$d=$_POST['txt'];
                //echo"<input type=text name=txt1 length=4>";
               // echo"<input type=submit name=ud value=update>";
                
                
                echo "<table align=center>
                <tr>
                 <td>
                    <h4 class=ba2>enter msg id and new message</h4>
                </td>
                </tr>
                <tr>
                <td>
                    <input type=text name=txt length=4 placeholder=message id>
                 </td>
                </tr>
                <tr>
                <td>
                    <input type=text name=txt1 length=4 placeholder=new meassage>
                </td>
                </tr>
                <tr>
                <td>
                    <input type=submit name=ud value=update>
                </td>
                 </tr>
             </table>";
                
            }
            if(isset($_POST['ud']))
            {
                $d=$_POST['txt'];
                $d1=$_POST['txt1'];
                $q="update userstatus set status='$d1' where msgid=$d";
                $r= mysql_query($q);
            }
            
            ;

           
//        while($m <= $g)
//        {
//            if(isset($_POST[$m]))
//            {
//                $q="delete from userstatus where msgid=$m";
//                $r= mysql_query($q);
//                echo"$m";
//            }
//            $m++;
//            
//        }
//            <td colspan=20><input type=submit name=$g value=delete></td>
            ?>
            
        <br><br>
       
        </form>
    </body>
</html>
