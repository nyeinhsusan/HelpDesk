<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
     <!-- font aweson cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
         body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px;
        color:blue; }
        .BtnBtn{
            display:flex;
            justify-content: end;
            column-gap: 1rem;
        }
        .signUp-btn {
  background-color: rgb(23, 43, 25);
  color: var(--text-color);
  padding: 0.7rem 1.4rem;
  margin-right: 20px;
  border-radius: 0.5rem;
  font-weight: 400;
}
    </style>
</head>
<body>
    <!-- header part start -->

 <!-- header -->
    <div class="sticky-container">
        <header>
        <a href="" class="logo">
           <i class="fa-brands fa-ubuntu"></i>HelpDesk System
        </a>
        <!-- <ul class="navbar">
            <li><a href="#" class="active">CAll</a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
        </ul> -->
       <div class="BtnBtn">
        <button class="signUp-btn"><a href="signup.php">Sign Up</a></button>
<button class="signUp-btn"><a href="sign_in.php">Sign In</a></button>

       </div>
    </header>
</div>
  <div class="container d-flex justify-content-center align-item-center mt-5 ">
    <div class="card rounded-4" style="width: 25rem; color:blue ">
        <div class="card-body">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="email" name="username" class="form-control ">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control ">
            </div>
        <?php

require_once "db_connection.php";

// Check if the form is submitted and the 'loginBtn' key is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($conn, $sql);

    // Check if the query was successful and if there are results
    if ($query && mysqli_num_rows($query) > 0) {
        // Login successful
        header("location:./callinfo.php");
    } else {
        // Login failed, display an error message
        echo "<p style='color: red;'>Incorrect username or password.</p>";
    }
}
?>


            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login" name="loginBtn">
            </div>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
        </form>
    </div>
    </div>
  </div>

  <!-- footer start  -->

        <div class="footer mt-5">
            <p>@copyright:nyeinhsusan.155@gmail.com</p>
        </div>
        <!-- footer end  -->
</body>
</html>
