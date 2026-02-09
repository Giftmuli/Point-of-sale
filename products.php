<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-5.3.7-dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="bootstrap-5.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Point of sale</title>
</head>
<body>
<?php include 'links.php'; ?>

<div class="container mt-4">
      <div class="card">
        <div class="card-header">
           New Products
           <?php
           if(isset($_POST['save'])){
               $product_code=$_POST['product_code'];
               $product_name=$_POST['product_name'];
               $quantity=$_POST['quantity'];
               $buying_price=$_POST['buying_price'];
               $selling_price=$_POST['selling_price'];
               $new_product=mysqli_query($dbcon,"INSERT INTO products
               (product_code,product_name,quantity,buying_price,selling_price)
               VALUES('$product_code','$product_name','$quantity','$buying_price','$selling_price')");

               if($new_product){
                echo'Success, product created';
               }
                else{
                    echo'Error, product not created';
                }
           }
           ?>



         </div>
         <div class="card-body">
             <form method="post">
                 <div class="mb-3">
                        <label>Product Name:</label>
                            <input type="text" name="product_name" class="form-control">
                 </div>
                    <div class="mb-3">
                            <label>Product Code:</label>
                                <input type="text" name="product_code" class="form-control">
                    </div>
                    <div class="mb-3">
                            <label>Quantity:</label>
                                <input type="number" name="quantity" class="form-control">
                    </div>
                    <div class="mb-3">
                            <label>Buying Price(Ksh):</label>
                                <input type="number" name="buying_price" class="form-control">
                    </div>
                    <div class="mb-3">
                            <label>Selling Price(Ksh):</label>
                                <input type="number" name="selling_price" class="form-control">
                    </div>
                    <div class="d-grid">
                            <input type="submit" name="save" value="Save" class="btn btn-primary">
                </form>
         </div>
</div>
    

</body>
</html>