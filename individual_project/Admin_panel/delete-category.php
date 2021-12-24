<?php



if(isset($_GET['CatId']) AND isset($_GET['ImageName'])){

      $CatId=$_GET['CatId'];
      $ImageName=$_GET['ImageName'];

  
    if($ImageName!=""){

        $path ="../Cat_images/".$ImageName;//set path
        // echo $path;
        // die();
        $remove=unlink($path);//delete pic
    }
    if($remove==false){


        session_start();//to display messege in page
        $_SESSION["remove_image"]="<div class='messege_unsuccess'>Remove image unsuccesfully</div>";
        header("location:http://localhost/individual_project/Admin_panel/manage-category.php");

        // die();
    }
    $sql = "DELETE FROM category WHERE CatId=$CatId";
    
    $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
    $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

    $res = mysqli_query($conn,$sql); //execute query

    if($res==true){
     //if phpto and deteails delete fro databdae
     session_start();//to display messege in page
     $_SESSION["delete-category"]="<div class='messege_success'>Category deleted succesfully</div>";
     header("location:http://localhost/individual_project/Admin_panel/manage-category.php");


    }
    else{
        session_start();//to display messege in page
        $_SESSION["delete-category"]="<div class='messege_success'>Category deleted succesfull</div>";
        header("location:http://localhost/individual_project/Admin_panel/manage-category.php");


    }
 
}else{

    header("Location:http://localhost/individual_project/Admin_panel/manage-category.php ");
}
 

?>