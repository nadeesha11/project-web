<?php  include('same/menu.php');
      ?>

    <!-- content codes  -->
    <div class="main-content">
        <div class="clearfix"></div>

    <h3><strong class="dash">Manage Category</strong></h3>
    <br>
    <br>
    <?php   
      // session_start();
      if(isset($_SESSION['add-category'])){ //session set or not
          echo $_SESSION['add-category'];
          unset($_SESSION['add-category']);
      }
      if(isset($_SESSION['remove_image'])){ 
        echo $_SESSION['remove_image'];
        unset($_SESSION['remove_image']);
    }
    if(isset($_SESSION['delete-category'])){ 
      echo $_SESSION['delete-category'];
      unset($_SESSION['delete-category']);
  }
   
     
    
    
    ?><br>
    <a href="http://localhost/individual_project/Admin_panel/add-category.php" class="btn-primary">Add Category</a><br>

     <div class="wrapper">
     <br>
       <table class="full-table">
        <tr>
         <th>Serial Number</th>
         <th>Category Name</th>
         <th>Image</th>
         <th>Action</th>

        </tr>
       <?php

   $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
   $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database



       $sql = "SELECT * FROM category";

       $res = mysqli_query($conn,$sql);//execute query

       $count = mysqli_num_rows($res);
        $sn=1;
       if($count>0){
             while($row=mysqli_fetch_assoc($res)){//to get all category data to row
             $CatId = $row['CatId'];
             $CatName = $row['CatName'];
             $ImageName = $row['ImageName'];
             ?>
                <tr>
         <td><?php echo  $sn++ ; ?></td>
         <td><?php echo  $CatName; ?></td>

         <td><?php 
         if($ImageName!=""){//image name not empty despaly image
          
            ?>

         
           <img src="<?php echo "http://localhost/individual_project/Cat_images/"; ?><?php echo $ImageName; ?>" width="100px" height="60px">
           <?php

         }else{

            echo "Image not added";
         } 
         ?>  
        
        </td>
         <td>
           <!-- <a href="#" class="btn-secondary">Update</a> -->
           <a href="http://localhost/individual_project/Admin_panel/delete-category.php?CatId=<?php echo $CatId ;  ?>&ImageName=<?php echo $ImageName ;  ?>" class="btn-third">Delete</a> 
         </td>

        </tr>
             <?php

             }

       }
       else{

        //no data in dataabe
        ?>
        <tr>
          <td colspan='4'><div class="unsuccess">No category added</div></td>
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