<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="/Final-Project/home.php"><img src="/Final-Project/assets/img/logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-trigger="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-flex align-items-center justify-content-center">
        <a class="nav-link resize-media-query" href="#">Store</a>
      </li>
      <li class="nav-item custom-menu-divider"></li>
      <li class="nav-item d-flex align-items-center justify-content-center dropdown">
        <a class="nav-link resize-media-query text-nowrap dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">Fans-Only</a>

        <?php
          $user_access = "";
          if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

            $query = "SELECT user_access FROM users WHERE user_id={$_SESSION['user_id']}";
            $result = mysqli_query($db_conn, $query);
            $row = mysqli_fetch_array($result);
            $user_access = $row["user_access"];

            if( $user_access == "0" || $user_access == "1" || $user_access == "2") {
        ?>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
          <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
          <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
        </ul>
        <?php
          }
        }
          if ($user_access == "") {
        ?>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="/Final-Project/login/login-form.php">Please Login</a></li>
        </ul>
        <?php
          }
        ?>
      </li>
      <li class="nav-item custom-menu-divider"></li>
      <li class="nav-item d-flex align-items-center justify-content-center">
        <a class="nav-link resize-media-query" href="#">Wiki</a>
      </li>
      <li class="nav-item custom-menu-divider"></li>


      <?php
        if($user_access == "0" || $user_access == "1") {
      ?>

      <div class="button-group d-flex">
        <li class="nav-item">
          <a class="btn btn-outline-success rounded resize-media-query" id="custom-menu-button" href="/Final-Project/admin/admin.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger rounded resize-media-query text-nowrap" id="custom-menu-button" href="/Final-Project/login/logout.php">Sign Out</a>
        </li>
      </div>

      <?php
        } elseif ($user_access == "2") {
      ?>

      <div class="button-group d-flex">
        <li class="nav-item">
          <a class="btn btn-outline-success rounded resize-media-query mobile-margin-left" id="custom-menu-button" href="/Final-Project/home.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger rounded resize-media-query mobile-margin-left" id="custom-menu-button" href="/Final-Project/login/logout.php">Sign Out</a>
        </li>
      </div>
      <?php

      } else {
      ?>
      <div class="button-group d-flex">
        <li class="nav-item">
          <a class="btn btn-outline-success rounded resize-media-query mobile-margin-left" id="custom-menu-button" href="/Final-Project/login/register-form.php">Sign Up</a>
        </li>
      </div>
      <?php
        }
      ?>
    </ul>

  </div>
</nav>
