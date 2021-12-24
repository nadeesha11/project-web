 <?php  include('same/menu.php');     ?>
<div class="main-content">
<div class="clearfix"></div>
<h3><strong class="dash">Add Item</strong></h3>
    <br>
    <?php   
    //   session_start();
      if(isset($_SESSION['upload_item-image'])){ 
          echo $_SESSION['upload_item-image'];
          unset($_SESSION['upload_item-image']);
      }
   
    ?>
<div class="wrapper">
<br>
<form action="" method="POST" enctype='multipart/form-data'>

<table class="tbl-40">
<tr>
<td>Item Name     </td>
<td>
<input type="text" required name="IName" placeholder="type name of the item">
</td>
</tr>

<tr>
<td>Item Description     </td>
<td>
<textarea style="resize:none" required resize=none name="IDetails" id="" cols="30" rows="5" placeholder="Enter item details"></textarea>
</td>
</tr>

<tr>
<td>Item Price </td>
<td>
<input type="number" required name="IPrice" placeholder="Item price">
</td>
</tr>

<tr>
<td>Select image </td>
<td>
<input type="file" name="IImageName">
</td>
</tr>

<tr>
<td>Category</td>
<td>
<select name="Category" >
<?php 
//to desplay cat frokm dtabase
$conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
$db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

$sql = "SELECT * FROM category";
$res =mysqli_query($conn,$sql);

$count =mysqli_num_rows($res);//get num of raws that have data

if($count>0){//we have cat

    while($row = mysqli_fetch_assoc($res)){
        $CatId=$row['CatId'];
        $CatName=$row['CatName'];
        ?>  
        <option value="<?php echo $CatId?>"><?php echo $CatName ?></option>
        <?php
    }
}
else{//we dont have cat
   ?> 
   <option value="0">No Categories found</option> 
   <?php

}

?>
   
    <!-- <option value="1">pizza</option> -->
</select>
</td>
</tr>

<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="ADD FOOD" class="btn-primary">
</td>
</tr>


</table>

</form>
<?php
if(isset($_POST['submit'])){//to save item data to database
    $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
    $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database
     
    //get the daata from form
   $IName =$_POST['IName'];
   $IDetails =$_POST['IDetails'];
   $IPrice =$_POST['IPrice'];
   $CatId =$_POST['Category'];

 

   if(isset($_FILES['IImageName']['name'])){
    $IImageName=$_FILES['IImageName']['name'];
        
       if($IImageName!==""){

        $src = $_FILES['IImageName']['tmp_name'];//source of the file
        $des = "../".$IImageName;

       $upload = move_uploaded_file($src,$des);
       if($upload==false){
       
        session_start();//to display messege in page
        $_SESSION['upload_item-image']="<div class='messege_success'>Failed to upload item image</div>";
        header("Location:http://localhost/individual_project/Admin_panel/add-item.php ");

        die(); 
       }


       }

   }
   else{

       $IImageName="";
   }
   //query tp add details to item tabel
   $sql2="INSERT INTO item SET 
      IName='$IName',
      IPrice=$IPrice,
      IImageName=' $IImageName',
      IDetail='$IDetails',
      CatId='$CatId'
     
       ";

$conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
$db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

      $res2=mysqli_query($conn,$sql2);

      if($res2==true){
        // session_start();
        $_SESSION['upload_item-data']="<div class='messege_success'>Item data added succesfully</div>";
        header("Location:http://localhost/individual_project/Admin_panel/manage-item.php ");

      }
      else{
        // session_start();
        $_SESSION['upload_item-data']="<div class='messege_success'>Item data added unsuccesfully</div>";
        header("Location:http://localhost/individual_project/Admin_panel/manage-item.php ");

      }
   
   

}

?>
</div>
</div>


 <?php  include('same/footer.php');     ?>
    