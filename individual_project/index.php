<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>The Empire Kitchen-Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Playfair+Display&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Patrick+Hand&family=Playfair+Display&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script  type="text/javascript" src="script.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

     


    

</head>
<body>
    <section class="header" >
      <div class="container-h" >

        <div class="logo"  >
          <img src="resources/burger.png" alt="logo">
        
        </div>

       <div class="topic">
         
         <h1  class="ani-text" >The Empire Kitchen</h1>
       </div>
          <!-- <div class="mob-menu">
            <h1>MENU</h1>
          </div> -->
        <div class="navbuttons">
       <ul >
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
             <a href="http://localhost/individual_project/home.php">HOME</a>
           </li>
           <!-- <li>
             <a href="#">CART</a>
           </li> -->
           <li>
             <a href="http://localhost/individual_project/gallery/gallery.php">GALLERY</a>
           </li>
           <li>
             <a href="http://localhost/individual_project/about/about.php">ABOUT</a>
           </li>
           <li>
             <a href="http://localhost/individual_project/login/login.php">LOGIN</a>
           </li>
           <li>
             <a href="http://localhost/individual_project/logout-user.php">LOGOUT</a>
           </li>
          </ul>
        </div>

      </div>
    </section>


    <section class="search-bar" >
        <div class="container">

<?php   
        // session_start();
    
      if(isset($_SESSION['cu-add'])){
       
          echo $_SESSION['cu-add'];
          unset($_SESSION['cu-add']);
      }
      ?>
      <br>
<?php

          if(isset($_SESSION['log-customer'])){
            echo $_SESSION['log-customer'];
            // unset($_SESSION['log-customer']);

        }
        if(isset($_SESSION['review-added'])){
          echo $_SESSION['review-added'];
          unset($_SESSION['review-added']);

      }
      if(isset($_SESSION['order'])){
        echo $_SESSION['order'];
        unset($_SESSION['order']);

    }

    ?>
          <!-- <form action="">
           
          <input class="bar" type="search" name="search" placeholder="Search Foods">
          
           <button class="btn"> <span class="material-icons">
            search
            </span></button>
          </form> -->
          
          <!-- add session messege -->

        </div>
      </section>



      <section class="category">
        <div class="container">
          <h1 class="topic-deco">Category</h1>

        <?php  
         
         $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
         $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database
         $sql = "SELECT * FROM category";
         
         $res = mysqli_query($conn,$sql);

         $count = mysqli_num_rows($res);

         if($count>0){
             while($row=mysqli_fetch_assoc($res)){
              $CatId =$row['CatId'];
              $CatName =$row['CatName'];
              $ImageName =$row['ImageName'];
        ?>


            <a href="#items">
          <div class="cat-box">
         <?php
            if($ImageName==""){

              echo "Image not found";
            }
            else{
           ?> 
              <img class="img-size" src="<?php echo "http://localhost/individual_project/Cat_images/"; ?><?php echo $ImageName; ?>" alt=""> 
           <?php
              
            }
       

                 ?>
         
          <h2 class="text-position"> <?php  echo $CatName;      ?> </h2>
          </div>
          </a>



      <?php

             }

         }
         else{
           echo "categories not found";
         }
        
                            ?>

      


        <div class="clear">

        </div>

        </div>
      </section>




      <section class="items" id="items">
        <div class="container">
          <h1 class="topic-deco">Items</h1>

<?php  
         

             $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
             $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

             $sql2 = " SELECT * FROM item  ";
            $res2 =mysqli_query($conn,$sql2);

            $count2 =mysqli_num_rows($res2);

            if($count2>0){
            while($row=mysqli_fetch_assoc($res2)){

              $IId = $row['IId'];
              $IName = $row['IName'];
              $IPrice = $row['IPrice'];
              $IImageName = $row['IImageName'];
              $IDetail = $row['IDetail'];
          
          

          ?>

      <div class="item-box">
           <?php  
               if($IImageName==""){
                      
                         echo "Image not available";
               }
                       
               else{
              
                ?>
                <img class="img-size-item" src="<?php echo  $IImageName; ?>" >
              
           
                <?php

               }


                                  ?>
     
            <div class="description" > 
              <h2  class="text-color-white">Rs.<?php echo $IPrice; ?></h2>
              <h3><?php echo $IName;   ?></h2>
              <h6><?php echo $IDetail;  ?></h3>
              
            

              <a href="http://localhost/individual_project/login-checker.php?iid=<?php echo $IId; ?>" class="addToCartBtn" > 
                <span class="addToCartBtn-text">ADD TO CART</span>
                <span class="material-icons">
          add_shopping_cart
         </span>
        </a>
            </div>



            <?php
            }

            }
            else{

              echo "food not availale";
            }


           ?>
    




          </div>


         


      </section>

<!-- comment <section> -->
  <div class="comment">
<div class="comment-wrapper">
 <form action="" method="post"  name="FORM" class="form" onsubmit="return(validate())">
 <input type="text" class="name" required name="name" placeholder="Name"><br>
 <textarea name="review" class="messege" required cols="0" placeholder="Review" rows="4"></textarea><br>
 <Button type="submit" name="submit-review"  class="comment-btn" class="text-color-white">POST</Button>
 </form>
 
  


</div>
<div class="comment-content">
  <div class="new-comment">
    <?php
     $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
     $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

     $sql = "SELECT * FROM review ORDER BY ReviewId DESC";
     $res = mysqli_query( $conn, $sql) or die(mysqli_error());//execute query

     if($res==true){
      $count=mysqli_num_rows($res);//get number of rows

      if($count>0){
        while($rows =mysqli_fetch_assoc($res))//get data raws from database using this cmmand
        {
        $name=$rows["Reviewer"];
      $review=$rows["ReviewContent"];
         ?>
    <h4><?php echo $name;  ?></h4>
  <p> <?php echo $review;  ?></p>
    <br>
         <?php

     }
    }
  }

 

 ?>

</div>
<!-- <div class="new-comment">
  <h4>Nadeesha</h4>
  <p>Lo blanditiimu. Ea re deleniti nesciunt pariatur aut consequatur fugit nulla earum voluptatibus eveniet dolor rem vero quo excepturi laborum, expedita autem esse! Sed, eveniet! error quam? Cumque, pariatur vitae.</p> 
</div> -->

</div>

<?php  
if(isset($_POST['submit-review'])){
  $conn = mysqli_connect("localhost","root","") or die(mysqli_error());//database connection
  $db_connect = mysqli_select_db($conn,"foodorder") or die(mysqli_error());//select database

      $ReviewerName =$_POST['name'];
      $Review =$_POST['review'];
    

      $sql="INSERT INTO review SET 
      ReviewContent = '$Review',
      Reviewer = '$ReviewerName' ";
    
    $res=mysqli_query($conn,$sql);
    if($res==true){
      // session_start();
      $_SESSION['review-added']="<div class='messege_success'>Review added succesfully</div>";
      // header("Location:http://localhost/individual_project/Home.php ");

    }
    else{
      // session_start();
      $_SESSION['review-added']="<div class='messege_success'>Review added unsuccesfully</div>";
      // header("Location:http://localhost/individual_project/Home.php ");

    }

    

}
?>


</div>

   

      <section class="Social">
        <div class="container-footer" >
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
      <div class="container-footer" class="center" >
    <p class="text-color-white">Designed and developed by Nadeesha jayathshan</p>
   
      </div>



    </section>


</body>
</html>












