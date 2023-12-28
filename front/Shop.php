<?php
require_once("../model/Connexion.php");

class ShopController {
    private $conn;

    public function __construct() {
        $this->conn = (new Connexion())->getConnexion();
    }

    public function getCategories() {
        $query = "SELECT DISTINCT category FROM glasses";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $categories = $stmt->get_result();

        $output = '<div>
            <strong><h2 style="color: black;
            font-size: 3em;
            font-weight: 900;
            font-style:italic;">OUR GLASSES CATEGORIES</h2></strong><br><br>
            <ul>';

        while ($category = $categories->fetch_assoc()) {
            $output .= "<strong><li style='display: inline-block;
            margin-top: 20px;
            padding: 8px 20px;
            background:  black;
            color: #fff;
            border-radius: 40px;
            font-weight: 500;
            letter-spacing: 1px;
            text-decoration: none;'><a style='color:white' href='?category=" . $category['category'] . "'>" . $category['category'] . "</a></li> </strong>";
        }

        $output .= "</ul></div>";

        return $output;
    }

    public function getGlassesByCategory($category) {
        $query = "SELECT id_produit, category, details, photo, price, stock FROM glasses WHERE category=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $category);
        $stmt->execute();
        $data = $stmt->get_result();

        $output = '<div>';
        while ($glasses = $data->fetch_assoc()) {
            $output .= '<div>';
            $output .= "<h2>$glasses[category]</h2>";
            $output .= "<img src='/$glasses[photo]'width ='150' height='130'></a>";
            $output .= "<h3><p style='color:black'>$glasses[price] $</p></h3>";
            $output .= '<a style="display: inline-block;
            margin-top: 20px;
            padding: 8px 20px;
            background:  white;
            color: yellowgreen;
            border-radius: 40px;
            font-weight: 500;
            letter-spacing: 1px;
            text-decoration: none;" href="Affichage.php?id_produit=' . $glasses['id_produit'] . '">Buy this product</a>';
            $output .= '</div>';
        }
        $output .= '</div>';

        return $output;
    }
}

$shopController = new ShopController();

$affichage = $shopController->getCategories();

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $affichage .= $shopController->getGlassesByCategory($category);
}

?>



<html>
<head>
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
                    <li><a href="">connexion</a></li>
                    <li><a href="">S'inscrire</a></li>
                    
                    <li><a href="../Panier/panierView.php">
                        <img src="img/panier.png" width="20px" height="20px">
                    </a></li>
                </ul>
                
            </header>
            <div style="color:white ">
            <?php echo $affichage ?>

</div>

        
            </section>

</body>
</html>