<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
require_once "../config/db.php";
$query = "SELECT food_donations.*, users.name AS donor_name
          FROM food_donations
          LEFT JOIN users ON food_donations.donor_id = users.id
          ORDER BY donation_id DESC";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin - All Donations | FeedConnect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="../css/style.css">
<style>
body{
  background:
    radial-gradient(circle at 10% 20%, rgba(34,197,94,0.10), transparent 35%),
    linear-gradient(135deg,#f0fff4,#ffffff);
}

.page-header{
  background:linear-gradient(135deg,#111827,#1f2937);
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
    <h1 class="fw-bold">
      <i class="fa-solid fa-boxes-stacked me-2"></i>
      All Food Donations
    </h1>
    <p class="mb-0">Admin can monitor all donated food</p>
  </div>
</section>

<div class="container py-5">

<div class="table-card p-4">

<div class="table-responsive">
<table class="table table-hover align-middle mb-0">

<thead>
<tr>
<th>ID</th>
<th>Donor</th>
<th>Food</th>
<th>Quantity</th>
<th>Location</th>
<th>Expiry</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<?php
if (mysqli_num_rows($result) > 0) {

while ($row = mysqli_fetch_assoc($result)) {

echo "<tr>";

echo "<td class='fw-bold'>#{$row['donation_id']}</td>";
echo "<td>{$row['donor_name']}</td>";
echo "<td>{$row['food_name']}</td>";
echo "<td>{$row['quantity']}</td>";
echo "<td>{$row['location']}</td>";
echo "<td>{$row['expiry_time']}</td>";

/* Status badges */
if ($row['status'] == 'pending') {
    echo "<td><span class='badge bg-warning text-dark'>Pending</span></td>";
}
elseif ($row['status'] == 'accepted') {
    echo "<td><span class='badge bg-success'>Accepted</span></td>";
}
else {
    echo "<td><span class='badge bg-secondary'>Delivered</span></td>";
}

echo "</tr>";

}

}
else {

echo "<tr>
<td colspan='7' class='text-center py-4'>
<i class='bi bi-inbox fs-4 d-block mb-2'></i>
No donations found
</td>
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