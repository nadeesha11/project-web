<?php  include('same/menu.php');
      ?>

    <!-- content codes  -->
    <div class="main-content">
        <div class="clearfix"></div>

    <h3><strong class="dash">Manage order</strong></h3>

    <br>
    <?php   
      // session_start();
      if(isset($_SESSION['delete_order'])){ //session set or not
          echo $_SESSION['delete_order'];
          unset($_SESSION['delete_order']);
      }
       
    
    ?>
     <div class="wrapper">
     <br>
       <table class="full-table">
        <tr>
         <!-- <th>Serial Number</th> -->
         <th>Item Name</th>
         <th>Total</th>
         <th>Time</th>
         <th>Qty</th>
         <th>Full Name</th>
         <th>Mobile</th>
         <th>Landline</th>
         <th>Email</th>
         <th>Address</th>
         <th>Status</th>
         <th>OrderCode</th>
       
         <th>Actions</th>
        </tr>

   <?php
   $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
   $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

   $sql ="SELECT * FROM cuorder ORDER BY OrderId DESC ";
   $res =mysqli_query($conn, $sql);
   $count = mysqli_num_rows($res);

   if($count>0){
   while($row =mysqli_fetch_assoc($res)) {
    $OrderId =$row['OrderId'];
    $TotalPrice=$row['TotalPrice'];
    $OrderTime=$row['OrderTime'];
    $IName=$row['IName'];
    $Status=$row['Status'];
    $Qty=$row['Qty'];
    $FullName=$row['FullName'];
    $MobileNumber=$row['MobileNumber'];
    $LandLine=$row['LandLine'];
    $Email=$row['Email'];
    $Address=$row['Address'];
    $OrderCode=$row['OrderCode'];
    $Status=$row['Status'];
   
    ?>
      <tr>
        
        <td><?php echo $IName  ?></td>
        <td><?php echo $TotalPrice  ?></td>
        <td><?php echo $OrderTime  ?></td>
        <td><?php echo $Qty  ?></td>
        <td><?php echo $FullName  ?></td>
        <td><?php echo $MobileNumber  ?></td>
        <td><?php echo $LandLine ?></td>
        <td><?php echo $Email  ?></td>
        <td><?php echo $Address  ?></td>
        <td><?php echo $Status  ?></td>
        <td><?php echo $OrderCode ?></td>
        <td>
          <a href="http://localhost/individual_project/Admin_panel/btn-deliver.php?OrderId=<?php echo $OrderId;  ?>" class="btn-secondary">Deliver</a><br><br>
          <a href="http://localhost/individual_project/Admin_panel/delete-order.php?OrderId=<?php echo $OrderId;  ?>" class="btn-primary">Delete</a>
        </td>

       </tr>



    <?php

   }

  

   }
   else{
      ?>
    <tr colspan="11">
      <td><?php echo "No any orders"; ?></td>
    
    </tr>
    <?php
   }


   ?>
        <!-- <tr>
        
         <td>kamal</td>
         <td>kamal</td>
         <td>kamal</td>
         <td>kamal</td>
         <td>kamal</td>
         <td>kamal</td>
         <td>kamal</td>
         <td>kamal</td>
         <td>kamal</td>
         <td>kamal</td>
         <td>
           <a href="#" class="btn-secondary">Update</a><br><br>
           <a href="#" class="btn-third">Delete</a>
         </td>

        </tr> -->

     
      
        


       </table>
    
     

     <div class="clearfix">

     </div>


     </div>
    </div>



<?php  include('same/footer.php');
      ?>