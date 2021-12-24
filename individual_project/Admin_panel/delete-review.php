<?php

   if(isset($_GET['id'])){
    
    $id =$_GET['id'];
  echo $id;

  $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
  $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

  $sql = "DELETE FROM review WHERE ReviewId =$id";
  $res = mysqli_query($conn,$sql);

  if ($res == true){
    session_start();//to display messege in page
    $_SESSION["delete-review"]="<div class='messege_success'>Review deleted succesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-review.php");

 }
 else{
    session_start();//to display messege in page
    $_SESSION["delete-review"]="<div class='messege_unsuccess'>Review deleted unsuccesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-review.php");
 }


}



?>










