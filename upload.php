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
            echo "<br> Tmage can'y be uploaded.";
        }
        
    }
?>
<?php
    $con = mysqli_connect("localhost","root","","loginphp","3308") or die("can not connect");
    
    $sql = " select * from images ";
    $result = mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($result)){
        echo "<div class='img-div'>";
        echo '<img src="uploaded/'.$row['image'].'"/>';
        echo "<p>".$row['text'] ."</p>";
        echo "</div>";

    }
?>