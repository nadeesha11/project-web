<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin login</title>
</head>
<body>
    <div class="admin-wrapper">
  
        <div class="blur"><br>
        <h2 class="center">THE EMPIRE KITCHEN</h2>

    <div class="login">
     <h2 class="center">ADMIN LOGIN</h2><br>

     <?php   
     session_start();//to display messege in page
      if(isset($_SESSION['log-admin'])){ 
          echo $_SESSION['log-admin'];
          unset($_SESSION['log-admin']);
      }
     
      ?><br>
   

     <form action="" method="POST" class="center"> 
    Username: <br>
    <input class="design-input" maxlength="12" minlength="6" required type="text" name="a_username" placeholder="Enter username"><br><br>
    
    Password: <br>
    <input class="design-input" maxlength="12" minlength="6" required pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,12}$" type="password" name="a_password" placeholder="Enter password"><br><br>

    <input type="submit" name="submit" value=LOGIN class="btn-primary">

     </form>

    </div>
    </div>
    </div>
    
</body>
</html>
<?php 
if(isset($_POST['submit'])){

   $username=$_POST['a_username'];
   $password=$_POST['a_password'];

   //sql qury to password is exist or not
   $sql = "SELECT * FROM tbl_admin WHERE AUsername='$username' AND APassword='$password' ";
    
   $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
   $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database


   $res = mysqli_query($conn,$sql);
   
   //count rows to check a user exits or not
   $count = mysqli_num_rows($res);
   
   if($count==1){
    session_start();//to display messege in page
    $_SESSION['log-admin'] = "<div class='center' class='messege_success' >$username login succesfully</div>";
   

    header("Location:http://localhost/individual_project/Admin_panel/Home.php ");
    
  }
   else{
    session_start();//to display messege in page
    $_SESSION['log-admin']="<div class='center' class='messege_unsuccess' >Password or Username didnt match</div>";
    header("Location:http://localhost/individual_project/Admin_panel/admin-login.php ");
}

}

?>






