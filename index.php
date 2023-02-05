<!DOCTYPE html>
<head>
    <title>shopify</title>
    <style>
h1 {
  font-weight: bold;
  text-align: center;
  font-size: 64px;
}
        body {
            font-family: Arial, sans-serif;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        form input[type="text"], form input[type="number"] {
            padding: 10px;
            margin: 10px 0;
        }
        form input[type="submit"] {
            padding: 10px 20px;
            background-color: lightblue;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: lightgray;
        }
        a {
            color: red;
            text-decoration: none;
        }
    </style>
</head>
<body>
  
<h1> shopify</h1>


<form action="add.php" method="post">
Name: <input type="text" name="name"><br>
price: <input type="text" name="price"><br>
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

// Check if the delete button is clicked
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  // Delete the record with the specified ID
  $sql = "DELETE FROM produit WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
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
  echo "<th>Action</th>";
  echo "</tr>";
  // Output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>" . $row["qte"] . "</td>";
    echo "<td><a href='?delete=" . $row["id"] . "'>Delete</a></td>";
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