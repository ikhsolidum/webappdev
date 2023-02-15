<?php
include 'pdb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', $price)";
    if (mysqli_query($conn, $sql)) {
        header('Location: pindex.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Product</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
</head>

    <h1>Add Product</h1>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name"><br>
        <label>Description:</label><br>
        <textarea name="description"></textarea><br>
        <label>Price:</label><br>
        <input type="number" name="price"><br><br>
        <input type="submit" value="Add">

        </form>
    
    <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>   
</body>
</html>