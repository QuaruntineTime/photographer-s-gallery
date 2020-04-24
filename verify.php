  <?php

/*    if(isset($_REQUEST['sub']))
     {
      $sub = $_REQUEST['sub'];

        if($sub == "sign up")
        {
            $f_name = $_REQUEST['fname'];
            $l_name= $_REQUEST['lname'];
            $email = $_REQUEST['email'];
            $pass = $_REQUEST['pass'];
            $con_pass = $_REQUEST['cpass']; 

            if($pass == $con_pass)
            {
            // $link = mysql_connect("localhost","root","");
			mysql_select_db("loginphp");
			//$sql= "insert into loginphp values('$f_name','$l_name','$email','$pass')";
			
            //$result=mysql_query($sql);
			//$row = mysql_fetch_assoc($result);
            //mysql_close($link);
 		
			
			 $c = mysql_connect("example.com", "username", "password");
			mysql_select_db("database");
			$result = mysql_query("SELECT 'Hello, dear MySQL user!' AS _message FROM DUAL");
			$row = mysql_fetch_assoc($result);
 
			$link = new mysqli("localhost","root","","loginphp");
			$link->query("insert into loginphp values('$f_name','$l_name','$email','$pass')");
			$link->close();
            echo "<br> Record Inserted Successfully....";
            }
            else{
                echo "PASSWORD NOT MATCH";
            }
        }
	 }      
    //     else if($sub == "Log In")
    //         {
            
    //             $us = $_REQUEST['username'];
    //             $pa = $_REQUEST['password'];

    //         $link = new mysqli("localhost","root","","loginphp");

    //             $res = $link->query("select * from loginphp where username='$us' and password='$pa'");
            
    //             if(mysqli_num_rows($res) > 0)
    //             { 
    //                 echo "<br> WelCome ".$us;
    //             }
    //             else{
    //                 header("location:fail.php");
    //             }
    //             $link->close();
    //         } 
    // }
  //  ?> */


    if(isset($_POST['sub']))
     {
    $sub = $_POST['sub'];

        if($sub == "sign up")
        {
            $f_name = $_POST['fname'];
            $l_name= $_POST['lname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $con_pass = $_POST['cpass']; 
            

            if($pass == $con_pass)
            {
			
      //      $link = new mysqli("localhost","root","","") or die("can not connect");
	//		mysqli_select_db("loginphp") or die("can not connect to database ");
  //          $link->query("insert into loginphp values('$f_name','$l_name','$email','$pass')");
//            $link->close();

$con =  mysqli_connect("localhost","root","","loginphp","3308") or die("can not connect");
//mysqli_select_db($con,"loginphp");
echo "<br> checking ...";
$sql="INSERT INTO `login` (`fname`, `lname`, `email`, `password`, `cpassword`) VALUES ('$f_name', '$l_name ', '$email', '$pass', '$con_pass')";
			// $con =  mysqli_connect("localhost","root","") or die("can not connect");
            // mysqli_select_db($con,"loginphp");
            // echo "<br> checking ...";
            // $sql="INSERT INTO `login` (`fname`, `lname`, `email`, `password`, `cpassword`) VALUES ('shruti', 'kapatel', 'kapatelshruti@gmail.com', '456', '456')";
			//$sql="insert into loginphp values('$f_name','$l_name','$email','$pass'.'$con_pass')";
			$result=mysqli_query($con,$sql);
			mysqli_close($con);
            //echo "<br> Record Inserted Successfully....";
                header("location: index.html");
        }
            else{
                echo "PASSWORD NOT MATCH";
            }
        }
            
        else if($sub == "sign in")
            {
            
                $em = $_POST['email'];
                $pa = $_POST['password'];
                
            //$link = new mysqli("localhost","root","","loginphp");
            $con =  mysqli_connect("localhost","root","","loginphp","3308") or die("can not connect");
  
                $sql ="select * from login where email='$em' and password='$pa'";
                $result=mysqli_query($con,$sql);
                
                if(mysqli_num_rows($result) > 0)
                { 
                    //echo "<br> Welcome ..";
                    header("location:welcome.php");
                }
                else{
                    header("location:errorpage.html");
                }
                mysqli_close($con);
            } 
    }
    else  
    {
    }  
?>
