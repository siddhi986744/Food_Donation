<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'donor') {
    header("Location: ../auth/login.php");
    exit();
}

include '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

$donor_id = $_SESSION['user_id'];

/* ✅ TOTAL DONATIONS */
$total_query = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM food_donations 
WHERE donor_id='$donor_id'");
$total = mysqli_fetch_assoc($total_query)['total'];

/* ✅ AVAILABLE (PENDING) */
$pending_query = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM food_donations 
WHERE donor_id='$donor_id' AND status='available'");
$pending = mysqli_fetch_assoc($pending_query)['total'];

/* ✅ ACCEPTED */
$accepted_query = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM food_donations 
WHERE donor_id='$donor_id' AND status='accepted'");
$accepted = mysqli_fetch_assoc($accepted_query)['total'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Donor Dashboard | FeedConnect</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../css/style.css">

<style>
*{font-family:'Poppins',sans-serif}

body{
background:
radial-gradient(circle at 15% 20%, rgba(34,197,94,0.12), transparent 35%),
linear-gradient(135deg,#f0fff4,#ffffff);
}

.dash-hero{
background:linear-gradient(135deg,#16a34a,#22c55e);
color:#fff;
padding:60px 0 80px 0;
border-radius:0 0 35px 35px;
}

.stat-card{
border-radius:22px;
padding:28px;
color:#fff;
box-shadow:0 25px 60px rgba(0,0,0,0.18);
transition:.3s;
}

.stat-card:hover{
transform:translateY(-6px);
}

.stat-card h3{
font-weight:700;
font-size:2.2rem;
}

.bg-total{
background:linear-gradient(135deg,#16a34a,#22c55e);
}

.bg-pending{
background:linear-gradient(135deg,#f59e0b,#fbbf24);
}

.bg-accepted{
background:linear-gradient(135deg,#3b82f6,#60a5fa);
}

.action-card{
background:#fff;
border-radius:22px;
padding:30px;
box-shadow:0 25px 60px rgba(0,0,0,0.12);
}

.btn-add{
background:linear-gradient(135deg,#16a34a,#22c55e);
border:none;
border-radius:14px;
padding:14px 24px;
font-weight:600;
transition:.25s;
}

.btn-add:hover{
transform:translateY(-2px);
box-shadow:0 14px 28px rgba(34,197,94,0.35);
}
</style>
</head>

<body>

<?php include '../includes/navbar.php'; ?>

<section class="dash-hero text-center">
<div class="container">
<h1 class="fw-bold">📊 Donor Dashboard</h1>
<p class="mb-0">Track your food donation impact</p>
</div>
</section>

<div class="container py-5">

<div class="row g-4 mb-4">

<div class="col-md-4">
<div class="stat-card bg-total text-center">
<i class="bi bi-box-seam fs-2"></i>
<h3><?php echo $total; ?></h3>
<p>Total Donations</p>
</div>
</div>

<div class="col-md-4">
<div class="stat-card bg-pending text-center">
<i class="bi bi-hourglass-split fs-2"></i>
<h3><?php echo $pending; ?></h3>
<p>Available</p>
</div>
</div>

<div class="col-md-4">
<div class="stat-card bg-accepted text-center">
<i class="bi bi-check-circle fs-2"></i>
<h3><?php echo $accepted; ?></h3>
<p>Accepted</p>
</div>
</div>

</div>

<div class="action-card text-center">
<h4 class="fw-bold mb-2">Want to donate more food?</h4>
<p class="text-muted">Add a new donation and help someone today.</p>

<a href="donate.php" class="btn btn-add me-2">
➕ Add New Donation
</a>

<a href="my_donations.php" class="btn btn-add">
📋 My Donations
</a>
</div>

</div>

</body>
</html>