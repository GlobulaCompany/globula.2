<?php


include("../../database/database.php");
$message_to_user_id=$_POST['message_to_user_id'];
$message_to_user_name=$_POST['message_to_user_name'];
 
$message_from_user_id =$_POST['message_from_user_id'];
$message_from_user_name=$_POST['message_from_user_name'];
 
$chat_message= $_POST['chat_message'];
date_default_timezone_set('Africa/Nairobi');
$query =mysqli_query($conn,"INSERT INTO chat_message (message_to_user_name,message_to_user_id, message_from_user_name,message_from_user_id, chat_message,status) VALUES('{$message_to_user_name}','{$message_to_user_id}','{$message_from_user_name}','{$message_from_user_id}', '$chat_message','1')")











?>