<?php

$conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
$db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

echo $id =$_GET['id'];
$sql = "DELETE FROM customer WHERE  Cid=$id";

$res = mysqli_query($conn,$sql);

if($res==true){
    session_start();//to display messege in page
    $_SESSION["delete_customer"]="<div class='messege_success'>Customer deleted succesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-customer.php");
}
else{
    session_start();//to display messege in page
    $_SESSION["delete_customer"]="<div class='messege_unsuccess'>Customer deleted unsuccesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-customer.php");
    
}


?>