<?php 
require_once("../database/database.php");
require_once("get_total_likes_last.php");
require_once("get_total_views.php");

require_once("get_total_subscribers_last.php");

$video_id = $_POST['video_id'];
$query = mysqli_query($conn,"SELECT * FROM video WHERE video_id='$video_id' ORDER BY video_id DESC");
 

if(mysqli_num_rows($query)>0){

    
    $output='';
    while($result =mysqli_fetch_assoc($query)){

        $output.='
        
        <div class="card text-white bg-dark border border-info m-2"    >
             
              <div class="card-body" >';
              

     $output .='   <video src="'.$result['video_name'].' " id="myVideo_'.$result['video_id'].'"   width="100%" height="250px"></video>  ';
 
         $output .='
         <div class="container bg-success   d-flex justify-content-center">
         <button data-video_id="'.$result['video_id'].'" class="pause mr-2 m-1"  type="button"><i class="fa fa-stop-circle-o" style="color:red"></i></button>

         <button data-video_id="'.$result['video_id'].'" data-view_to_id="'.$result['user_id'].'" class="play mr-2 m-1 "  type="button"><i class="fa fa-play" style=" color:red"></i></button>
         <button data-video_id="'.$result['video_id'].'" class="pause m-1"  type="button"><i class="fa fa-pause" style="color:red"></i></button>

                    
            </div>
            
         <div class="row m-2 ">
      
 
         
         <div class="col-7 ">
         <span   >Owner: <span class="text-success"  style="font-size:12px;" >'.$result['username'].'</span></span>
         </br>
         <span  " >Entertainment: <span class="text-success"  style="font-size:12px;" >'.$result['entertainment'].'</span></span>
        
          </br>
          <span  >Title: <span class="text-success"  style="font-size:12px;"> '.$result['title'].'</span></span>
         
         </br>
          <span   >Description:
           <span class="text-success" style="font-size:12px;" >'.$result['description'].'</span></span>
         </div>
         <div class="col-5">
         <span  >Likes </span><button  data-video_id="'.$result['video_id'].'" data-like_to_id="'.$result['user_id'].'" type="submit"   class="fa fa-thumbs-up like_video"></button>  <span class="text-warning" id="likes_count_'.$result['video_id'].'" style="font-size:12px;" >'.get_total_likes_of_video($result['video_id'],$conn).'</span>
         </br>
         <span  >Views: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="text-danger" id="views_count_'.$result['video_id'].'" style="font-size:12px;"  >'.get_total_views_of_video($result['video_id'],$conn).'</span></span>
         <br>
         <span   >Followers: <span class="text-primary" id="subscribers_count_'.$result['video_id'].'" style="font-size:12px;"  >'.get_total_subscribers_of_channel($result['user_id'],$conn).'</span>
         <button style="font-size:12px;" class="btn btn-success"><a  class="text-light" >Comments</a></button> 
      

         
         </div>
          
         </div>
         
         </div>
         <div class="card-header lead border border-info d-flex justify-content-center">  
         
         <button style="font-size:12px;" data-subscribe_to_id="'.$result['user_id'].'" data-video_id="'.$result['video_id'].'" class="btn btn-outline-success  text-primary  subscribe_channel  mr-3 ">Subscribers</button> 
         <button style="font-size:12px;" data-unsubscribe_to_id="'.$result['user_id'].'" data-video_id="'.$result['video_id'].'" class="btn btn-outline-success  text-warning unsubscribe_channel ml-3">Unsubscribe</button> 

          
        
         </div>
       </div>
       
   
     
   
   ';

   



    }
    

    echo $output;

}
?>
 
       
       


