<?php
include("../partials/header.php");

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login-form.php");
    exit;
}
?>

    <div class="wrapper">
      <div class="container custom-register-container-background text-center">
        <div class="page-header">
          <h1>Welcome to our site.</h1>
        </div>
        <p>
          <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
          <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        </p>
      </div>
    </div>

<?php include("../partials/footer.php"); ?>
