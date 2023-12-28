<?php
include '../model/Connexion.php';
class Store{
    public function GetCat()
    {
        $connexion=new Connexion();
        $con= $connexion->getConnexion();
        $req= "SELECT DISTINCT category FROM glasses";
        $res=$con->query($req);
        if ($res->num_rows>0){
            $data=array();
        while($cat = $res->fetch_assoc()){
            $data[]=$cat;
        }
        return $data;
        

    }}

    public function GetData()
    {
        $connexion=new Connexion();
        $con= $connexion->getConnexion();
        $req= "SELECT * FROM glasses";
        $res=$con->query($req);
        if ($res->num_rows>0){
            $data=array();
        while($cat = $res->fetch_assoc()){
            $data[]=$cat;
        }
        return $data;
        

    }}


    
    public function GetglsBycat($cat){
        $connexion=new Connexion();
        $con=$connexion->getConnexion();
        $new_query = "SELECT * FROM glasses WHERE category = '$cat'";
        $result = $con->query($new_query);
        if($result->num_rows > 0){            
           $row = $result->fetch_assoc();
            return $row;
        }
        else{
            echo 'Record not found!';
        }
    }
    
    
    public function GetglsById($id){
        $connexion=new Connexion();
        $con=$connexion->getConnexion();
        $new_query = "SELECT * FROM glasses WHERE id_produit = '$id'";
        $result = $con->query($new_query);
        if($result->num_rows > 0){            
           $row = $result->fetch_assoc();
            return $row;
        }
        else{
            echo 'Record not found!';
        }
    }
    




    
}
?>