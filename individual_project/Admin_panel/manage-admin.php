<?php  include('same/menu.php');
      ?>



    <!-- content codes  -->
    <div class="main-content">
        <div class="clearfix"></div>

    <h3><strong class="dash">Manage Admin</strong></h3>
    <br>
     <?php
      // session_start();
       if(isset($_SESSION['add_admin']))//checking session set or not
       {
            echo $_SESSION['add_admin']; //display messege
            unset($_SESSION['add_admin']);//remove session
       }?> <br> <?php
       if(isset($_SESSION['delete_admin']))//checking session set or not
       {
            echo $_SESSION['delete_admin']; //display messege
            unset($_SESSION['delete_admin']);
       }
       if(isset($_SESSION['update_admin']))//checking session set or not
       {
            echo $_SESSION['update_admin']; //display messege
            unset($_SESSION['update_admin']);
       }

     ?>
     <br><br>

    <a href="add-admin.php" class="btn-primary">Add Admin</a><br>
    <div class="wrapper">
       <br>
       <table class="full-table">
        <tr>
         <th>Serial Number</th>
         <th>Username</th>
         <th>Action</th>

        </tr>
       <?php
            
       $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
       $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database
      
       $sql = "SELECT * FROM tbl_admin";
       $res = mysqli_query( $conn, $sql) or die(mysqli_error());//execute query
       if($res==true){
          $count=mysqli_num_rows($res);//get number of rows
          $sn=1;
          //
          if($count>0){
            while($rows =mysqli_fetch_assoc($res))//get data raws from database using this cmmand
            {
            $id=$rows["AId"];
            $username=$rows["AUsername"];
           ?>
            <tr>
         <td><?php echo $sn++; ?> .</td>
         <td><?php echo $username; ?></td>
         <td>
           <a href="http://localhost/individual_project/Admin_panel/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
           <a href="http://localhost/individual_project/Admin_panel/delete-admin.php?id=<?php echo $id; ?>" class="btn-third">Delete</a> <!-- send the values with url using get method  -->
           
         </td>

        </tr>

          <?php

          }
        }
          else{
             
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










