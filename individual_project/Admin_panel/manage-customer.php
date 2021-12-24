<?php  include('same/menu.php');
      ?>

 <!-- content codes  -->
 <div class="main-content">
        <div class="clearfix"></div>

    <h3><strong class="dash">Manage Customer</strong></h3>
    <br>
    <?php   
      // session_start();
      if(isset($_SESSION['delete_customer'])){ //session set or not
          echo $_SESSION['delete_customer'];
          unset($_SESSION['delete_customer']);
      }
       
    
    ?>
    <!-- <a href="#" class="btn-primary">Add Admin</a><br> -->
    <div class="wrapper">
       <br>
       <table class="full-table">
        <tr>
         <th>Serial Number</th>
         <th>Customer Username</th>
         <th>Action</th>

        </tr>
      <?php
        $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
        $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

        $sql= "SELECT * FROM customer";

        $res =mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);
        $sn=1;
       if($count>0){
       //food added
     while($row=mysqli_fetch_assoc($res)){//get all the data as array format
       $Cid =$row['Cid'];
       $CUsername =$row['CUsername'];
    
       ?>
          <tr>
         <td><?php echo $sn++; ?></td>
         <td><?php echo $CUsername;  ?></td>
         <td>
           <!-- <a href="#" class="btn-secondary">Update</a> -->
           <!-- <a href="#" class="btn-third">Delete</a> -->
           <a href="http://localhost/individual_project/Admin_panel/delete-customer.php?id=<?php echo $Cid;   ?>" class="btn-secondary">Delete</a>
         </td>

        </tr>

   
    <?php
     }
    }
    else{
 //food not added yet
    ?>   <tr>
          <td colspan="3"> customers not added</td>
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


      