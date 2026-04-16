<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}
include "../config/db.php";
$users_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$users = mysqli_fetch_assoc($users_query)['total'];
$donations_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM food_donations");
$donations = mysqli_fetch_assoc($donations_query)['total'];
$pending_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM food_donations WHERE status='' ");
$pending = mysqli_fetch_assoc($pending_query)['total'];
$accepted_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM food_donations WHERE status='accepted'");
$accepted = mysqli_fetch_assoc($accepted_query)['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard | FeedConnect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<style>
body{
  background:
    radial-gradient(circle at 10% 20%, rgba(34,197,94,0.10), transparent 35%),
    linear-gradient(135deg,#f0fff4,#ffffff);
}

.admin-header{
  background:linear-gradient(135deg,#111827,#1f2937);
  color:#fff;
  padding:50px 0 70px;
  border-radius:0 0 30px 30px;
}

.startup-card{
  border-radius:22px;
  padding:28px;
  color:#fff;
  text-align:center;
  box-shadow:0 25px 60px rgba(0,0,0,0.18);
  transition:.3s;
}

.startup-card:hover{
  transform:translateY(-6px);
}

.startup-card h3{
  font-size:2.2rem;
  font-weight:700;
}

.gradient-green{background:linear-gradient(135deg,#16a34a,#22c55e);}
.gradient-blue{background:linear-gradient(135deg,#00cfe8,#0077b6);}
.gradient-orange{background:linear-gradient(135deg,#ff9f43,#ff6f00);}
.gradient-purple{background:linear-gradient(135deg,#7367f0,#4834d4);}

.chart-card{
  border-radius:22px;
  padding:30px;
  box-shadow:0 25px 60px rgba(0,0,0,0.12);
  background:#fff;
}
</style>
</head>
<body>
<?php include "../includes/navbar.php"; ?>

<section class="admin-header text-center">
  <div class="container">
    <h1 class="fw-bold">🛠 Admin Dashboard</h1>
    <p class="mb-0">Manage users, donations and system activity</p>
  </div>
</section>

<div class="container py-5">

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
  <h4 class="fw-bold mb-0">System Overview</h4>
  <div>
    <a href="view_users.php" class="btn btn-success">👥 View Users</a>
    <a href="view_donations.php" class="btn btn-success">📦 View Donations</a>
  </div>
</div>

<div class="row g-4">

<div class="col-md-3">
<div class="startup-card gradient-green">
<i class="bi bi-people fs-2"></i>
<h3><?= $users ?></h3>
<p>Total Users</p>
</div>
</div>

<div class="col-md-3">
<div class="startup-card gradient-blue">
<i class="bi bi-box-seam fs-2"></i>
<h3><?= $donations ?></h3>
<p>Total Donations</p>
</div>
</div>

<div class="col-md-3">
<div class="startup-card gradient-orange">
<i class="bi bi-hourglass-split fs-2"></i>
<h3><?= $pending ?></h3>
<p>Pending Pickups</p>
</div>
</div>

<div class="col-md-3">
<div class="startup-card gradient-purple">
<i class="bi bi-check-circle fs-2"></i>
<h3><?= $accepted ?></h3>
<p>Accepted</p>
</div>
</div>

</div>

<div class="row mt-5">
<div class="col-lg-8 mx-auto">
<div class="chart-card">
<h5 class="mb-4 fw-bold">📊 Donation Overview</h5>
<canvas id="donationChart"></canvas>
</div>
</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('donationChart');

new Chart(ctx, {
type: 'bar',
data: {
labels: ['Total Donations', 'Pending', 'Accepted'],
datasets: [{
data: [<?= $donations ?>, <?= $pending ?>, <?= $accepted ?>],
backgroundColor: ['#00cfe8','#ff9f43','#28c76f'],
borderRadius: 10
}]
},
options: {
responsive: true,
plugins: { legend: { display:false } }
}
});
</script>

</body>
</html>