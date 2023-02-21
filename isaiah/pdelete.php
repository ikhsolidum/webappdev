<?php
include 'pdb.php';

if(isset($_GET['id'])) {
    // rest of the code
    $id = $_GET['id'];
$sql = "DELETE FROM products WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    header('Location: pindex.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
} else {
    $id = 0;
    $id = mysqli_stmt_execute($conn, $_GET['id']);    
$sql = "DELETE FROM products WHERE id=$id";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
if (mysqli_stmt_execute($stmt)) {
    header('Location: pindex.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_stmt_close($stmt);

    // handle the case where "id" is not set in the URL
}

?>