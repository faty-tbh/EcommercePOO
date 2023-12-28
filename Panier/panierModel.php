<?php
include '../model/Connexion.php';
session_start();
class cart{
    public function ajout_panier($id_produit)
    {
        $connexion=new Connexion();
        $con=$connexion->getConnexion();
        $new_query = "SELECT * FROM glasses WHERE id_produit = '$_POST[id_produit]'";
        $result = $con->query($new_query);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function creation_Panier()
    {
       
          $_SESSION['panier']=array();
          $_SESSION['panier']['id_produit'] = array();
          $_SESSION['panier']['product'] = array();
          $_SESSION['panier']['quantity'] = array();
          $_SESSION['panier']['price'] = array();
       
    }

 
     public function AddglsCart($product,$id_produit,$quantity,$price)
    {
	    $position_produit = array_search($id_produit,  $_SESSION['panier']['id_produit']); 
        if ($position_produit !== false)
        {
            $_SESSION['panier']['quantity'][$position_produit] += $quantity ;
        }
        else 
        {
           
            $_SESSION['panier']['id_produit'][] = $id_produit;
            $_SESSION['panier']['product'][] = $product;
            $_SESSION['panier']['quantity'][] = $quantity;
            $_SESSION['panier']['price'][] = $price;
        }
    }



    public function RemoveglsCart($id_produit_a_supprimer)
    {
        $position_produit = array_search($id_produit_a_supprimer,  $_SESSION['panier']['id_produit']);
        if ($position_produit !== false)
        {
            
            array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
            array_splice($_SESSION['panier']['product'], $position_produit, 1);
            array_splice($_SESSION['panier']['quantity'], $position_produit, 1);
            array_splice($_SESSION['panier']['price'], $position_produit, 1);
        }
    }

    public function EmptyCart()
    {
        unset($_SESSION['panier']);

    }

    public function montantTotal()
    {
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) 
        {
            $total += $_SESSION['panier']['quantity'][$i] * $_SESSION['panier']['price'][$i];
        }
        return round($total,2);
    }

    public function valider_paiement()
    {
        $connexion=new Connexion();
        $con=$connexion->getConnexion();
        for($i=0 ;$i < count($_SESSION['panier']['id_produit']) ; $i++) 
	    {
            $x=$_SESSION['panier']['quantity'][$i];
            $req = "SELECT * FROM glasses WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i];
            $resultat=$con->query($req);
            $row = $resultat->fetch_assoc();
            $y=$row['stock'];
            $req="UPDATE glasses set   stock=$y-$x WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i];
            $res=$con->query($req);
        }

    }


}
?>