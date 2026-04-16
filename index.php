<?php
include 'config/db.php';
$donation_count = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM food_donations")
)['total'];
$org_count = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role='organization'")
)['total'];
$people_fed = $donation_count * 5;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FeedConnect | Food Donation System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>

body{
font-family:'Poppins',sans-serif;
}


.hero{
padding:120px 0;
background:
linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0.55)),
url("https://images.unsplash.com/photo-1533777324565-a040eb52facd");
background-size:cover;
background-position:center;
}

.hero h1 span{
color:#28c76f;
}

.btn-primary-custom{
background:linear-gradient(135deg,#28c76f,#1e9e5a);
color:#fff;
padding:14px 38px;
border-radius:50px;
font-weight:600;
border:none;
box-shadow:0 12px 30px rgba(40,199,111,0.45);
transition:all .3s ease;
}

.btn-primary-custom:hover{
transform:translateY(-3px);
box-shadow:0 18px 40px rgba(40,199,111,0.65);
color:#fff;
}


.feature-card{
background:#fff;
border-radius:18px;
padding:30px 25px;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
transition:.3s;
height:100%;
}

.feature-card:hover{
transform:translateY(-8px);
box-shadow:0 18px 40px rgba(0,0,0,0.2);
}


.story-img{
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.2);
}


.how-card{
background:#f8f9fa;
border-radius:18px;
padding:35px 25px;
transition:.3s;
height:100%;
}

.how-card:hover{
transform:translateY(-6px);
background:#fff;
box-shadow:0 12px 30px rgba(0,0,0,0.15);
}

.how-emoji{
font-size:2.5rem;
margin-bottom:10px;
}

.stat-box{
background:#fff;
border-radius:16px;
padding:25px;
box-shadow:0 8px 25px rgba(0,0,0,0.1);
}

#loader{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:#fff;
display:flex;
align-items:center;
justify-content:center;
z-index:9999;
}

</style>
</head>

<body>

<div id="loader">
<div class="spinner-border text-success"></div>
</div>

<?php include 'includes/navbar.php'; ?>


<section class="hero text-center text-white">
<div class="container">

<h1 class="fw-bold display-5">
Donate Extra Food,<br>
<span>Feed Someone Today</span>
</h1>

<p class="mt-3">
FeedConnect connects surplus food with organizations to reduce food waste
and bring smiles to students and communities.
</p>

<div class="mt-4">

<a href="auth/register.php" class="btn btn-primary-custom me-3">
✨ Register
</a>

<a href="auth/login.php" class="btn btn-primary-custom">
🔐 Login
</a>

</div>

</div>
</section>

<section class="py-5">
<div class="container">

<div class="row text-center g-4">

<div class="col-md-3">
<div class="feature-card">
<i class="bi bi-clock-history display-5 text-success"></i>
<h5 class="mt-3">Real-Time Donations</h5>
<p class="text-muted">Track donations instantly.</p>
</div>
</div>

<div class="col-md-3">
<div class="feature-card">
<i class="bi bi-shield-check display-5 text-success"></i>
<h5 class="mt-3">Verified Organizations</h5>
<p class="text-muted">Only trusted organizations.</p>
</div>
</div>

<div class="col-md-3">
<div class="feature-card">
<i class="bi bi-people display-5 text-success"></i>
<h5 class="mt-3">Role-Based Access</h5>
<p class="text-muted">Admin, Donor & Organization.</p>
</div>
</div>

<div class="col-md-3">
<div class="feature-card">
<i class="bi bi-heart-fill display-5 text-success"></i>
<h5 class="mt-3">Social Impact</h5>
<p class="text-muted">Spreading happiness.</p>
</div>
</div>

</div>

</div>
</section>

<section class="py-5 bg-light">
<div class="container">

<div class="row align-items-center g-5">

<div class="col-md-6">
<img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" class="img-fluid story-img">
</div>

<div class="col-md-6">
<h2 class="fw-bold">Why FeedConnect Matters</h2>

<p class="text-muted mt-3">
Students from different backgrounds rely on food donations every day.
FeedConnect ensures they receive nutritious meals with dignity.
</p>

<p class="text-muted">
Together, donors and organizations create a future where no food is wasted.
</p>

</div>

</div>

</div>
</section>


<section class="py-5">
<div class="container text-center">

<h2 class="fw-bold mb-4">How It Works</h2>

<div class="row g-4">

<div class="col-md-4">
<div class="how-card">
<div class="how-emoji">🍱</div>
<h5>1. Donor Submits Food</h5>
<p class="text-muted">Food details and pickup location added.</p>
</div>
</div>

<div class="col-md-4">
<div class="how-card">
<div class="how-emoji">🏫</div>
<h5>2. Organization Accepts</h5>
<p class="text-muted">Nearby organizations accept donations.</p>
</div>
</div>

<div class="col-md-4">
<div class="how-card">
<div class="how-emoji">😄</div>
<h5>3. Food Distributed</h5>
<p class="text-muted">Students receive food happily.</p>
</div>
</div>

</div>

</div>
</section>

<section class="py-5 bg-light">
<div class="container">

<h2 class="text-center fw-bold mb-5">📊 Our Impact</h2>

<div class="row text-center g-4">

<div class="col-md-4">
<div class="stat-box">
<h2 class="text-success fw-bold counter"><?= $donation_count ?></h2>
<p>Total Donations</p>
</div>
</div>

<div class="col-md-4">
<div class="stat-box">
<h2 class="text-success fw-bold counter"><?= $org_count ?></h2>
<p>Organizations</p>
</div>
</div>

<div class="col-md-4">
<div class="stat-box">
<h2 class="text-success fw-bold counter"><?= $people_fed ?></h2>
<p>People Fed</p>
</div>
</div>

</div>

</div>
</section>

<?php include 'includes/footer.php'; ?>
<script>


window.onload = function(){
  document.getElementById("loader").style.display = "none";
}


let counterStarted = false;

window.addEventListener("scroll", function(){

  const section = document.querySelector(".counter");

  if(!section) return;

  const sectionTop = section.getBoundingClientRect().top;
  const screenHeight = window.innerHeight;

  if(sectionTop < screenHeight && !counterStarted){

    counterStarted = true;

    const counters = document.querySelectorAll(".counter");

    counters.forEach(counter => {

      let start = 0;
      const end = parseInt(counter.innerText);

      const interval = setInterval(() => {

        start++;
        counter.innerText = start;

        if(start >= end){
          clearInterval(interval);
        }

      }, 40);

    });

  }

});

</script>
</body>
</html>