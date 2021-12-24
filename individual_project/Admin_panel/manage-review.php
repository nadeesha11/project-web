<?php  include('same/menu.php');
      ?>
<!-- content codes  -->
<div class="main-content">
        <div class="clearfix"></div>


    <h3><strong class="dash">Manage Review</strong></h3>
    <?php   
      // session_start();
      if(isset($_SESSION['delete-review'])){ 
          echo $_SESSION['delete-review'];
          unset($_SESSION['delete-review']);
      }

   
    ?><br>
     <div class="wrapper">
     <br>
       <table class="full-table">
        <tr>
         <th>Reviewer</th>
         <th>Review</th>
         <th>Action</th>

        </tr>

        <tr>
            <?php

$conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
$db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

$sql = "SELECT * FROM review";
$res = mysqli_query( $conn, $sql) or die(mysqli_error());//execute query

if($res==true){
 $count=mysqli_num_rows($res);//get number of rows

 if($count>0){
   while($rows =mysqli_fetch_assoc($res))//get data raws from database using this cmmand
   {
   $name=$rows["Reviewer"];
 $review=$rows["ReviewContent"];
 $ReviewId=$rows["ReviewId"];

            ?>
         <td><?php echo  $name ?></td>
         <td><?php echo $review ?></td>
         <td>
          
           <a href="http://localhost/individual_project/Admin_panel/delete-review.php?id=<?php echo $ReviewId;   ?>" class="btn-third">Delete</a>
         </td>

        </tr>

        <?php

}
}
}



?> 
      
        


       </table>
    


     <div class="clearfix">

     </div>


     </div>
    </div>












<?php  include('same/footer.php');
      ?>


