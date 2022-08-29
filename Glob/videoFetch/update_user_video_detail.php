<?php
require_once("../database/database.php");
if(isset($_POST['video_id'])){

    $video_id=$_POST['video_id'];
    $title=$_POST['title'];
    $description =$_POST['description'];
    $entertainment=$_POST['entertainment'];
 
$query = mysqli_query($conn,"UPDATE video set   title='$title',description='$description',entertainment='$entertainment' WHERE video_id='$video_id'");

if($query){

    echo "Updated Successfully";

}else{

    echo "Fail To Update";


}


     
}




?>