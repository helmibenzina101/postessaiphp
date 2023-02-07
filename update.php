<!DOCTYPE html>
<head>
    <title>shopify</title>
</head>
<body>
  
<h1> shopify</h1>

<form action="save.php" method="post">
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

        // select the record with the specified ID
        $sql = "SELECT * FROM produit WHERE id=".$_REQUEST["id"];
    
        if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $pname = $row["name"];
            $pprice = $row["price"];
            $pqte = $row["qte"];

    
        } else {
        echo "Error selecting record: " . mysqli_error($conn);
        }

        echo 'ID: <input type="text" name="id" value="'.$_REQUEST["id"].'"><br>';
        echo 'Name: <input type="text" name="name" value="'.$pname.'"><br>';
        echo 'Price: <input type="text" name="price" value="'.$pprice.'"><br>';
        echo 'Qte: <input type="text" name="qte" value="'.$pqte.'"><br>';

        mysqli_close($conn);
    ?>
    <input type="submit">
</form>
</body>
</html>