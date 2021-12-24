  <?php 

if(isset($_GET["id"]) AND isset($_GET["name"]))
{
   
    $IId = $_GET['id'];
  //   $IImageName = $_GET['name'];

  // if($IImageName!=""){
  //   //   echo $IImageName;
  //   //   die(); 
  //   $path ="../".$IImageName;
    
  //   // $path ="http://localhost/individual_project/Item_images/".$IImageName;
  //   //set path
  //     //  echo $path;
  //     //  die();
    
  //   //   $remove = unlink(realpath($path));
  //    $remove=unlink($path);
     
      
  //   if($remove==false){

        
  //       session_start();//to display messege in page
  //       $_SESSION["removeitemimage"]="<div class='messege_unsuccess'>Remove image unsuccesfully</div>";
  //       header("location:http://localhost/individual_project/Admin_panel/manage-item.php");

  //       // die();   error in remove image
  //   }

  // }

  $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
  $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

  $sql = "DELETE FROM item WHERE IId=$IId";
  

  $res = mysqli_query($conn,$sql);

 if ($res == true){
    session_start();//to display messege in page
    $_SESSION["delete-item"]="<div class='messege_success'>food item delete succesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-item.php");

 }
 else{
    session_start();//to display messege in page
    $_SESSION["delete-item"]="<div class='messege_unsuccess'>food item delete unsuccesfully</div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-item.php");
 }


}

else
{

    session_start();//to display messege in page
    $_SESSION["delete_item"]="<div class='messege_success'> Error </div>";
    header("location:http://localhost/individual_project/Admin_panel/manage-item.php");

}


?>

