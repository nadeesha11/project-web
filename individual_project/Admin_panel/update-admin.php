<?php
include('same/menu.php');

?>

<div class="main-content">
<div class="clearfix"></div>
<h3><strong class="dash">Update Admin</strong></h3>
    <br>
<?php  
 $id = $_GET['id'];//get the id of selected admin id
  
 $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
 $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

 $sql="SELECT * FROM tbl_admin WHERE AId=$id";

 $res =mysqli_query($conn,$sql);

if($res==true){

$count=mysqli_num_rows($res);

if($count==1){

    // echo "admin available";
    $row=mysqli_fetch_assoc($res);//get selected raw data to row variable;

    $username = $row['AUsername'];
    $password = $row['APassword'];

}
else{
    header("location:http://localhost/individual_project/Admin_panel/manage-admin.php");
}

}
?>

<div class="wrapper">
<form action="" method="POST">
<table class="tbl-40">
<tr>
<td>User Name : </td> 
<td>
      <input type="text" name="a_username" value="<?php echo $username; ?>">
       </td>
</tr>
<tr>
<td>Password : </td> 
<td> 
      <input type="password" name="a_password" value="<?php echo $password; ?>">
       </td>

</tr>
<tr>
<td colspan="2">
    <input type="hidden" name="id" value=" <?php echo $id; ?>">
    <input type="submit" name="submit" value="UPDATE ADMIN" class="btn-primary">
</td>

</tr>

</table>


</form>

</div>

</div>
<?php
  if(isset($_POST['submit'])){
    //   echo "buttin click";
    $id= $_POST['id'];//get new values from form
    $username= $_POST['a_username'];
    $password= $_POST['a_password'];

    $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
    $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

    //sql query to update admin datails
    $sql = "UPDATE tbl_admin SET 
    AUsername = '$username',
    APassword = '$password'
    WHERE AId = '$id'
    ";
    $res = mysqli_query($conn,$sql); //execute query
    if($res==true){
        // session_start();
        $_SESSION["update_admin"]="<div class='messege_success'>Admin updated succesfully</div>";
        header("location:http://localhost/individual_project/Admin_panel/manage-admin.php");
    }
    else{
        // session_start();
        $_SESSION["update_admin"]="<div class='messege_unsuccess'>Admin updated unsuccesfully</div>";
        header("location:http://localhost/individual_project/Admin_panel/manage-admin.php");
        
    }
    
    
  }

?>


<?php
include('same/footer.php');

?>