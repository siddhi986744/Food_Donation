<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register | FeedConnect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
*{font-family:'Poppins',sans-serif}

body{
    margin:0;
    min-height:100vh;
}


.auth-wrap{
    display:flex;
    min-height:100vh;
}


.auth-left{
    flex:1.3;
    background:
        linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.55)),
        url('https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?auto=format&fit=crop&w=1600&q=80');
    background-size:cover;
    background-position:center;
    color:#fff;
    display:flex;
    align-items:center;
    padding:70px;
}

.left-box{
    max-width:480px;
}

.left-box h1{
    font-size:44px;
    font-weight:700;
    line-height:1.2;
}

.left-box p{
    margin-top:18px;
    font-size:16px;
    opacity:.95;
}


.auth-right{
    flex:1;
    background:#f8fafc;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:40px;
}


.register-card{
    width:100%;
    max-width:420px;
    border-radius:22px;
    padding:42px 36px;
    position:relative;
    overflow:hidden;

    background: linear-gradient(
        145deg,
        #ffffff 0%,
        #f0fff4 100%
    );

    box-shadow:
        0 35px 80px rgba(0,0,0,0.30),
        inset 0 1px 0 rgba(255,255,255,0.6);

    transition:.35s ease;
}

.register-card:hover{
    transform: translateY(-5px);
}


.brand{
    font-weight:700;
    color:#16a34a;
    font-size:26px;
}


.form-control,
.form-select{
    border-radius:12px;
    padding:12px;
}

.form-control:focus,
.form-select:focus{
    border-color:#22c55e;
    box-shadow:0 0 0 3px rgba(34,197,94,0.15);
}


.btn-register{
    background:linear-gradient(135deg,#16a34a,#22c55e);
    border:none;
    border-radius:12px;
    padding:13px;
    font-weight:600;
    transition:.25s;
}

.btn-register:hover{
    transform:translateY(-2px);
    box-shadow:0 14px 28px rgba(34,197,94,0.4);
}

@media(max-width:900px){
    .auth-left{display:none;}
}
</style>
</head>

<body>

<div class="auth-wrap">

<!-- LEFT VISUAL -->
<div class="auth-left">
<div class="left-box">
<h1>Join The Mission<br>Feed More Lives</h1>
<p>
Create your FeedConnect account and become part of the
smart food redistribution network.
</p>
</div>
</div>


<div class="auth-right">

<div class="register-card text-center">

<div class="brand mb-4">Create Account</div>

<form method="POST" action="process_register.php">


<div class="mb-3 text-start">
<label>Register As</label>
<select name="role" class="form-select" required>
<option value="">Select role</option>
<option value="donor">Donor</option>
<option value="organization">Organization</option>
</select>
</div>

<!-- NAME -->
<div class="mb-3 text-start">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<!-- EMAIL -->
<div class="mb-3 text-start">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<!-- PASSWORD -->
<div class="mb-3 text-start">
<label>Password</label>
<input type="password"
       name="password"
       id="password"
       class="form-control"
       pattern="^(?=.*[0-9])[A-Z][A-Za-z0-9]{7,}$"
       title="Password must start with a capital letter, include at least one number, and be minimum 8 characters."
       required>

<small class="text-muted">
Password must start with a capital letter and include at least one number (minimum 8 characters).
</small>
</div>

<div class="mb-4 text-start">
<label>Confirm Password</label>
<input type="password"
       id="confirm_password"
       class="form-control"
       required>
</div>

<button class="btn btn-register w-100">
🚀 Create Account
</button>

<p class="mt-3">
Already have an account?
<a href="login.php" class="fw-bold text-success">Login</a>
</p>

</form>

</div>

</div>

</div>

<script>
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirm_password");

confirmPassword.addEventListener("input", function () {

if(password.value !== confirmPassword.value){
confirmPassword.setCustomValidity("Passwords do not match");
}else{
confirmPassword.setCustomValidity("");
}

});
</script>

</body>
</html>