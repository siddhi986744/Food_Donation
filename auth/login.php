<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | FeedConnect</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

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
url('https://images.unsplash.com/photo-1504754524776-8f4f37790ca0');
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
font-size:46px;
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

.login-card{
width:100%;
max-width:380px;
border-radius:22px;
padding:44px 38px;
position:relative;
overflow:hidden;

background:linear-gradient(145deg,#ffffff 0%,#f0fff4 100%);

box-shadow:
0 35px 80px rgba(0,0,0,0.30),
inset 0 1px 0 rgba(255,255,255,0.6);

transition:all .35s ease;
}

.login-card::before{
content:'';
position:absolute;
top:0;
left:-120%;
width:60%;
height:100%;
background:linear-gradient(120deg,transparent,rgba(255,255,255,0.45),transparent);
transform:skewX(-25deg);
transition:all .6s ease;
}

.login-card:hover{
transform:translateY(-6px) scale(1.01);
box-shadow:
0 45px 100px rgba(0,0,0,0.40),
inset 0 1px 0 rgba(255,255,255,0.7);
}

.login-card:hover::before{
left:130%;
}

.brand{
font-weight:700;
color:#16a34a;
font-size:26px;
}

.input-group-text{
background:#f1f5f9;
border-radius:12px 0 0 12px;
}

.form-control{
border-radius:0 12px 12px 0;
padding:12px;
}

.form-control:focus{
border-color:#22c55e;
box-shadow:0 0 0 3px rgba(34,197,94,0.15);
}

.btn-login{
background:linear-gradient(135deg,#16a34a,#22c55e);
border:none;
border-radius:12px;
padding:13px;
font-weight:600;
transition:.25s;
}

.btn-login:hover{
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

<div class="auth-left">
<div class="left-box">
<h1>Turn Extra Food<br>Into Someone’s Meal</h1>
<p>
FeedConnect connects donors and organizations to reduce food waste
and deliver meals to communities in need.
</p>
</div>
</div>

<div class="auth-right">

<div class="login-card text-center">

<div class="brand mb-4">FeedConnect</div>

<?php if(isset($_GET['error'])): ?>

<div class="alert alert-danger text-center py-2">

<?php
if($_GET['error']=="wrong_password"){
echo "❌ Wrong Password!";
}
elseif($_GET['error']=="user_not_found"){
echo "❌ User not found!";
}
?>

</div>

<?php endif; ?>

<form method="POST" action="process_login.php">

<div class="mb-3 text-start">
<label>Email</label>
<div class="input-group">
<span class="input-group-text">
<i class="bi bi-envelope"></i>
</span>
<input type="email" name="email" class="form-control" required>
</div>
</div>

<div class="mb-4 text-start">
<label>Password</label>
<div class="input-group">
<span class="input-group-text">
<i class="bi bi-lock"></i>
</span>
<input type="password" name="password" class="form-control" required>
</div>
</div>

<button class="btn btn-login w-100">
🚀 Login
</button>

<p class="mt-3">
New user?
<a href="register.php" class="fw-bold text-success">Create account</a>
</p>

</form>

</div>

</div>

</div>

</body>
</html>