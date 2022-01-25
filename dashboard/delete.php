<?php
include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $value=$_GET["id"];
    $value2=$_GET["name"];
    if($value2=="product"){
       $data=$conn->prepare("DELETE FROM products WHERE id='$value'");
       $data->execute();
    }
    else if($value2=="category"){
        $sql="Delete FROM products WHERE category_id='$value'";
        $result=$conn->prepare($sql);
        $result->execute();
        $sql1="Delete FROM categories WHERE id='$value'";
        $result=$conn->prepare($sql1);
        $result->execute();
    }
    else{
        $data=$conn->prepare("DELETE FROM users WHERE id='$value'");
        $data->execute();
    }
        header("Location:http://localhost/FORM-PROJECT/dashboard/tables.php");
}

// if ($_SERVER["REQUEST_METHOD"] == "GET")
// {
//     $value=$_GET['id'];
//        $data=$conn->prepare("DELETE FROM products WHERE id='$value'");
//         $data->execute();
//         header("Location:http://localhost/FORM-PROJECT/dashboard/tables.php");
// }
?>