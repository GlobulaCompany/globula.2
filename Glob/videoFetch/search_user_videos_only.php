<?php
 
 
 include("../database/database.php");
 require_once("../database/database.php");
require_once("get_total_likes_last.php");
require_once("get_total_views.php");

require_once("get_total_subscribers_last.php");
 
  
     
    $search= $_REQUEST["searchvalue"];
    $user_id=$_REQUEST["user_id"];
    $output ="";
 

    
    if(empty($search)){
         
$query = mysqli_query($conn,"SELECT * FROM video WHERE  user_id='{$user_id}'ORDER BY video_id DESC");
 
if(mysqli_num_rows($query)===0){
    $output.='<table class="table" id="myTable">
  
    <tbody><tr> <td width="100%" style="text-align:center; color:white;">No Video Available </td></tr>
    </tbody>
</table>

'; 

   
}else{

 

    $output='<div  class="row">';
    while($result =mysqli_fetch_assoc($query)){

        $output.='
        <div  class="col-md-4" >
        <div class="card text-white bg-dark border border-info mt-2 mb-2 "    >
             
              <div class="card-body" >';
              

     $output .='   <video src="'.$result['video_name'].' " id="myVideo_'.$result['video_id'].'"   width="100%" height="250px"></video>  ';
 
         $output .='
         <div class="container bg-success   d-flex justify-content-center">
         <button data-video_id="'.$result['video_id'].'" class="pause mr-2 m-1"  type="button"><i class="fa fa-stop-circle-o" style="color:red"></i></button>

         <button data-video_id="'.$result['video_id'].'" data-view_to_id="'.$result['user_id'].'" class="play mr-2 m-1 "  type="button"><i class="fa fa-play" style=" color:red"></i></button>
         <button data-video_id="'.$result['video_id'].'" class="pause m-1"  type="button"><i class="fa fa-pause" style="color:red"></i></button>

                    
            </div>
            
         <div class="row mt-2 ">
      
 
         
         <div class="col-7 ">
         <span   >Owner: <span class="text-success" style="font-size:12px;">'.$result['username'].'</span></span>
         </br>
         <span  " >Entertainment: <span class="text-success" style="font-size:12px;"> </br>'.$result['entertainment'].'</span></span>
         </br>';
          
         $title=  (strlen($result['title']) > 10) ? substr($result['title'],0,10).'...' : $result['title'];
$output .=' <span  >Title: <span class="text-success" style="font-size:12px;" >'.$title.'</span></span>
        
        </br>
        <span  ">Description:';

        $description=  (strlen($result['description']) > 10) ? substr($result['description'],0,9).'...' : $result['description'];

$output.=' <span class="text-success" style="font-size:12px;" >'.$description.'</span></span>
       </div>
         <div class="col-5">
         <span  >Likes </span><button  data-video_id="'.$result['video_id'].'" data-like_to_id="'.$result['user_id'].'" type="submit"   class="fa fa-thumbs-up like_video"></button>  <span class="text-warning" id="likes_count_'.$result['video_id'].'" style="font-size:12px;">'.get_total_likes_of_video($result['video_id'],$conn).'</span>
         </br>
         <span  >Views: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="text-danger" id="views_count_'.$result['video_id'].'" style="font-size:12px;">'.get_total_views_of_video($result['video_id'],$conn).'</span></span>
         <br>
         <span   >Followers: <span class="text-primary" id="subscribers_count_'.$result['video_id'].'" style="font-size:12px;" >'.get_total_subscribers_of_channel($result['user_id'],$conn).'</span>
          <button style="font-size:12px;" class="btn btn-success"><a href="video_comments.php?video_id='.$result['video_id'].'&video_owener='.$result['username'].'" class="text-light" >Comments</a></button> 

         
         </div>
          
         </div>
         
         </div>
         <div class="card-header lead border border-info d-flex justify-content-center">  
         
         <button  style="font-size:12px;" data-subscribe_to_id="'.$result['user_id'].'" data-video_id="'.$result['video_id'].'" class="btn btn-outline-success  text-primary  subscribe_channel  mr-3 ">Subscribers</button> 
         <button style="font-size:12px;" data-unsubscribe_to_id="'.$result['user_id'].'" data-video_id="'.$result['video_id'].'" class="btn btn-outline-success  text-warning unsubscribe_channel ml-3">Unsubscribe</button> 

          
        
         </div>
       </div>
       </div>
   
     
   
   ';

   



    }
    $output.='</div>';

    echo $output;

}





    }else{
   

     $output='<div  class="row">';



     $resultuser=mysqli_query($conn,"SELECT * FROM `video` WHERE (title LIKE '%$search%' OR description LIKE '%$search%' OR entertainment LIKE '%$search%' OR username LIKE '%$search%') AND user_id='{$user_id}' ");


     if(mysqli_num_rows($resultuser)===0){
        $output.='<table class="table" id="myTable">
	  
        <tbody><tr> <td width="100%" style="text-align:center; color:white;">No Video Available </td></tr>
        </tbody>
</table>

 '; 
 
       
    }else{

        while($result = mysqli_fetch_assoc($resultuser)){
    
            $output.='

            <div  class="col-md-4" >
            <div class="card text-white bg-dark border border-info mt-2 mb-2 "    >
                 
                  <div class="card-body" >';
                  
    
         $output .='   <video src="'.$result['video_name'].' " id="myVideo_'.$result['video_id'].'"   width="100%" height="250px"></video>  ';
     
             $output .='
             <div class="container bg-success   d-flex justify-content-center">
             <button data-video_id="'.$result['video_id'].'" class="pause mr-2 m-1"  type="button"><i class="fa fa-stop-circle-o" style="color:red"></i></button>
    
             <button data-video_id="'.$result['video_id'].'" data-view_to_id="'.$result['user_id'].'" class="play mr-2 m-1 "  type="button"><i class="fa fa-play" style=" color:red"></i></button>
             <button data-video_id="'.$result['video_id'].'" class="pause m-1"  type="button"><i class="fa fa-pause" style="color:red"></i></button>
    
                        
                </div>
                
             <div class="row mt-2 ">
          
     
             
             <div class="col-7 ">
             <span   >Owner: <span class="text-success" style="font-size:12px;">'.$result['username'].'</span></span>
             </br>
             <span  " >Entertainment: <span class="text-success" style="font-size:12px;"> </br>'.$result['entertainment'].'</span></span>
             </br>';
              
             $title=  (strlen($result['title']) > 10) ? substr($result['title'],0,10).'...' : $result['title'];
    $output .=' <span  >Title: <span class="text-success" style="font-size:12px;" >'.$title.'</span></span>
            
            </br>
            <span  ">Description:';
    
            $description=  (strlen($result['description']) > 10) ? substr($result['description'],0,9).'...' : $result['description'];
    
    $output.=' <span class="text-success" style="font-size:12px;" >'.$description.'</span></span>
           </div>
             <div class="col-5">
             <span  >Likes </span><button  data-video_id="'.$result['video_id'].'" data-like_to_id="'.$result['user_id'].'" type="submit"   class="fa fa-thumbs-up like_video"></button>  <span class="text-warning" id="likes_count_'.$result['video_id'].'" style="font-size:12px;">'.get_total_likes_of_video($result['video_id'],$conn).'</span>
             </br>
             <span  >Views: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="text-danger" id="views_count_'.$result['video_id'].'" style="font-size:12px;">'.get_total_views_of_video($result['video_id'],$conn).'</span></span>
             <br>
             <span   >Followers: <span class="text-primary" id="subscribers_count_'.$result['video_id'].'" style="font-size:12px;" >'.get_total_subscribers_of_channel($result['user_id'],$conn).'</span>
              <button style="font-size:12px;" class="btn btn-success"><a href="video_comments.php?video_id='.$result['video_id'].'&video_owener='.$result['username'].'" class="text-light" >Comments</a></button> 
    
             
             </div>
              
             </div>
             
             </div>
             <div class="card-header lead border border-info d-flex justify-content-center">  
             
             <button  style="font-size:12px;" data-subscribe_to_id="'.$result['user_id'].'" data-video_id="'.$result['video_id'].'" class="btn btn-outline-success  text-primary  subscribe_channel  mr-3 ">Subscribers</button> 
             <button style="font-size:12px;" data-unsubscribe_to_id="'.$result['user_id'].'" data-video_id="'.$result['video_id'].'" class="btn btn-outline-success  text-warning unsubscribe_channel ml-3">Unsubscribe</button> 
    
              
            
             </div>
           </div>
           </div>
       
         
       
       ';
    
       
    
   
        }


     }


     $output.='</div>';

    } 

echo $output;
 
 
 
 
?>
