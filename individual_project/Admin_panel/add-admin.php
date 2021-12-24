<?php  include('same/menu.php');
      ?>
<div class="main-content">

<div class="clearfix"></div>
<h3><strong class="dash">Add Admin</strong></h3>
    <br>
<div class="wrapper">

<form action="" method="POST" >
<table class="tbl-40 ">
<tr>
<td>User Name : </td> 
<td>
      <input type="text" maxlength="12" minlength="6" required name="a_username" placeholder="Enter UserName">
       </td>
</tr>
<tr>
<td>Password : </td> 
<td> 
      <input type="password" maxlength="12" minlength="6" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,12}$" required name="a_password" placeholder="Enter Password">
       </td>

</tr>
<tr>
<td colspan="2">
    <input type="submit"  name="submit" value="ADD ADMIN" class="btn-primary">
</td>

</tr>



</table>
</form>

</div>


</div>



<?php  include('same/footer.php');
      ?>
<?php  
//check the button click
   if(isset($_POST['submit'])){

      //get values from form
      $AUsername = $_POST['a_username'];
      $APassword = $_POST['a_password'];
    
      //sql query for save data in database
      $sql = "INSERT INTO tbl_admin SET
        AUsername = '$AUsername',
        APassword = '$APassword'
       ";
    
       $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
       $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database
     
       $res = mysqli_query($conn,$sql) or die(mysqli_error());//execute query

      //  session_start();
      //  check data added or not
      if($res=TRUE){
            // session_start();
            $_SESSION['add_admin']="<div class='messege_success'>Admin added succesfully</div>";
            header("Location:http://localhost/individual_project/Admin_panel/manage-admin.php ");
      }
      else{
            // session_start();
            $_SESSION['add_admin']="<div class='messege_unsuccess'>Admin added unsuccesfully</div>";
            header("Location:http://localhost/individual_project/Admin_panel/add-admin.php ");
      }

   }

      ?>




