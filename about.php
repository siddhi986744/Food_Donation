<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us | FeedConnect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .about-hero {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                  url("https://images.unsplash.com/photo-1529156069898-49953e39b3ac");
      background-size: cover;
      background-position: center;
      padding: 100px 0;
    }

    .info-card {
      background: #fff;
      border-radius: 18px;
      padding: 30px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      height: 100%;
    }
  </style>
</head>

<body>

<?php include 'includes/navbar.php'; ?>


<section class="about-hero text-white text-center">
  <div class="container">
    <h1 class="fw-bold">About FeedConnect</h1>
    <p class="mt-3">
      A food donation redistribution platform with a social purpose
    </p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">

      <div class="col-md-6">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836"
             class="img-fluid rounded shadow">
      </div>

      <div class="col-md-6">
        <h2 class="fw-bold">Our Story</h2>
        <p class="text-muted mt-3">
          FeedConnect was created to solve a simple but serious problem:
          food wastage and hunger existing at the same time.
        </p>
        <p class="text-muted">
          By connecting donors with organizations, we ensure surplus food
          reaches people who truly need it.
        </p>
      </div>

    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="row text-center g-4">

      <div class="col-md-4">
        <div class="info-card">
          <i class="bi bi-bullseye display-6 text-success"></i>
          <h5 class="mt-3">Our Mission</h5>
          <p class="text-muted">
            Reduce food waste and feed people through technology.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-card">
          <i class="bi bi-eye display-6 text-success"></i>
          <h5 class="mt-3">Our Vision</h5>
          <p class="text-muted">
            A future where no edible food is wasted.
          </p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="info-card">
          <i class="bi bi-heart-fill display-6 text-success"></i>
          <h5 class="mt-3">Our Impact</h5>
          <p class="text-muted">
            Helping students and communities through food sharing.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>


<footer class="bg-dark text-white text-center py-3">
  <p class="mb-0">© 2026 FeedConnect</p>
</footer>

</body>
</html>
