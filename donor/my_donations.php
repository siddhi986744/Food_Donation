<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

require_once "../config/db.php";

$donor_id = $_SESSION['user_id'];

/* ✅ FIXED: donation_id instead of id */
$query = "SELECT * FROM food_donations 
WHERE donor_id = '$donor_id' 
ORDER BY donation_id DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Donations | FeedConnect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">

<style>
body{
background:
radial-gradient(circle at 15% 20%, rgba(34,197,94,0.10), transparent 35%),
linear-gradient(135deg,#f0fff4,#ffffff);
}

.page-header{
background:linear-gradient(135deg,#16a34a,#22c55e);
color:#fff;
padding:50px 0 70px;
border-radius:0 0 30px 30px;
}

.table-card{
border-radius:22px;
box-shadow:0 25px 60px rgba(0,0,0,0.12);
overflow:hidden;
background:#fff;
}

.table thead{
background:#111827;
color:#fff;
}

.table tbody tr:hover{
background:#f0fff4;
}

.badge{
font-size:0.85rem;
padding:6px 10px;
border-radius:8px;
}
</style>
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<section class="page-header text-center">
<div class="container">
<h1 class="fw-bold">📋 My Donations</h1>
<p class="mb-0">Track the status of your submitted food donations</p>
</div>
</section>

<div class="container py-5">

<div class="d-flex justify-content-between align-items-center mb-4">
<h4 class="fw-bold mb-0">Donation History</h4>

<a href="donate.php" class="btn btn-success">
➕ Add New Donation
</a>
</div>

<div class="table-card p-4">

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead>
<tr>
<th>ID</th>
<th>Food</th>
<th>Quantity</th>
<th>Location</th>
<th>Expiry</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){

echo "<tr>";

/* ✅ FIXED: donation_id instead of id */
echo "<td>#".$row['donation_id']."</td>";

echo "<td>".$row['food_name']."</td>";
echo "<td>".$row['quantity']."</td>";
echo "<td>".$row['location']."</td>";
echo "<td>".$row['expiry_time']."</td>";

if($row['status']=="available"){
echo "<td><span class='badge bg-warning text-dark'>Available</span></td>";
}
elseif($row['status']=="accepted"){
echo "<td><span class='badge bg-success'>Accepted</span></td>";
}
else{
echo "<td><span class='badge bg-secondary'>Delivered</span></td>";
}

echo "</tr>";

}

}
else{

echo "<tr>
<td colspan='6' class='text-center'>No donations found</td>
</tr>";

}

?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>