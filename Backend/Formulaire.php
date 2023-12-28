<?php
//include "products.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SUNGLASSES</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <style>
      
        body{background-color:black;
            
                     }
                form{padding: 40px;
                     margin: top 350px;
                     border-radius: 30px;
                     background-color:yellowgreen;opacity: 1.3;
                    width: 30%;height: 500px;
                    margin-left: 500px; position: fixed 
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
    
        <center><h1 style="color:yellowgreen" > SUNGLASSSES ADDING  </h1></center>

        <form method="post" enctype="multipart/form-data" action="AddProduct.php"> 
    
    <label for="category">Category</label><br>
    <input type="text" id="category" name="category" placeholder="glasses Category" required><br><br>
 
    <label style="font-size: 1.5rem;" class="textCss" for="details">Details</label><br>
    <textarea name="details" id="details" placeholder="Some details" required></textarea><br><br>
   

    <br>
   
 
    

     
    <label style="font-size: 1.5rem;" class="textCss" for="price">Price</label><br>
    <input type="text" id="price" name="price" placeholder="Price" required><br><br>
     
    <label style="font-size: 1.5rem;" class="textCss" for="photo">Photo</label><br>
    <input type="file" id="photo" name="photo" required><br><br>
 
     <label style="font-size: 1.5rem;" class="textCss" for="stock">stock</label><br>
    <input type="text" id="stock" name="stock" placeholder="Stock" required><br><br>
     
    
    <input type="submit" value="Add Sunglasses "><i class='far fa-arrow-alt-circle-down'></i>
</form>

    </body>
</html>