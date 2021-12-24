<?php include('same/menu.php');  ?>
<div class="main-content">
<div class="clearfix"></div>
<h3><strong class="dash">Add Category</strong></h3>
    <br>
    <?php   
      // session_start();
      if(isset($_SESSION['add-category'])){ 
          echo $_SESSION['add-category'];
          unset($_SESSION['add-category']);
      }
      if(isset($_SESSION['upload_image'])){ 
        echo $_SESSION['upload_image'];
        unset($_SESSION['upload_image']);
    }
     
    
    
    ?><br>
<div class="wrapper">
<form action="" method="POST" enctype='multipart/form-data' >

<table class="tbl-40" >
<tr>
<td>Category Name</td>
<td>
    <input type="text" required name="CatName" placeholder="Enter Category Name">
</td>
<tr>
 <td>Select Image</td>
<td>
<input type="file" name="Cat-image">

</td>

</tr>

</tr>
<tr>
   <td colspan="2">
       <input type="submit" name="submit" value="Add Category" class="btn-primary">
</td>

</tr>

</table>

</form>

<?php

if(isset($_POST['submit'])){

    $CatName = $_POST['CatName'];

  if(isset($_FILES['Cat-image']['name'])){
//to upload image we need to image name, socuce path and destinmtion path
    $image_name=$_FILES['Cat-image']['name'];
    
    // $ext = end(explode('.',$image_name));
    // $image_name ="food_category_".rand(000,999).'.'.$ext;


    $source_path =$_FILES['Cat-image']['tmp_name'];
    $destination_path = "../Cat_images/".$image_name;

   // upload image
   $upload = move_uploaded_file($source_path, $destination_path);

   if($upload==false){
    // session_start();
    $_SESSION['upload_image']="<div class='messege_success'>Failed to upload image</div>";
    header("Location:http://localhost/individual_project/Admin_panel/add-category.php ");
    die();

   }

  }
  else{
     $image_name="";
     //dont upload image and set image name as blank
  }

 //create sql to add data to databse
  $sql = "INSERT INTO category SET
   CatName='$CatName',
   ImageName='$image_name'
   
     ";

   $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
   $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

     $res = mysqli_query($conn,$sql);

    //  session_start();
    if($res==TRUE){
        // session_start();
        $_SESSION['add-category'] = "<div class='center' class='messege_success' >Category added succesfully</div>";
       
    
        header("Location:http://localhost/individual_project/Admin_panel/manage-category.php ");
        
      }
       else{
        // session_start();
        $_SESSION['add-category']="<div class='center' class='messege_unsuccess' >Failed to add category</div>";
        header("Location:http://localhost/individual_project/Admin_panel/add-category.php ");
    }




}

?>



</div>
</div>
<?php include('same/footer.php');  ?>




