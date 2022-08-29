<?php


include('../database/database.php');

session_start();


  
 
if(isset($_POST['description'])){
   $username =$_SESSION['username'];
   $user_id =$_SESSION['user_id'];
   $entertainment =$_POST['entertainment'];
   $title =$_POST['title'];
   $description =$_POST['description'];
   $query_check =mysqli_query($conn,"SELECT * FROM video WHERE title='{$title}' AND description='{$description}' AND user_id='{$user_id}'");

  

   if(mysqli_num_rows($query_check)==0){

  
   
       $name = $_FILES['file']['name'];
       $target_dir = "upload/";
       $target_file = $target_dir . $_FILES["file"]["name"];
 
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       
       $extensions_arr = array("mp4","avi","3gp","mov","mkv","mpeg");

       
       if( in_array($extension,$extensions_arr) ){

         
         $randomno=rand(0,100000);
         $rename= $_SESSION['username'].date('Ymd').$randomno;

         $newname =$rename.'.'.$extension;
 
           
         
             
             if(move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$newname)){
                $video_name ="videoFetch/upload/".$newname;
               


                $query = mysqli_query($conn,"INSERT INTO  video(video_name,username,user_id,entertainment,title,description) 
                VALUES('{$video_name}' ,'{$username}','{$user_id}','{$entertainment}','{$title}','{$description}')");


               echo "Video Uploaded";


             }
         

       }else{
         echo "Invalid file extension.";
       }
      }else{
         echo "You Have submitted A video With The Titile And Description";


      }
   
 
   exit;
}else{

    echo "Your Video is Not Allowed to be Uploaded It Has A Problem with Size Limit";
}
?>
 