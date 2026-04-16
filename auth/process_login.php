<?php
session_start();
include "../config/db.php";

/* ✅ ONLY POST ALLOWED */
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: login.php");
    exit();
}

/* ✅ GET FORM DATA */
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

/* ✅ FIND USER */
$sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    /* ✅ PASSWORD CHECK */
    if ($password == $row['password']) {

        // ✅ SESSION SET (FIXED LINE)
        $_SESSION['user_id'] = $row['id'];   // 🔥 IMPORTANT FIX
        $_SESSION['role'] = $row['role'];
        $_SESSION['name'] = $row['name'];

        /* ✅ ROLE REDIRECT */

        // ADMIN
        if ($row['role'] == 'admin') {
            header("Location: ../admin/dashboard.php");
            exit();
        }

        // DONOR
        elseif ($row['role'] == 'donor') {
            header("Location: ../donor/dashboard.php");
            exit();
        }

        // ORGANIZATION
        elseif ($row['role'] == 'organization') {
            header("Location: ../organization/dashboard.php");
            exit();
        }

        // DEFAULT
        else {
            header("Location: ../index.php");
            exit();
        }

    } else {
        // ❌ WRONG PASSWORD
        header("Location: login.php?error=wrong_password");
        exit();
    }

} else {
    // ❌ USER NOT FOUND
    header("Location: login.php?error=user_not_found");
    exit();
}
?>