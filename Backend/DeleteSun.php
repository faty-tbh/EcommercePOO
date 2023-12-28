<?php
include('Sunny.php');

if(isset($_GET['deleteId'])){
    $_id=$_GET['deleteId'];
    $product=new Sunny();
    $deleteId=$product-> deleteRecord($_id);


}



?>