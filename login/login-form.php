<?php
include("../partials/header.php");
include("login.php");
?>

    <div class="wrapper">

      <?php
      if (isset($_GET["accountCreated"]) && $_GET["accountCreated"] == 1) {
        echo
          '<div class="container custom-register-confirm">
            <div class="alert alert-success text-center mt-5">Your account was created!</div>
          </div>';
      }
      ?>

      <div class="container custom-register-container-background">
        <h2 class="text-center">Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <?php
              if (!empty($username_err)) {
                echo '<div class="alert alert-danger mt-2" role="alert">'.$username_err.'</div>';
              }
            ?>
          </div>
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?php
              if (!empty($password_err)) {
                echo '<div class="alert alert-danger mt-2" role="alert">'.$password_err.'</div>';
              }
            ?>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Login">
          </div>
          <p>Don't have an account? <a href="register-form.php">Sign up now</a>.</p>
        </form>
      </div>
    </div>

<?php include("../partials/footer.php"); ?>
