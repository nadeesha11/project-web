<?php   define('SITEURL', 'http://localhost/individual_project/');  

session_start();
if(!isset($_SESSION['log-admin'])){
    header("Location:http://localhost/individual_project/Admin_panel/admin-login.php ");

}

?>

<!DOCTYPE html>

<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito&family=Oswald:wght@300&family=Patrick+Hand&family=Playfair+Display&family=Roboto:wght@500&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel Home</title>
</head>
<body>
    <!-- header codes -->
    <div class="menu center">
    <div class="wrapper">
     <ul>
         <li><a href="Home.php">Home</a></li>
         <li><a href="manage-admin.php">Admin</a></li>
         <li><a href="manage-customer.php">Customer</a></li>
         <li><a href="manage-category.php">Category</a></li>
         <li><a href="manage-item.php">Item</a></li>
         <li><a href="manage-order.php">Order</a></li>
         <li><a href="manage-review.php">Review</a></li>
         <li><a href="logout-admin.php">Logout</a></li>
         
     </ul>
    
    </div>
    </div>