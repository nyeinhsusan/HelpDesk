<?php
// Include config file
require_once "db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<span class='invalid-feedback'>Password does not match</span>";
    } else {
        $sql = "INSERT INTO users(username, password) VALUES('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            // echo "hello";
            header("location:./sign_in.php");
        }
    }
}

?>

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
    <div class="sticky-container mb-5 ">
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
         <button class="signUp-btn"><a href="sign_in.php">Sing In</a></button>
       </div>
    </header>
</div>
<div class="container d-flex justify-content-center align-item-center mt-5">
    <div class="card rounded-4" style="width: 25rem; color:blue ">
        <div class="card-body">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form method="post">
            <div class="form-group mb-3">
                <label>Username</label>
                <input type="email" name="username" class="form-control ">

            </div>
            <div class="form-group mb-3 ">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="submit" class="btn btn-primary" value="SignUp">
            </div>
            <p>Already have an account? <a href="./sign_in.php">Login here</a>.</p>
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
