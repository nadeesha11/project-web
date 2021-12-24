<?php
 $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
 $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database


//get the admin id using get method
 $id =$_GET['id'];

 //sql quey to delete admin form tabele
 $sql = "DELETE FROM tbl_admin WHERE  AId=$id";

// execuete query
$res = mysqli_query($conn,$sql);

if($res==true){
    session_start();//to display messege in page
    $_SESSION["delete_admin"]="<div class='messege_success'>Admin deleted succesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-admin.php");
}
else{
    session_start();//to display messege in page
    $_SESSION["delete_admin"]="<div class='messege_unsuccess'>Admin deleted unsuccesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-admin.php");
    
}


?>