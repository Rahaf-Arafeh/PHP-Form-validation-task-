
<?php
$servername = "localhost";
// $username = "rahaf";
// $password = "lubluk863@123";
$username="root";
$dbname = "store";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<!-- $stmt->rowCount()
 -->