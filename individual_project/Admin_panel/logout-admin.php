<?php
session_start();
if(isset($_SESSION['log-admin'])){ 
  
    unset($_SESSION['log-admin']);
}
session_destroy();

header("location:http://localhost/individual_project/Admin_panel/admin-login.php");


?>