<!DOCTYPE html>
<html lang="en">
  <?php
  include "../db.php";
  ?>
<head>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $productName=$_POST['create_product_name'];
        $productImg=$_POST['create_product_image'];
        $price=$_POST['create_price'];
        $quantity=$_POST['create_quantity_instock'];
        $description=$_POST['create_description'];
        $category=$_POST['category'];
        $sql =("INSERT INTO products (product_name, product_img , price,quantity_instock,description,category_id)
         VALUES ('$productName','$productImg','$price','$quantity','$description',$category)");
        $conn->exec($sql);
        header("Location:http://localhost/FORM-PROJECT/dashboard/tables.php");
}




?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create Products</h1>
                            </div>
                            <form class="user" method="POST">
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Product name" name="create_product_name">
                                    </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Product image" name="create_product_image">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="`number`" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Price" name="create_price">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Quantity in stock"
                                             name="create_quantity_instock">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Description"
                                             name="create_description">
                                    </div>
                                    <div class="col-sm-6">
                                       <select name='category'>
                                           <option value=''>Pick Category</option>
                                    <?php
                                        $data=$conn->prepare("SELECT * FROM categories");
                                        $data->execute();
                                        foreach($data as $element){
                                        echo "<option value='$element[id]'>$element[category_name]</option>";
                                    }
                                    ?>
                                    </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Create User
                                 </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>