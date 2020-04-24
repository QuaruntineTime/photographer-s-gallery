<?php
if(isset($_REQUEST['sub']))
{
 $sub = $_REQUEST['sub'];

 if($sub == "signin")
            {
            
                $em = $_REQUEST['email'];
                $pa = $_REQUEST['password'];

            $link = new mysqli("localhost","root","","loginphp");

                $res = $link->query("select * from loginphp where email='$em' and password='$pa'");
            
                if(mysqli_num_rows($res) > 0)
                { 
                    echo "<br> WelCome ".$us;
                }
                else{
                    header("location:fail.php");
                }
                $link->close();
            } 
        }
?>