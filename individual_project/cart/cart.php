<?php
   $IId =$_GET['iid'];

   $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
   $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

   $sql ="SELECT * FROM item WHERE IId=$IId";
   $res =mysqli_query($conn, $sql);
   $count = mysqli_num_rows($res);
   if($count==1){ 
     $row =mysqli_fetch_assoc($res);

     $IName=$row['IName'];
     $IPrice=$row['IPrice'];
    $IImageName=$row['IImageName'];
     


   }
   else{
      header("Location:http://localhost/individual_project/Home.php ");
   }

   session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="cart.css">
    <link href="jquery.nice-number.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-1.12.4.min.js" 
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" 
        crossorigin="anonymous">
</script>
<script  type="text/javascript" src="script.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<script src="jquery.nice-number.js"></script>

    <script type="text/javascript"> 
     $(function(){

// $('input[type="number"]').niceNumber();
$('.total-price input[type="number"]').niceNumber();

});
    
    </script>
    
</head>
<body>
    <section class="header" >
        <div class="container-h" >
    
          <div class="logo"  >
            <img src="../resources/burger.png" alt="logo">
          
          </div>
    
         <div class="topic">
           
           <h1  class="ani-text" >The Empire Kitchen</h1>
         </div>
            <!-- <div class="mob-menu">
              <h1>MENU</h1>
            </div> -->
          <div class="navbuttons">
         <ul >
          <!-- <li>
            <a href="https://www.google.com/webhp?hl=si&sa=X&sqi=2&pjf=1&ved=0ahUKEwjE9YL2guvzAhVOSvEDHWHlCjcQPAgI">HOME</a>
          </li>
          <li>
            <a href="#">CART</a>
          </li>
          <li>
            <a href="#">GALLERY</a>
          </li>
          <li>
            <a href="#">ABOUT</a>
          </li>
          <li>
            <a href="#">MY ACCOUNT</a>
          </li>
          <li>
            <a href="#"><ion-icon class="navbar-icon" name="people"></ion-icon></a>
          </li> -->
          <li>
          <a href="http://localhost/individual_project/home.php">HOME</a>
        </li>
        <!-- <li>
          <a href="http://localhost/individual_project/cart/cart.php">CART</a>
        </li> -->
        <li>
          <a href="http://localhost/individual_project/gallery/gallery.php">GALLERY</a>
        </li>
        <li>
          <a href="http://localhost/individual_project/about/about.php">ABOUT</a>
        </li>
        <!-- <li>
          <a href="#">MY ACCOUNT</a>
        </li> -->
        <li>
          <a href="http://localhost/individual_project/login/login.php"><ion-icon class="navbar-icon" name="people"></ion-icon></a>
        </li>
        <li>
          <a href="http://localhost/individual_project/logout-user.php"><ion-icon class="navbar-icon" name="exit-outline"></ion-icon></a>
        </li>
         </ul>
           
    
          </div>
          <div class="mob-menu">
            <button class="spand-btn-nav" ><span class="material-icons l">
             <h1>view_headline</h1> 
              </span></button>
          </div>
          <div class="mob-nav">
            <!-- <div class="mob-menu">
              <h1>MENU</h1>
            </div> -->
            <!-- <h1>Menu</h1> -->
           <ul >
             <li>
               <a href="https://www.google.com/webhp?hl=si&sa=X&sqi=2&pjf=1&ved=0ahUKEwjE9YL2guvzAhVOSvEDHWHlCjcQPAgI">HOME</a>
             </li>
             <li>
               <a href="#">CART</a>
             </li>
             <li>
               <a href="#">GALLERY</a>
             </li>
             <li>
               <a href="#">ABOUT</a>
             </li>
             <li>
               <a href="#">MY ACCOUNT</a>
             </li>
            </ul>
          </div>
    
        </div>
      </section>

  <!-- code for cart -->
   <div class="container-c">
    
    <div class="small-container">
        <div class="space">

        <?php
          // session_start();
          if(isset($_SESSION['order'])){ 
              echo $_SESSION['order'];
              unset($_SESSION['order']);
          }

        ?>
        </div>
    <table>

        <tr>
            <th>Item</th>
            <th>total(per)</th>
            <!-- <th>Quantity</th> -->
        </tr>
        <tr>
            <td>
                <div class="cart-info">


                <div class="cart-info-2">
                  <br>
                  <form action="" method="post">
                    <p><?php echo $IName; ?></p>
                    <input type="hidden" name="IName" value="<?php echo $IName; ?>">
                    
                    <br>
                    <a href="http://localhost/individual_project/Home.php ">Cancel</a>
                </div>
                
                </div>


            </td>
           
            <!-- <td><input type="number" name="Qity" value="1"></td> -->
            <td>Rs.<?php echo $IPrice; ?></td>
            <input type="hidden" name="IPrice" value="<?php echo $IPrice; ?>">
        </tr>
        <br><br>
        <th>Quantity</th><br>
        <td><input class="Qty" type="number" name="Qty" value="1"></td>
        
        

    </table>
    

    </div>
    <div class="total-price">
    
  
        <div class="clear">

        </div>
    </div>

    <!-- <form action=""> -->
    <fieldset class="fieldset">
    <legend class="legend">Order Details</legend>
    
        <label for="fullname">Full Name</label>
        <input type="text" maxlength="50" required name="fname"> </input><br><br>

           

        <label for="phone">Mobile Number</label>
        <input type="text" pattern="[0-9]+" maxlength="12" required name="mobile"></input><br><br>

        <label for="phone-optional">Land Line</label>
        <input type="text" pattern="[0-9]+" maxlength="12" required name="landline"></input><br><br>

        <label for="email">Email</label>
        <input type="email" maxlength="20" required name="Email"></input><br><br>

        <label for="Address">Address</label>
        <input type="text" maxlength="70" required name="Address"></input><br><br>

        <button name="submit" type="submit">Confirm Your Order</button>

     
     
    </fieldset>
    </form>
    <?php
    if(isset($_POST['submit'])){
    
        $Qty=$_POST['Qty']; 
        $IName=$_POST['IName']; 
        $IPrice=$_POST['IPrice'];
        $TotalPrice=($IPrice * $Qty); 
        $fname=$_POST['fname']; 
        $mobile=$_POST['mobile']; 
        $landline=$_POST['landline']; 
        $Email=$_POST['Email']; 
        $Address=$_POST['Address'];

        date_default_timezone_set('Asia/Colombo');

        $OrderTime=date("y-m-d h:i:a");
        $OrderCode = uniqid();

        $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
      $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database
    
      $sql2="INSERT INTO CUorder SET 
      IName='$IName',
      TotalPrice=$TotalPrice,
      OrderTime='$OrderTime',
      Qty='$Qty',
      FullName='$fname',
      MobileNumber='$mobile',
      LandLine='$landline',
      Email='$Email',
      Address='$Address',
      OrderCode='$OrderCode'
     
       ";

     $res2=mysqli_query($conn,$sql2);
       
     if($res2==true){
      // session_start();
      $_SESSION['order']="<div class='messege_success'>$IName order succesful. Total Rs.$TotalPrice Ordercode $OrderCode </div>";
     }
     if($res2==true){

      // header("Location:http://localhost/individual_project/Home.php ");
     ?>
      <script language="javascript" type="text/javascript">window.location ="../Home.php";</script>
      <?php
    }
    if($res2==false){
  //  session_start();
   $_SESSION['order']="<div class='messege_success'>Food order unsuccesful</div>";
    }
    if($res2==false)
    {
      ?>
      <script language="javascript" type="text/javascript">window.location ="cart.php";</script>
      <?php
    
      // header("Location:http://localhost/individual_project/cart/cart.php ");

    }
     



    }

    ?>
    <div class="clear"></div>

   </div>




      <section class="Social">
        <div class="container-2"  >
          <div class="center">
            <h2 class="text-color-white" >Find Us on Social Media
            </h2><br>
          <ul>
            <li> <a href="#"><img class="img-trans" src="https://img.icons8.com/color/48/000000/facebook-new.png"/></a> </li>
            <li> <a href="#"><img  class="img-trans" src="https://img.icons8.com/fluency/48/000000/twitter.png"/></a> </li>
            <li> <a href="#"><img class="img-trans" src="https://img.icons8.com/fluency/48/000000/instagram-new.png"/></a> </li>
            <li> <a href="#"><img class="img-trans" src="https://img.icons8.com/fluency/48/000000/youtube-play.png"/></a> </li>
          </ul>
        </div>
      </div>
      </section>
    
      <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
    
    <section class="footer">
      <div class="container-2" class="center" >
    <p class="text-color-white">Designed and developed by Nadeesha jayathshan</p>
    
      </div>
    
    </section>
        
   


    
</body>
</html>