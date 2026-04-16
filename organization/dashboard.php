<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'organization') {
    header("Location: ../auth/login.php");
    exit();
}

include '../config/db.php';

$org_id = $_SESSION['user_id'];


$pending = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM food_donations WHERE status='available'"))['total'];

$accepted = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT COUNT(*) AS total FROM food_donations WHERE status='accepted'"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Organization Dashboard | FeedConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/style.css">

  <style>
  body{
    font-family:'Poppins',sans-serif;
    background:
      radial-gradient(circle at 15% 20%, rgba(34,197,94,0.12), transparent 35%),
      linear-gradient(135deg,#f0fff4,#ffffff);
  }

  .org-hero{
    background: linear-gradient(135deg,#16a34a,#22c55e);
    color:#fff;
    padding:60px 0 80px;
    border-radius:0 0 30px 30px;
  }

  .stat-card{
    border-radius:22px;
    padding:30px 20px;
    color:#fff;
    font-weight:600;
    transition:all .35s ease;
    box-shadow:0 20px 45px rgba(0,0,0,0.12);
  }

  .stat-card:hover{
    transform:translateY(-8px) scale(1.02);
    box-shadow:0 30px 65px rgba(0,0,0,0.18);
  }

  .grad-warning{
    background:linear-gradient(135deg,#f59e0b,#fbbf24);
  }

  .grad-success{
    background:linear-gradient(135deg,#22c55e,#16a34a);
  }

  .action-box{
    border-radius:24px;
    padding:40px;
    background:#fff;
    box-shadow:0 25px 60px rgba(0,0,0,0.12);
    text-align:center;
  }

  .btn-premium{
    padding:14px 32px;
    border-radius:14px;
    font-weight:600;
    font-size:1.05rem;
    box-shadow:0 10px 25px rgba(34,197,94,0.35);
    transition:all .25s ease;
  }

  .btn-premium:hover{
    transform:translateY(-2px);
    box-shadow:0 18px 40px rgba(34,197,94,0.45);
  }
  </style>
</head>

<body>

<?php include '../includes/navbar.php'; ?>

<section class="org-hero text-center">
  <div class="container">
    <h1 class="fw-bold mb-2">
      🏢 Organization Dashboard
    </h1>
    <p class="mb-0 opacity-75">
      Manage and accept food donations efficiently
    </p>
  </div>
</section>

<div class="container py-5">


  <div class="row g-4 mb-5">

    <div class="col-md-6">
      <div class="stat-card grad-warning text-center">
        <i class="bi bi-hourglass-split fs-1 mb-2"></i>
        <h2 class="fw-bold"><?php echo $pending; ?></h2>
        <p class="mb-0">Pending Donations</p>
      </div>
    </div>

    <div class="col-md-6">
      <div class="stat-card grad-success text-center">
        <i class="bi bi-check-circle fs-1 mb-2"></i>
        <h2 class="fw-bold"><?php echo $accepted; ?></h2>
        <p class="mb-0">Accepted Donations</p>
      </div>
    </div>

  </div>


  <div class="action-box">

    <h4 class="fw-bold mb-2">Browse Available Food</h4>
    <p class="text-muted mb-4">
      View and accept donations from generous donors.
    </p>

    <a href="view_donations.php" class="btn btn-success btn-premium">
      <i class="bi bi-box-seam me-2"></i>
      View Available Donations
    </a>

  </div>

</div>

</body>
</html>
