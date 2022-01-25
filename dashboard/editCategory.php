<?php 
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
$edit=$_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
       $data=("SELECT * FROM categories WHERE id='$edit'");
        $result=$conn->query($data);
        $row=$result->fetch(PDO::FETCH_ASSOC);
}
?>
   <?php
   if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       $data=("UPDATE categories SET `category_name`='$_POST[edit_category_name]' WHERE id='$edit'");
        $stmt=$conn->prepare($data);
        $stmt->execute();
        header("Location:http://localhost/FORM-PROJECT/dashboard/tables.php");
    }
?>  
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Edit Category Information</h1>
                                    </div>
                                    <form class="user" method="POST">
                                    <div class="form-group">
                                        <label>Category Name:</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Category name" name="edit_category_name" value='<?php echo "$row[category_name]"; ?>'>
                                    </div>
                                        </div>
                                        <!-- <a class="btn btn-primary btn-user btn-block">
                                            Edit
                                        </a> -->
                                        <button type='submit' class="btn btn-primary btn-user btn-block">
                                            Edit
                                          </button>
                                    </form>
                                </div>
                            </div>
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