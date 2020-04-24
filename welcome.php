<!--
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
-->
<?php
    if(isset($_POST['upload'])){
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_tem_loc = $_FILES['file']['tmp_name'];
        $file_store = "uploaded/".basename($_FILES['file']['name']);
   
        $con = mysqli_connect("localhost","root","","loginphp","3308") or die("can not connect");
        $Text=$_POST['text'];

        $sql="insert into images (image,text) values('$file_name','$Text')";
        mysqli_query($con,$sql);

        if(move_uploaded_file($file_tem_loc,$file_store))
        {
            echo "<br> Image uoploeded ...";
        }
        else{
            echo "<br> image can't be uploaded.";
        }
        
    }
?>

<html>
    <head>
        <title>Welcome </title>
        <style>
        body{
    margin: 0;
    padding: 0;
    background: url("imgs/wp27.jpg");
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
    background-attachment: fixed;
}
a{
    padding-left: 45%;
}
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-left: 45%;
}

a:hover, a:active {
  background-color: red;
}
h1{
    color: white;
    text-align: center;
    padding-top: 100px;
}
.uploading{
    color: white;
    padding-left: 27%;
    font-size: 30px;
}
P{
    color: white;
    //padding-left: 30%;
    font-size: 20px;
}
        </style>
        <style type="text/css">
   #content{
   	width: 75%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
       
   }
   form{
   	width: 70%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 70%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 0px solid #cbcbcb;
       color: white;
        font-size: 30px;
   }
   #img_div:after{
   	content: "";
       display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 70%;
   	height: 50%;
   }
   </style>
    </head>
    <body>
    <h1> Welcome to Art Mania </h1>
    <div id="content">
        <form action="?" method="post" enctype="multipart/form-data">
    <div class="uploading">
Select image to upload:
<div>
    <input type="file" name="file"> </div>
    <div><textarea rows="5" cols="20" name="text" placeholder="say something about artwork..."></textarea></div>
    <div><input type="submit" value="Upload Image" name="upload"></div>
    </div>
</form>
    <table>
       
    <?php
    $con = mysqli_connect("localhost","root","","loginphp","3308") or die("can not connect");
    
    $sql = " select * from images ";
    $result = mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($result)){?>
        <tr>
        <td>
        <?php
        echo "<div id='img_div'>";
        echo '<img src="uploaded/'.$row['image'].'" style="border: 5px solid black;"/>';
        echo "</div>";
       ?>
        </td>
        <td>
        <?php
        echo "<p>".$row['text'] ."</p>";
        ?>
        </td>
       </tr>
    <?php } ?>
    
</table>
</div>
<a href="index.html" >Log Out</a>
    </body>
</html>
