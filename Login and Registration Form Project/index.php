<?php
session_start();
$errors=[
    "login"=>$_SESSION["login_error"]??'',
    "register"=>$_SESSION["register_error"]??''
];
$activeForm=$_SESSION["active_form"]??"login";
session_unset();
function showError($error){
    return !empty($error)?"<p class='error-message'>$error</p>":'';

}
function isActiveForm($formName,$activeForm){
    return $formName===$activeForm ?'active':'';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoorya Expenses - Smart Expense Tracking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- ── Landing / Hero section ──────────────────────────────────────────────── -->
   

    <header class="hero">
        <div class="hero-content">
            <h1>Zoorya Expenses</h1>
            <p class="tagline">Track every birr with ease • Understand your spending • Take control of your finances</p>
            
            <div class="hero-features">
                <div class="feature">
                    <span class="icon">₿</span>
                    <p>Quick Ethiopian Calendar support</p>
                </div>
                <div class="feature">
                    <span class="icon">📊</span>
                    <p>Clear monthly & yearly reports</p>
                </div>
                <div class="feature">
                    <span class="icon">🔒</span>
                    <p>Private & secure – your data stays yours</p>
                </div>
            </div>

            <p class="hero-subtitle">Get started in seconds – sign in or create your free account</p>
        </div>
    </header>

    <!-- ── Login / Register forms (unchanged) ───────────────────────────────────── -->
    <div class="container">
        <div class="form-box <?= isActiveForm("login",$activeForm); ?>" id="login-form">
         <form action="login.php" method="post">
           <h2>Login</h2>
           <?= showError($errors['login']);?>
           <input type="email" name="email" placeholder="Email" required>
           <input type="password" name="password" placeholder="Password" required>
           <button type="submit" name="login">Login</button>
           <p>Don't have an account?<a href="#" onclick='showform("register-form")'>Register</a></p>
        </form>
        </div>
     <div class="form-box <?= isActiveForm("register",$activeForm) ?>" id="register-form">
         <form action="login.php" method="post">
            <h2>Register</h2>
            <?= showError($errors['register']); ?>
            <input type="text" name="name" placeholder="Name" required>
           <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Password" required>
          <select name="role" required>
             <option value="">--Select Role---</option>
             <option value="user">User</option>
             <option value="admin">Admin</option>
          </select>
           <button type="submit" name="register">Register</button>
           <p>Already have an account<a href="#" onclick="showform('login-form')">Login</a></p>
        </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>