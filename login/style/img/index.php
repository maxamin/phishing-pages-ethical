<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
    
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="";
      }
      
      if($file_size > 2097152) {
         $errors[]='';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"".$file_name);
         echo "jpg";
      }else{
         print_r($errors);
      }
   }
?>
