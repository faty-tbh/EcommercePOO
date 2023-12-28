<?php
include 'panierModel.php';
$panier=new cart();

if(isset($_POST['ajout_panier']))
{
    $produit=$panier->ajout_panier($_POST['ajout_panier']);
    if (!isset($_SESSION['panier']))
    {
        $panier->creation_Panier();
    }
    $panier->AddglsCart($produit['category'],$_POST['id_produit'],$_POST['quantity'],$produit['price']);
}

//retirer un produit du panier
if(isset($_GET['action']) && $_GET['action'] == "Remove")
{
    $panier->RemoveglsCart($_GET['id_produit']);
}

//vider le panier
if(isset($_GET['action']) && $_GET['action'] == "Empty")
{
    $panier->EmptyCart();
}

//MAJ de stock dans la base de données
if(isset($_POST['Pay']))
{
    $produit=$panier->valider_paiement();
    $panier->EmptyCart();
}
?>