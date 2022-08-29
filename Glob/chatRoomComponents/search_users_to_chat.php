<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header("location../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Chat Room </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../resource/hom.css" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
<script src="../resource/home3.js"></script>

<script src="../resource/home1.js"  ></script>
<script src="../resource/home2.js"  ></script>
<style>

body{
background-color:#33475b;
overflow-x: hidden;
}
</style>

</head>
 


<body>

  <div class="container">
	<div class="row">
		<div class="col">
 
     <div class="d-flex justify-content-between bg-dark align-items-center m-3" style="border:2px ;border-radius: 10px;">
              
	 <span class="m-2 text-primary">Search Globula users</span>
         <div class="d-flex justify-content-end align-items-center">
            <span class="small text-danger">   
			<form class="form-material">
                                    <div class="searche form-group form-primary">
                                        <input type="text" name="footer-email" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label">
                                            <i class=" fa fa-search m-r-10"></i>
                                            Search  Friends
                                            
                                           
                                           </label>
                                           
                                    </div>
                                </form>

         </span>
        </div>
     </div>



	   <div class="bg-dark" style="border:2px ;border-radius: 15px;">

	  <table class="table">
	  
	  <tbody>
		   
	     <div id="result"></div>
		
	  </tbody>
	</table>

	</div>

	</div>
	</div>
 </div>
 

 
 
<script>
$(document).ready(function(){
    $('.searche input[type="text"]').on("keyup input", function(){
        
        var username="<?php echo $_SESSION['username']; ?>";
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");


        if(inputVal.length){
            $.get("chats_components/fetch_all_globula_users.php", {searchvalue: inputVal,username:username}).done(
                
                function(data){
               
                
				$('#result').html(data);

            }
            
            );
            
        } else{
            resultDropdown.empty();
        }
    });
    
    
     

});
</script>
	
</body>
</html>
