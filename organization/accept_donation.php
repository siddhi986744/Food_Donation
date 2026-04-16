<?php
session_start();
include '../config/db.php';

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$id = $_GET['id'];

// UPDATE donation
mysqli_query($conn,
"UPDATE food_donations 
SET status='accepted' 
WHERE donation_id='$id'");

// redirect back
header("Location: dashboard.php");
exit();
?>