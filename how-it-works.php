<!DOCTYPE html>
<html lang="en">
<head>
  <title>How It Works | FeedConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">

  <style>
  body{
    font-family:'Poppins',sans-serif;
    background:
      radial-gradient(circle at 15% 20%, rgba(34,197,94,0.10), transparent 35%),
      linear-gradient(135deg,#f0fff4,#ffffff);
  }

 
  .how-hero{
    background: linear-gradient(135deg,#16a34a,#22c55e);
    color:#fff;
    padding:60px 0 80px;
    border-radius:0 0 30px 30px;
  }


  .step-card{
    border:none;
    border-radius:22px;
    padding:30px 20px;
    transition:all .35s ease;
    box-shadow:0 20px 50px rgba(0,0,0,0.10);
    background:#fff;
    position:relative;
  }

  .step-card:hover{
    transform:translateY(-10px) scale(1.03);
    box-shadow:0 30px 70px rgba(0,0,0,0.18);
  }

  .step-icon{
    font-size:48px;
    color:#22c55e;
  }

  .flow-arrow{
    font-size:42px;
    color:#22c55e;
    animation: bounceDown 1.5s infinite;
  }

  @keyframes bounceDown{
    0%,100%{ transform:translateY(0); }
    50%{ transform:translateY(10px); }
  }

  .why-box{
    background:#fff;
    border-radius:18px;
    padding:25px;
    transition:all .3s ease;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
  }

  .why-box:hover{
    transform:translateY(-6px);
    box-shadow:0 25px 60px rgba(0,0,0,0.15);
  }
  </style>
</head>
<body>

<?php include 'includes/navbar.php'; ?>


<section class="how-hero text-center">
  <div class="container">
    <h1 class="fw-bold mb-2">⚙️ How FeedConnect Works</h1>
    <p class="mb-0 opacity-75">
      A simple and transparent process to reduce food waste and help people
    </p>
  </div>
</section>


<section class="py-5">
  <div class="container text-center">

  
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="step-card">
          <i class="bi bi-box-seam step-icon"></i>
          <h4 class="mt-3 fw-bold">Step 1: Food Donation</h4>
          <p class="text-muted">
            Donors submit surplus food details including quantity,
            expiry time and pickup location.
          </p>
        </div>
      </div>
    </div>


    <div class="my-4">
      <i class="bi bi-arrow-down flow-arrow"></i>
    </div>


    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="step-card">
          <i class="bi bi-building step-icon"></i>
          <h4 class="mt-3 fw-bold">Step 2: Organization Acceptance</h4>
          <p class="text-muted">
            Registered organizations review available donations
            and accept them based on urgency and location.
          </p>
        </div>
      </div>
    </div>

  
    <div class="my-4">
      <i class="bi bi-arrow-down flow-arrow"></i>
    </div>


    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="step-card">
          <i class="bi bi-heart-fill step-icon"></i>
          <h4 class="mt-3 fw-bold">Step 3: Food Distribution</h4>
          <p class="text-muted">
            Organizations collect the food and distribute it
            safely to people in need.
          </p>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">✨ Why This System Is Effective</h2>

    <div class="row text-center g-4">

      <div class="col-md-3">
        <div class="why-box">
          <i class="bi bi-speedometer2 fs-1 text-success"></i>
          <p class="mt-3 fw-semibold">Fast & Efficient</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="why-box">
          <i class="bi bi-shield-check fs-1 text-success"></i>
          <p class="mt-3 fw-semibold">Trusted Organizations</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="why-box">
          <i class="bi bi-geo-alt fs-1 text-success"></i>
          <p class="mt-3 fw-semibold">Location-Based Pickup</p>
        </div>
      </div>

      <div class="col-md-3">
        <div class="why-box">
          <i class="bi bi-people fs-1 text-success"></i>
          <p class="mt-3 fw-semibold">Community Driven</p>
        </div>
      </div>

    </div>
  </div>
</section>

<footer class="bg-dark text-white text-center py-3">
  <p class="mb-0">© 2026 FeedConnect | Simple Process, Real Impact</p>
</footer>

</body>
</html>
