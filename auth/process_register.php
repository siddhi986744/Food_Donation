<?php
include "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $sql = "INSERT INTO users (name, email, password, role)
            VALUES ('$name', '$email', '$password', '$role')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Database Error: " . mysqli_error($conn);
    }
}
?>
