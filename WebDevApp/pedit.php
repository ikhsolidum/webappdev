<?php
include 'pdb.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM productlists WHERE id=$id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE productlists SET name='$name', description='$description', price=$price WHERE id=$id";
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
    <title>Edit Product</title>
</head>
<body>

    <h1>Edit Product</h1>

    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
        
        <label>Description:</label><br>
        <textarea name="description"><?php echo $row['description']; ?></textarea><br>
       
        <label>Price:</label><br>
        <input type="number" name="price" value="<?php echo $row['price']; ?>"><br><br>
        <input type="submit" value="Save">
       
    </form>
</body>
</html>