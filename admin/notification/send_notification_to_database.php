<?php

require_once("../../Glob/database/database.php");


if(isset($_POST['note_header'])){

$note_header=$_POST['note_header'];
$note_message=$_POST['note_message'];

$query =mysqli_query($conn,"INSERT INTO notification_message(notification_header,notification_message) VAlUES('{$note_header}','{$note_message}')");

if($query){

  $note=mysqli_query($conn,"UPDATE login SET notification_status=(notification_status+1)") ; 

    echo "Notification Successfully Send";
}else{

    echo "Notification Failded";
}





    


}











?>