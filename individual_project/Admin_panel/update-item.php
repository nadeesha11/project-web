<?php  include('same/menu.php');
      ?>

<?php
if(isset($_GET['id'])){
     $IId = $_GET['id'];

     $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
     $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database
   
    $sql2 = "SELECT * FROM item WHERE IId=$IId";

    $res2 = mysqli_query($conn,$sql2);

    $row2 = mysqli_fetch_assoc($res2);

    $IName = $row2['IName'];
    $IPrice = $row2['IPrice'];
    $IDetail = $row2['IDetail'];
    $CatId = $row2['CatId'];

  

}
else{

    header("Location:http://localhost/individual_project/Admin_panel/manage-item.php ");
}

?>

<div class="main-content">
<div class="clearfix"></div>
<h3><strong class="dash">Update Item</strong></h3>
    <br>
<div class="wrapper">

<form action="" method="POST" enctype='multipart/form-data'>

<table class="tbl-40">
<tr>
<td>Item Name     </td>
<td>
<input type="text" name="IName" value="<?php  echo $IName;   ?>" >
</td>
</tr>

<tr>
<td>Item Description     </td>
<td>
<textarea style="resize:none" resize=none name="IDetails" id="" cols="30" rows="5"  ><?php  echo $IDetail;   ?></textarea>
</td>
</tr>

<tr>
<td>Item Price </td>
<td>
<input type="number" name="IPrice" value="<?php  echo $IPrice;   ?>" >
</td>
</tr>

<!-- <tr>
<td>Select image </td>
<td>
<input type="file" name="IImageName">
</td>
</tr> -->

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
        <input type="hidden" name="IId" value="<?php echo $IId;   ?>">
        <input type="submit" name="submit" value="ADD FOOD" class="btn-primary">
</td>
</tr>


</table>
</form>
<?php

if(isset($_POST['submit'])){

    $IId = $_POST['IId'];
   $IName =$_POST['IName'];
     $IDetails =$_POST['IDetails'];
    $IPrice =$_POST['IPrice'];
    $CatId =$_POST['Category'];
    

    $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
    $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

    //sql query to update admin datails
    $sql3 = "UPDATE item SET 
    IName = '$IName',
    IPrice = '$IPrice',
    IDetail = '$IDetails',
    CatId = '$CatId'

    WHERE IId = '$IId'
    ";
    $res3 = mysqli_query($conn,$sql3); //execute query
    if($res3==true){
        // session_start();
        $_SESSION["update_item"]="<div class='messege_success'>Item updated succesfully</div>";
        header("location:http://localhost/individual_project/Admin_panel/manage-item.php");
    }
    else{
        // session_start();
        $_SESSION["update_item"]="<div class='messege_unsuccess'>Item updated unsuccesfully</div>";
        header("location:http://localhost/individual_project/Admin_panel/manage-item.php");
        
    }



}
?>
</div>
</div>
<?php  include('same/footer.php');
      ?>






