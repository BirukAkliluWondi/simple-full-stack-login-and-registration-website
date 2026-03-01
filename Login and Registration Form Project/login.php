<?php
include("db.php");
session_start();
// REGISTER
if(isset($_POST["register"])){ // Fixed typo
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // ✅ Correct here
    $role=$_POST["role"];
    // Check if email exists
    $check_sql = "SELECT email FROM registration_table WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_sql);
    
    if(mysqli_num_rows($check_result) > 0){ // ✅ Check if email already exists
        $_SESSION["register_error"]="Email is already registered";
        $_SESSION["active_form"]="register";
    } else {
        // Insert new user - with proper quotes
        $insert_sql = "INSERT INTO registration_table (name, email, password) 
                       VALUES ('$name', '$email', '$password',$role)";
        
        
    }
    header("Location:index.php");
        exit();
}

// LOGIN
if(isset($_POST["login"])){
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $user_password = $_POST["password"]; // ✅ Store plain password for verification
    
    // Get user from database
    $sql = "SELECT * FROM registration_table WHERE email = '$email'"; // ✅ Fixed table name
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        
        // ✅ Verify password against stored hash
        if(password_verify($user_password, $user['password'])){
            // Password correct - start session
            
            $_SESSION['user'] = $user;
            $_SESSION["email"]=$email;
          if($user["role"==="admin"]){
            header("Location:admin_page.php");
          }
          else{
            header("Location:user_page.php");
          }             // Redirect to dashboard
            exit();
            }  }
 $_SESSION["login_error"]="Incorrect email or password";
 $_SESSION["active_form"]="login";
 header("Location:index.php");
 exit();
}
?>  

