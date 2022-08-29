<?php

session_start();
include("Glob/database/database.php");


 $query = mysqli_query($conn,"SELECT * FROM login WHERE user_id='{$_SESSION['user_id']}'  ");
 while( $result = mysqli_fetch_assoc($query) ) {
 
   $user_profile=$result['user_profile'];

   echo substr( $user_profile,16) ;
   
 }

?>