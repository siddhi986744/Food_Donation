<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


include_once __DIR__ . '/../config/db.php';

$available_count = 0;

if (isset($_SESSION['role']) && $_SESSION['role'] == 'organization') {
    $q = mysqli_query($conn,
        "SELECT COUNT(*) AS total 
         FROM food_donations 
         WHERE status='available'"
    );
    $available_count = mysqli_fetch_assoc($q)['total'];
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid px-4">

 
    <a class="navbar-brand fw-bold text-success"
       href="/FOOD-DONATION/index.php">
      FeedConnect
    </a>

    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-auto align-items-lg-center">

        <li class="nav-item">
          <a class="nav-link" href="/FOOD-DONATION/index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/FOOD-DONATION/about.php">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/FOOD-DONATION/contact.php">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/FOOD-DONATION/how-it-works.php">
            How It Works
          </a>
        </li>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'donor'): ?>
        <li class="nav-item">
          <a class="nav-link" href="/FOOD-DONATION/donor/donate.php">
            Donate Food
          </a>
        </li>
        <?php endif; ?>

        
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'organization'): ?>
        <li class="nav-item ms-3">
          <a class="nav-link position-relative"
             href="/FOOD-DONATION/organization/view_donations.php">

            <i class="bi bi-bell fs-5"></i>

            <?php if($available_count > 0): ?>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?= $available_count ?>
              </span>
            <?php endif; ?>

          </a>
        </li>
        <?php endif; ?>

      
        <?php if(isset($_SESSION['user_id'])): ?>

        
          <li class="nav-item ms-3">
            <span class="nav-link fw-bold text-success">
              <?= ucfirst($_SESSION['role']); ?>
            </span>
          </li>

        
          <li class="nav-item ms-2">
            <a class="btn btn-danger btn-sm px-3"
               href="/FOOD-DONATION/auth/logout.php">
              Logout
            </a>
          </li>

        <?php else: ?>

      
          <li class="nav-item ms-3">
            <a class="btn btn-outline-success btn-sm px-3"
               href="/FOOD-DONATION/auth/register.php">
              Register
            </a>
          </li>

          <li class="nav-item ms-2">
            <a class="btn btn-success btn-sm px-3"
               href="/FOOD-DONATION/auth/login.php">
              Login
            </a>
          </li>

        <?php endif; ?>

      </ul>

    </div>
  </div>
</nav>
