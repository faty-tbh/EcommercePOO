<?php
include 'storeModel.php';
$store=new Store();
$str=$store->GetCat();
if(isset($_GET['category'])){
   $category=  $_GET['category'];
  $stt=$store->GetglsBycat($category);
 }

 if(isset($_GET['id_produit'])) 
	{  
        $id_produit=  $_GET['id_produit'];
		$str=$store->GetglsById($id_produit);
   }
?>