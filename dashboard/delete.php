<?php
include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $value=$_GET['id'];
       $data=$conn->prepare("DELETE FROM users WHERE id='$value'");
        $data->execute();
        header("Location:http://localhost/FORM-PROJECT/dashboard/tables.php");
}
?>