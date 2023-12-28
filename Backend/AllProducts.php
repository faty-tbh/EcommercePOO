<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    
    <title>Sunglasses</title>

    <style>
      
        body{background-color:black;
            
                     }
                table{padding: 40px;
                     margin: top 350px;
                     border-radius: 30px;
                     background-color:yellowgreen;opacity: 1.2;
                    width: 20%;height: 500px;
                    margin-left: -245px; position: fixed 
                    ; }
                    .textCss{
                        color:black;
                    }
                    .button {
                        color:gray;
                         padding: 10px 10px;
                         background-color:black;
                          border-radius: 15px;
              }
    </style>
</head>
<body>



<div class='card text-center'  style='padding:15px;background-color:black'>
    <h1  style="color:yellowgreen ">ALL SUNGLASSES </h1>
    </div>
    <h2 style="color:yellowgreen">
            <a href="Formulaire.php" class="btn btn-dark" style="float:left;background-color:yellowgreen"> Add New SUNGLASSES</a><i class='far fa-arrow-alt-circle-down'></i>
        </h2>
    <div class="container">
        
        <table class="table table-hover">
            <thead>                
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Details</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>            
            </thead>
            <tbody>
                <?php
                  
                    include 'Sunny.php';
                    
                     $productObj = new Sunny();
                    $products = $productObj->displayData();
                    foreach ($products as $product) {                  
                    
                ?>
                <tr>
                <td><?php echo $product['id_produit'] ?></td>
                <td><?php echo $product['category'] ?></td>
                
                <td><?php echo $product['details'] ?></td>
               
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['stock'] ?></td>
                
                <td>
                    <img src="../<?php echo $product['photo'] ?>" alt="" style="width:70px;height:70px">
                    
                </td>
                 <td>
                     <a href="EditSun.php?editId=<?php echo $product['id_produit']?>" style="color:green;margin-right:25px;">                   
                        <i  aria-hidden=true></i>Edit</a>
                    <a href="DeleteSun.php?deleteId=<?php echo $product['id_produit']?>" style="color:red" 
                                onclick="return confirm('Are you sure you wanna delete this item from your list?');" >
                   
                        <i aria-hidden=true></i>Delete</a>
                </td> 

                


                </tr>
                <?php
                    }
                ?>
                
            </tbody>
        </table>
        
        
    </div>
    

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   
</body>

</html>


 