<?php
 $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
 $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database



 $OrderId =$_GET['OrderId'];


 $sql = "DELETE FROM cuorder WHERE OrderId =$OrderId";


$res = mysqli_query($conn,$sql);

if($res==true){
    session_start();
    $_SESSION["delete_order"]="<div class='messege_success'>Order deleted succesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-order.php");
}
else{
    session_start();
    $_SESSION["delete_order"]="<div class='messege_unsuccess'>Order deleted unsuccesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-order.php");
    
}


?>