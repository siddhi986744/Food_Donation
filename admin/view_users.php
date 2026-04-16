<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

include "../config/db.php";

// ✅ FIXED QUERY
$query = "SELECT id, name, email, role FROM users";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin - View Users | FeedConnect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="../css/style.css">

<style>
body{
  background:
    radial-gradient(circle at 10% 20%, rgba(34,197,94,0.10), transparent 35%),
    linear-gradient(135deg,#f0fff4,#ffffff);
}
.page-header{
  background:linear-gradient(135deg,#111827,#1f2937);
  color:#fff;
  padding:50px 0 70px;
  border-radius:0 0 30px 30px;
}
.table-card{
  border-radius:22px;
  box-shadow:0 25px 60px rgba(0,0,0,0.12);
  background:#fff;
  overflow:hidden;
}
.table thead{
  background:#111827;
  color:#fff;
}
.table tbody tr:hover{
  background:#f0fff4;
}
.badge{
  font-size:0.85rem;
  padding:6px 10px;
  border-radius:8px;
}
</style>
</head>

<body>

<?php include "../includes/navbar.php"; ?>

<section class="page-header text-center">
  <div class="container">
    <h1 class="fw-bold">
      <i class="fa-solid fa-users me-2"></i>
      All Registered Users
    </h1>
    <p class="mb-0">Admin can view donors, organizations, and admins</p>
  </div>
</section>

<div class="container py-5">

  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <h4 class="fw-bold mb-0">User List</h4>
    <a href="dashboard.php" class="btn btn-secondary">
      <i class="fa-solid fa-arrow-left me-1"></i> Back to Dashboard
    </a>
  </div>

  <div class="table-card p-4">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">

        <thead>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
          </tr>
        </thead>

        <tbody>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";

                // ✅ FIXED HERE
                echo "<td class='fw-bold'>#{$row['id']}</td>";

                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";

                if ($row['role'] == 'admin') {
                    echo "<td><span class='badge bg-danger'>Admin</span></td>";
                } elseif ($row['role'] == 'organization') {
                    echo "<td><span class='badge bg-warning text-dark'>Organization</span></td>";
                } else {
                    echo "<td><span class='badge bg-success'>Donor</span></td>";
                }

                echo "</tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='4' class='text-center py-4'>
                      <i class='bi bi-inbox fs-4 d-block mb-2'></i>
                      No users found
                    </td>
                  </tr>";
        }
        ?>

        </tbody>
      </table>
    </div>
  </div>

</div>

</body>
</html>