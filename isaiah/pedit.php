<?php
include 'pdb.php';
include 'navigationbar.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM products WHERE id=$id";
  $result = mysqli_query($conn, $sql);
if (!$result) {
  echo "Error: " . mysqli_error($conn);
}
else {
  $row = mysqli_fetch_assoc($result);
}
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if ($stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE id=?")) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name='$name', description='$description', price=$price WHERE id=$id";
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
   
<div style="padding-left:670px">
    <h1>Edit Product</h1>
</div>

<div style="padding-left:500px">
<table bgcolor="white" border="2">
    <form method="POST">
    <tr>
            <th>Name:</th>
            <th>Description:</th>
            <th>Price:</th>
        </tr>
        <td>
        <input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
        
        <td>
        <textarea name="description"><?php echo $row['description']; ?></textarea></td>
       
        <td>
        <input type="number" name="price" value="<?php echo $row['price']; ?>"></td>
       
      
    </div>
</table>
<br>
<input type="submit" value="Save">
</form>
</body>
</html>