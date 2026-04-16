<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'donor') {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Donate Food | FeedConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
  *{font-family:'Poppins',sans-serif}

  body{
    background:
      radial-gradient(circle at 15% 20%, rgba(34,197,94,0.15), transparent 35%),
      radial-gradient(circle at 85% 80%, rgba(16,185,129,0.12), transparent 35%),
      linear-gradient(135deg,#f0fff4,#ffffff);
  }


  .donate-hero{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    color:#fff;
    padding:70px 0 110px 0;
    border-radius:0 0 40px 40px;
  }

 
  .donate-card{
    background:rgba(255,255,255,0.92);
    backdrop-filter:blur(10px);
    border-radius:24px;
    padding:40px;
    margin-top:-80px;
    box-shadow:
      0 40px 90px rgba(0,0,0,0.18),
      0 0 0 1px rgba(34,197,94,0.15);
    transition:.35s ease;
  }

  .donate-card:hover{
    transform:translateY(-6px);
  }

  .input-group-text{
    background:#f1f5f9;
    border-radius:12px 0 0 12px;
  }

  .form-control{
    border-radius:0 12px 12px 0;
    padding:13px;
  }

  .form-control:focus{
    border-color:#22c55e;
    box-shadow:0 0 0 3px rgba(34,197,94,0.15);
  }

  .btn-donate{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    border:none;
    border-radius:14px;
    padding:15px;
    font-weight:600;
    font-size:1.05rem;
    transition:.25s;
  }

  .btn-donate:hover{
    transform:translateY(-2px);
    box-shadow:0 18px 35px rgba(34,197,94,0.35);
  }
  </style>
</head>

<body>

<?php include '../includes/navbar.php'; ?>


<section class="donate-hero text-center">
  <div class="container">
    <h1 class="fw-bold">🍱 Share Food, Spread Smiles</h1>
    <p class="mb-0">Your small donation can feed many people in need</p>
  </div>
</section>


<section class="py-5">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-8">

       
        <?php if (isset($_GET['success'])): ?>
        <div class="position-fixed top-0 end-0 p-3" style="z-index:9999;">
          <div class="toast show align-items-center text-bg-success border-0">
            <div class="d-flex">
              <div class="toast-body fw-semibold">
                ✅ Donation submitted successfully!
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto"
                      data-bs-dismiss="toast"></button>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <div class="donate-card">

          <h4 class="text-center fw-bold text-success mb-4">
            Donation Information
          </h4>

          <form method="POST" action="submit_donation.php">

            <div class="row">

              
              <div class="col-md-6 mb-3">
                <label class="form-label">Food Name</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-egg-fried"></i></span>
                  <input type="text" name="food_name" class="form-control" required>
                </div>
              </div>

             
              <div class="col-md-6 mb-3">
                <label class="form-label">Quantity</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-box"></i></span>
                  <input type="text" name="quantity" class="form-control" required>
                </div>
              </div>

            
              <div class="col-md-6 mb-3">
                <label class="form-label">Expiry Time</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-clock"></i></span>
                  <input type="datetime-local" name="expiry_time" class="form-control" required>
                </div>
              </div>

              
              <div class="col-md-6 mb-3">
                <label class="form-label">Pickup Location</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                  <input type="text" name="location" class="form-control" required>
                </div>
              </div>

            </div>

            <button type="submit" class="btn btn-donate w-100 mt-3">
              🚀 Submit Donation
            </button>

          </form>

        </div>

      </div>
    </div>

  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php if (isset($_GET['success'])): ?>
<script>
  setTimeout(function () {
    window.location.href = "dashboard.php";
  }, 2500); 
</script>
<?php endif; ?>

</body>
</html>
