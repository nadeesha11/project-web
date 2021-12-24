<?php

if(isset($_GET['OrderId'])){

  $OrderId=$_GET['OrderId'];
  $Status='deliverd';
 


  $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
  $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

  $sql2 = "UPDATE cuorder SET 
  
  Status = '$Status'

  WHERE OrderId = '$OrderId'
  ";

  $res2=mysqli_query($conn,$sql2);

  if($res2==true){
//   session_start();
//   $_SESSION['upload_item-data']="<div class='messege_success'>Item data added succesfully</div>";
  header("Location:http://localhost/individual_project/Admin_panel/manage-order.php ");

  }
  else{
//   session_start();
//   $_SESSION['upload_item-data']="<div class='messege_success'>Item data added unsuccesfully</div>";
  header("Location:http://localhost/individual_project/Admin_panel/manage-order.php ");

   }

   }

?>