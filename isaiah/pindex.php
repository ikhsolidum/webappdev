<?php
include 'pdb.php';
include 'navigationbar.php';

$sql = "SELECT * FROM products ORDER BY price ASC";
$result = mysqli_query($conn, $sql);
?>

<html>
  <head>
    <style>
      table {
        color: black;
      }
      </style>
      
<div style="padding-left:650px">
    <h1>Product Lists</h1>
</div>

<div style="padding-left: 180px">
    <table bgcolor="white" border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                
                <a href="pedit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="pdelete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
            </td>
        </tr>
        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="5">No records found</td>
        </tr>
        <?php
        }
        ?>
        </div>
    </table>
    <br>
    <form action="padd.php">
    <button type="submit">Add Product</button>
    </form>

    
</body>
</html>