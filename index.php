<!DOCTYPE html>
<head>
    <title>shopify</title>
</head>
<body>


<form action="add.php" method="post">
Name: <input type="text" name="name"><br>
price: <input type="number" name="price"><br>
qte: <input type="number" name="qte"><br>
<input type="submit">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, price, qte FROM produit";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<table border='1'>";
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>Name</th>";
  echo "<th>Price</th>";
  echo "<th>Quantity</th>";
  echo "</tr>";
  // Output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>" . $row["qte"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
</body>
</html>