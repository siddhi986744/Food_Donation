<?php
session_start();
include "../config/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$donor_id = $_SESSION['user_id'];

$food_name   = $_POST['food_name'];
$quantity    = $_POST['quantity'];
$expiry_time = $_POST['expiry_time'];
$location    = $_POST['location'];


$query = "INSERT INTO food_donations
(food_name, quantity, expiry_time, location, donor_id, status)
VALUES
('$food_name', '$quantity', '$expiry_time', '$location', '$donor_id', 'pending')";

mysqli_query($conn, $query);


header("Location: donate.php?success=1");
exit();
?>