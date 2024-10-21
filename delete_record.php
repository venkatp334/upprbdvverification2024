<?php
include('db.php'); // Include your database connection file

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete query
    $query = "DELETE FROM members_sign WHERE id = $id";
    if(mysqli_query($con, $query)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
