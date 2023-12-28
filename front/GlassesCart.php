
<?php
include 'storeController.php';


$aff='';	
$aff .= "<p>Category: $str[category]</p>";
$aff .= "<h3>Details : $str[details]</h3><hr /><br />";
$aff .= "<p>Color: $str[color]</p>";
$aff .= "<img src='../Backend/$str[photo]' width='150' height='150' />";
$aff .= "<p>Price : $str[price] $</p><br />";

if($str['stock'] > 0)
{
	$aff .= "<i>Avialble quantity : $str[stock] </i><br /><br />";
	$aff .= '<form method="post" action="../Panier/panierView.php">';
	$aff .= "<input type='hidden' name='id_produit' value='$str[id_produit]' />";
	$aff .= '<label for="quantity">Quantity : </label>';
	$aff .= '<select id="quantity" name="quantity">';
			for($i = 1; $i <= $str['stock'] && $i <= 5; $i++)
			{
				$aff .= "<option>$i</option>";
			}
			$aff .= '</select>';
			$aff .= '<input type="submit" name="ajout_panier" value="Add to card" />';
			$aff .= '</form>';
}
else
{
	$aff .= 'Out of stock !';
} 
$aff .= "<br /><a href='Shop.php?category=" . $str['category'] . "'>Retour vers la sélection de " 
. $str['category'] . "</a>";
//--------------------------------- AFFICHAGE HTML ---------------------------------//
//require_once('entete.php');
echo $aff;
