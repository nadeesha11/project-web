
    <?php  include('same/menu.php');
      ?>

    <!-- content codes --> 
    <div class="main-content">
        <div class="clearfix"></div>

    <h1><strong class="dash">DASHBOARD</strong></h1>
     <div class="wrapper">
         <br>
     <?php   
    //  session_start();
      if(isset($_SESSION['log-admin'])){ 
          echo $_SESSION['log-admin'];
        //   unset($_SESSION['log-admin']);
      }
         
      ?>
    
     <div class="col-4 center">

     <?php
        $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
        $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

        $sql = "SELECT * FROM category";
        $res = mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);

    ?>
         <h1><?php  echo $count; ?></h1>
         Categories
     </div>

     <div class="col-4 center">

     <?php
     $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
     $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database
   
     $sql2 = "SELECT * FROM item";
        $res2 = mysqli_query($conn,$sql2);
        $count1=mysqli_num_rows($res2);


      ?>
         <h1><?php echo $count1;  ?></h1>
         Food Items
     </div>

     <div class="col-4 center">

     <?php
             $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
             $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

             $sql3 = "SELECT * FROM customer";
             $res3 = mysqli_query($conn,$sql3);
             $count3=mysqli_num_rows($res3);
  
     ?>
         <h1><?php echo $count3;  ?></h1>
        Customers
     </div>

     <div class="col-3 center">
         <?php
       $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
       $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

       $sql4 = "SELECT * FROM cuorder WHERE Status='' ";
       $res4 = mysqli_query($conn,$sql4);
       $count4=mysqli_num_rows($res4);


     ?>
         <h1><?php echo $count4; ?></h1>
         Uncompleted Orders
     </div>

     <div class="clearfix">

     </div>
     <div class="clearfix">

     </div>
     <div class="clearfix">

     </div>
     <div class="clearfix">

     </div>
     <div class="clearfix">

     </div>


     </div>
    </div>

    <?php  include('same/footer.php');
      ?>
 