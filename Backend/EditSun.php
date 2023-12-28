<?php

include 'Sunny.php';


$productObj = new Sunny();


if(isset($_GET['editId'])){    
    $editId = $_GET['editId'];
    $product = $productObj->displayRecordById($editId);
}


if(isset($_POST['update'])){
    $productObj->updateRecord($_POST);
}
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
    
        <center><h1 style="color:yellowgreen" > SUNGLASSES EDITING  </h1></center>

        <form method="post" enctype="multipart/form-data" action="EditSun.php?editId=<?php echo $editId ?>" required> 
    
    <input  type="hidden" id="id_produit" name="id_produit" value="<?php echo $product["id_produit"] ?>" required><br>
                
                <label class="h6" for="">Category</label><br>
                <input class="w-100" type="text" id="category" name="category" value="<?php echo $product["category"] ?>" required><br>
                

                <label class="h6" for="">Details</label><br>
                <textarea class="w-100"  type="textarea" id="details" name="details" value="" required>
                    <?php echo $product["details"] ?></textarea><br>
              
                <br>


                <label class="h6" for="photo">Photo</label><br>
                <input type="file" class="form-control-file" id="photo" name="photo" ><br>
                <img src="<?php echo $product["photo"] ?>" alt="" style="width:50px;height:50px"><br> 
               

                <label class="h6" for="">Price</label><br>
                <input class="w-100" type="text" id="price" name="price" value="<?php echo $product["price"] ?>" required><br>

                <label class="h6" for="">Stock</label><br>
                <input class="w-100" type="text" id="stock" name="stock" value="<?php echo $product["stock"] ?>" required><br>


                <br>
                <input class="btn mb-1 btn-success ml-1 w-100" type="submit" value="Update" name="update">
                </form>

        </div>
        <div class="col"></div>
        <div class="col"></div>


     
</div>















    
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>