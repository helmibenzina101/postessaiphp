


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
$pname=$_POST["name"];
$pprice=$_POST["price"];
$pqte=$_POST["qte"];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO produit (id, name, price, qte) VALUES (NULL,'$pname','$pprice', '$pqte')";



if (mysqli_query($conn, $sql)) 
{
  echo "new record created successfully";
} 
else 
{
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

sleep(3);
header("Location: index.php");
exit;

?>