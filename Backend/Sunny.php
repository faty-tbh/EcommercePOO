<?php
 include("../model/Connexion.php");
 
 class Sunny{
    
     public function insertData($post){
         $connexion=new Connexion();
        $con=$connexion->getConnexion();
         
         
        
         $var_category = $_POST['category'];
         $var_details = $_POST['details'];
         $var_price = $_POST['price'];
         $var_stock = $_POST['stock'];
         
 
        
         $photo_bdd="";
         if(!empty($_FILES['photo']['name']))
         {   
             $nom_photo = $_FILES['photo']['name']; 
            
             $photo_bdd = "photos/".$nom_photo;	
            
             $photo_dossier="C:/xampp/htdocs/cours_CM/ProjetGlasses/photos/".$nom_photo;
             copy($_FILES['photo']['tmp_name'],$photo_dossier);            
         }
        
         $req="INSERT INTO glasses (id_produit, category, details, photo,
         price, stock) VALUES ('', '$var_category',  '$var_details',
         '$photo_bdd',  '$var_price',  '$var_stock')";
        
         $result = $con->query($req);
 
         if($result){
 
 
             
             header("Location:AllProducts.php");
         
         }else{
             echo 'Failed to Add this product, try again!';
         }       
        
         
     }
    
  
     
     public function displayData(){
         $connexion=new Connexion();
        $con=$connexion->getConnexion();
         $new_query = "SELECT * FROM glasses";
         $result = $con->query($new_query);
         if($result->num_rows > 0){
             $data = array();
             while($row = $result->fetch_assoc()){
                 $data[] = $row;
             }
             return $data;
         }
         else{
             echo 'No found!';
         }
     }
 
 
     
     
     public function displayRecordById($id){
         $connexion=new Connexion();
         $con=$connexion->getConnexion();
         $new_query = "SELECT * FROM glasses WHERE id_produit = '$id'";
         $result = $con->query($new_query);
         if($result->num_rows > 0){            
            $row = $result->fetch_assoc();
             return $row;
         }
         else{
             echo 'Not found!';
         }
     }
     
     
     public function updateRecord($post)
     
     {
         $connexion=new Connexion();
         $con=$connexion->getConnexion();
 
         $var_category = $_POST['category'];
        
         $var_details = $_POST['details'];
         
         $var_price = $_POST['price'];
         $var_stock = $_POST['stock'];
       
         $var_id = $_POST['id_produit'];
 
         if(!empty($_FILES['photo']['name']))
             {   
                 $nom_photo = $_FILES['photo']['name']; 
             
                 $photo_bdd = "photos/" . $nom_photo;	
                     
                 $photo_dossier="C:/xampp/htdocs/cours_CM/photos/".$nom_photo;
                 copy($_FILES['photo']['tmp_name'],$photo_dossier); 
             
                 if(!empty($var_id) && !empty($post)){
                   
                     $new_query = "UPDATE glasses SET category = '$var_category', 
                      details = '$var_details', price = '$var_price', 
                      stock = '$var_stock', photo = '$photo_bdd' WHERE id_produit = '$var_id'";
                                        
                     $result = $con->query($new_query);
                     if($result){
                                            
                         header("Location:AllProducts.php");
                     }else{
                         echo 'try again!!';
                     }
                 }
                 
             }
             else{
                
                 if(!empty($var_id) && !empty($post)){
                     
                   
                     $new_query = "UPDATE glasses SET category = '$var_category', 
                     details = '$var_details', price = '$var_price', 
                     stock = '$var_stock', photo = '$photo_bdd' WHERE id_produit = '$var_id'";
                                        
                     $result = $con->query($new_query);
                     if($result){
                          echo 'Product updated successfully!';
                                         
                         header("Location:AllProducts.php");
                     }else{
                         echo 'try again!';
                     }
                 }
 
             }
 
         
     }
 
 
     
      
      public function deleteRecord($id){
         $connexion=new Connexion();
        $con=$connexion->getConnexion();
         $new_query = "DELETE FROM glasses WHERE id_produit ='$id'";
         $result = $con->query($new_query);
         if($result){            
              
            
             header("Location:AllProducts.php");
         }
         else{
             echo 'Cannot delete this product!';
         }
     }
 
 
    
 
 
 
 }
 

?>  