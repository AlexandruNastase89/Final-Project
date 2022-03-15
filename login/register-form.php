<?php
include("../partials/header.php");
include("register.php");
?>

    <div class="wrapper">
      <div class="container custom-register-container-background">
        <h2 class="text-center">Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <?php
              if (!empty($password_err)) {
                echo '<div class="alert alert-danger mt-2" role="alert">'.$password_err.'</div>';
              }
            ?>
          </div>
          <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <?php
              if (!empty($confirm_password_err)) {
                echo '<div class="alert alert-danger mt-2" role="alert">'.$confirm_password_err.'</div>';
              }
            ?>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
          </div>
          <p>Already have an account? <a href="login-form.php">Login here</a>.</p>
        </form>
      </div>
    </div>

<?php include("../partials/footer.php"); ?>
