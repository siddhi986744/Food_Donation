<?php
session_start();
include '../config/db.php';

/* SEARCH */
$search = $_GET['search'] ?? '';

if ($search != '') {
    $query = "SELECT * FROM food_donations
              WHERE status='pending'
              AND (food_name LIKE '%$search%'
              OR location LIKE '%$search%')";
} else {
    $query = "SELECT * FROM food_donations WHERE status='pending'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Available Donations | FeedConnect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">

<style>
body{
font-family:'Poppins',sans-serif;
background:
radial-gradient(circle at 15% 20%, rgba(34,197,94,0.10), transparent 35%),
linear-gradient(135deg,#f0fff4,#ffffff);
}

.page-hero{
background:linear-gradient(135deg,#16a34a,#22c55e);
color:#fff;
padding:60px 0 80px;
border-radius:0 0 30px 30px;
}

.donation-card{
border-radius:22px;
border:none;
transition:.35s;
box-shadow:0 20px 50px rgba(0,0,0,0.10);
}

.donation-card:hover{
transform:translateY(-10px) scale(1.02);
box-shadow:0 30px 70px rgba(0,0,0,0.18);
}

.food-icon{
font-size:42px;
color:#22c55e;
}

.btn-accept{
border-radius:12px;
padding:10px;
font-weight:600;
box-shadow:0 10px 25px rgba(34,197,94,0.35);
}

.empty-box{
background:#fff;
border-radius:20px;
padding:60px 20px;
box-shadow:0 20px 50px rgba(0,0,0,0.10);
}
</style>
</head>

<body>

<?php include '../includes/navbar.php'; ?>

<section class="page-hero text-center">
<div class="container">
<h1 class="fw-bold mb-2">🍱 Available Food Donations</h1>
<p class="mb-0 opacity-75">
Accept donations and help distribute food to those in need
</p>
</div>
</section>

<div class="row mb-4">
<div class="col-md-6 mx-auto">
<form method="GET">
<div class="input-group shadow-sm">
<span class="input-group-text bg-white">
<i class="bi bi-search"></i>
</span>

<input type="text"
name="search"
class="form-control"
placeholder="Search food or location..."
value="<?= htmlspecialchars($search) ?>">

<button class="btn btn-success">Search</button>
</div>
</form>
</div>
</div>

<section class="py-5">
<div class="container">
<div class="row g-4">

<?php if (mysqli_num_rows($result) > 0) { ?>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<div class="col-lg-4 col-md-6">
<div class="card donation-card h-100">
<div class="card-body p-4">

<div class="text-center mb-3">
<i class="bi bi-box-seam food-icon"></i>
</div>

<h5 class="text-success fw-bold text-center mb-3">
<?= $row['food_name']; ?>
</h5>

<p class="small text-muted mb-2">
<strong>Quantity:</strong> <?= $row['quantity']; ?>
</p>

<p class="small text-muted mb-2">
<strong>Expiry:</strong> <?= $row['expiry_time']; ?>
</p>

<p class="small text-muted mb-3">
<strong>Location:</strong> <?= $row['location']; ?>
</p>

<div class="text-center mb-3">
<span class="badge bg-warning text-dark px-3 py-2">
Pending Pickup
</span>
</div>

<div class="d-grid">

<a href="accept_donation.php?id=<?= $row['donation_id']; ?>"
class="btn btn-success btn-accept">

<i class="bi bi-check-circle me-1"></i>
Accept Donation

</a>

</div>

</div>
</div>
</div>

<?php } ?>

<?php } else { ?>

<div class="col-12">
<div class="empty-box text-center">
<i class="bi bi-inbox fs-1 text-muted"></i>
<h5 class="mt-3">No pending donations available</h5>
<p class="text-muted mb-0">
New donations will appear here automatically.
</p>
</div>
</div>

<?php } ?>

</div>
</div>
</section>

<footer class="bg-dark text-white text-center py-3">
<p class="mb-0">© 2026 FeedConnect | Organization Panel</p>
</footer>

</body>
</html>