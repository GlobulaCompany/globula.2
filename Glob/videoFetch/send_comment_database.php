<?php
include("../database/database.php");

if(isset($_POST['comment_message'])){
$comment_message= $_POST['comment_message'];
 $video_id = $_POST['video_id'];

 $commet_from_username = $_POST['comment_from_username'];
 $comment_to_username = $_POST['comment_to_username'];

$query = mysqli_query($conn,"INSERT INTO video_comments(comment_from_username,comment_to_username,video_id,comment_message) VALUES('{$commet_from_username}','{$comment_to_username}','{$video_id}','$comment_message')");


if($query){
    echo "You Have Commented Successfully";

}else{
    echo "Remove Emojis";
}
}else{
    echo "Error";
}











?>