<?php

require_once("Connexion.php");

$con=new Connexion();
$connexion=$con->getConnexion();
 
 
    
    

        $Requette= "CREATE TABLE IF NOT EXISTS glasses (
            id_produit INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            category VARCHAR(20) NOT NULL ,
            details TEXT NOT NULL ,
            price INT(3) NOT NULL ,
            stock INT(3) NOT NULL ),
            photo VARCHAR(250) NOT NULL ";
           
        $connexion->query($Requette);


$Requette= "CREATE TABLE IF NOT EXISTS  membres (
    id_membre INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    nom VARCHAR(20) NOT NULL ,
    mdp VARCHAR(10) NOT NULL ,
    email VARCHAR(50) NOT NULL"; 
    
    $connexion->query($Requette);


    $Requette= "CREATE TABLE IF NOT EXISTS commande (
        id_commande INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        id_membre INT(3) NULL DEFAULT NULL,
        montant INT(3) NOT NULL,
        date_enregistrement DATETIME NOT NULL,
        etat ENUM('en cours de traitement', 'envoyé', 'livré') NOT NULL
    ) ";
    $connexion->query($Requette);

$Requette= "CREATE TABLE IF NOT EXISTS  details(
id_details_commande INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_commande INT(3) NULL DEFAULT NULL,
id_produit INT(3) NULL DEFAULT NULL,
quantity INT(3) NOT NULL,
price INT(3) NOT NULL
)";
$connexion->query($Requette);
?>