<?php
session_start();
if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
    header('location:index.php');
}else{
    header('location:admin.php');
}

?>