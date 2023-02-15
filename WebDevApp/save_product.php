<?php include 'productlists.php'; ?>

<h1>Add Product</h1>

<form action="save_product.php" method="POST">
  <label for="name">Name:</label>
  <input type="text" name="name" required>

  <label for="description">Description:</label>
  <textarea name="description" required></textarea>

  <label for="price">Price:</label>
  <input type="number" name="price" step="0.01" required>

  <button type="submit">Save</button>
</form>