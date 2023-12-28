<?php
include 'panierController.php';
?>
<center><table border='2' style='border-collapse: collapse' >
<tr><td colspan='5'><center><b>Your Cart</td></tr>
<tr><th>Id</th><th>Product</th><th>Quantity</th><th>Price</th><th>Action</th></tr>
<style>
    body{ background-color: black;
            
        }
   table{padding: 40px;
        margin-left:400px;
        border-radius: 30px;
        background-color:yellowgreen;opacity: 1.2;
        width: 50%;height: 500px;
        position: fixed 
       ; }
   
</style>

<?php
if(empty($_SESSION['panier']['id_produit'])) // panier vide
{
	echo "<tr><td colspan='5'>Your cart is empty</td></tr>";
    echo "<tr><td colspan='5'><a href='../front/Shop.php'>Complete Shopping</a></td></tr>";
}
else
{
	for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) 
	
	{
		echo "<tr>";
        echo "<td>" . $_SESSION['panier']['id_produit'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['product'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['quantity'][$i] . "</td>";
		echo "<td>" . $_SESSION['panier']['price'][$i] . "</td>";
        echo '<td><a href="?action=Remove&id_produit=' . $_SESSION['panier']['id_produit'][$i] .'">Remove</a></td>';
		echo "</tr>";
	}

	echo "<tr><th colspan='3'>Total</th><td colspan='2'>" .$panier->montantTotal() . " $</td></tr>";
    echo '<form method="post" action="">';
		echo '<tr><td colspan="5"><input type="submit" name="Pay" value="Confirm the payment" /></td></tr>';
		echo '</form>';	

        echo "<tr><td colspan='5'><a href='?action=Empty'>Empty my cart</a></td></tr>";
	echo "<tr><td colspan='5'><a href='../front/Shop.php'>Complete shopping</a></td></tr>";

echo "</table><br />";
echo "<i styel='color:white'>All Done</i><br />";
}
?>