<?php  include('same/menu.php');
      ?>

    <!-- content codes  -->
    <div class="main-content">
        <div class="clearfix"></div>

    <h3><strong class="dash">Manage Item</strong></h3>
    <br>
    <?php   
      // session_start();
      if(isset($_SESSION['upload_item-data'])){ 
          echo $_SESSION['upload_item-data'];
          unset($_SESSION['upload_item-data']);
      }
      if(isset($_SESSION['delete-item'])){
        echo $_SESSION['delete-item'];
        unset($_SESSION['delete-item']);
        
    }
    if(isset($_SESSION['removeitemimage'])){ 
      echo $_SESSION['removeitemimage'];
      unset($_SESSION['removeitemimage']);
  }
  if(isset($_SESSION['update_item'])){ 
    echo $_SESSION['update_item'];
    unset($_SESSION['update_item']);
}
   
    ?><br>
    <a href="http://localhost/individual_project/Admin_panel/add-item.php" class="btn-primary">Add Item</a><br>
     <div class="wrapper">
      
     
     <br>
       <table class="full-table">
        <tr>
         <th>Serial Number</th>
         <th>Item Name</th>
         <th>Item Price</th>
         <!-- <th>Item Image</th> -->
         <th>Item Details</th>
         <th>Action</th>

        </tr>
        <?php 
        
        $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
        $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

        $sql= "SELECT * FROM item";

        $res =mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);
        $sn=1;
       if($count>0){
       //food added
     while($row=mysqli_fetch_assoc($res)){//get all the data as array format
       $IId =$row['IId'];
       $IName =$row['IName'];
       $IPrice =$row['IPrice'];
       $IImageName =$row['IImageName'];
       $IDetails =$row['IDetail'];

      

   ?> 
          <tr>
         <td><?php echo $sn++ ;  ?></td>
         <td><?php echo  $IName;   ?></td>
         <td>Rs. <?php echo $IPrice;   ?></td>
       
         <td> <?php echo $IDetails; ?></td>
         <td>
         
           <a href="http://localhost/individual_project/Admin_panel/update-item.php?id=<?php echo $IId;   ?>" class="btn-secondary">Update</a>
           <a href="http://localhost/individual_project/Admin_panel/delete-item.php?id=<?php echo $IId;   ?>&name=<?php echo $IImageName;  ?>" class="btn-third">Delete</a>
         </td>

        </tr>


<?php
     }
       }
       else{
    //food not added yet
       ?>   <tr>
             <td colspan="6"> Items not added</td>
       </tr>
       
       <?php  

       }
        
        ?>
 

       
  
       </table>
     

     <div class="clearfix">

     </div>


     </div>
    </div>



<?php  include('same/footer.php');
      ?>