<?php
include 'storeController.php';


$aff='';	
$aff .= "<p>Category: $str[category]</p>";
$aff .= "<h3>Details : $str[details]</h3><hr /><br />";
$aff .= "<img src='/$str[photo]' width='150' height='150' />";
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
$aff .= "<br /><a href='Shop.php?category=" . $str['category'] . "'>back to the selection of " 
. $str['category'] . "</a>";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SUNGLASSES Website</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <section>
            <div class="circle"></div>
            <header>
                <a href="#" >
                    
                </a>
                <ul>
                    <li><a href="Site.php">Home</a></li>
                    <li><a href="Shop.php">Shop</a></li>
                    <li><a href="#">Connexion</a></li>
                    <li><a href="#">S'inscrire</a></li>
             
                    <li><a href="../Panier/panierView.php">
                        <img src="img/panier.png" width="20px" height="20px">
                    </a></li>
                </ul>
            </header>
            <div style="color:white ">
            <?php echo $aff; ?>

</div>
</section>

</body>
</html>






