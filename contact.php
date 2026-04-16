<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact | FeedConnect</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .contact-section {
      padding: 100px 0;
    }

    .contact-image {
      border-radius: 22px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .contact-highlight {
      background: #f8f9fa;
      padding: 40px;
      border-radius: 20px;
    }

    .contact-highlight h4 {
      font-weight: 600;
    }

    .contact-link {
      display: block;
      font-size: 1.1rem;
      margin-bottom: 10px;
      color: #198754;
      text-decoration: none;
      font-weight: 500;
    }

    .contact-link:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

<?php include 'includes/navbar.php'; ?>

<section class="contact-section">
  <div class="container">

    <div class="row align-items-center g-5">

      <div class="col-md-6">
        <img
          src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac"
          class="img-fluid contact-image"
          alt="Students sharing food">
      </div>

      <div class="col-md-6">

        <h1 class="fw-bold mb-3">Let’s Talk</h1>

        <p class="text-muted mb-4">
          FeedConnect is built for people who care about reducing food waste
          and helping others.  
          If you want to collaborate, ask questions, or support the mission —
          we’re just one message away.
        </p>

        <div class="contact-highlight">
          <h4 class="mb-3">Reach Us Directly</h4>

          <a class="contact-link" href="mailto:feedconnect@gmail.com">
            📧 feedconnect@gmail.com
          </a>

          <a class="contact-link" href="tel:+919876543210">
            📞 +91 9137431520
          </a>

          <p class="mt-3 mb-0 text-muted">
            📍 Mumbai, Maharashtra, India
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
