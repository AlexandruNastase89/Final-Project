<?php
  include "../partials/header.php";

  $query = "SELECT * FROM users";
  $resultUserId = mysqli_query($db_conn, $query);
  //$rowUserId = $resultUserId->fetch_array();

  if( $user_access == "0" || $user_access == "1") :
?>

    <div class="container mt-5">
      <h2 class="text-center">List users</h1>

      <div class="row mt-5">
        <div class="col-md-12">
          <?php
            if (isset($_GET["userPromoted"]) && $_GET["userPromoted"] == 2) {
              echo '<div class="alert alert-success text-center">The user was promoted!</div>';
            } elseif (isset($_GET["userPromoted"]) && $_GET["userPromoted"] == 0) {
              echo '<div class="alert alert-warning text-center">Action not allowed!</div>';
            } elseif (isset($_GET["userPromoted"]) && $_GET["userPromoted"] == 1) {
              echo '<div class="alert alert-warning text-center">User already promoted!</div>';
            }

            if(isset($_GET["userDemoted"]) && $_GET["userDemoted"] == 1) {
              echo '<div class="alert alert-success text-center">The user was demoted!</div>';
            } elseif (isset($_GET["userDemoted"]) && $_GET["userDemoted"] == 2) {
              echo '<div class="alert alert-warning text-center">User already demoted!</div>';
            } elseif (isset($_GET["userDemoted"]) && $_GET["userDemoted"] == 0) {
              echo '<div class="alert alert-warning text-center">Action not allowed!</div>';
            }

            if(isset($_GET["userDeleted"]) && $_GET["userDeleted"] == 1) {
              echo '<div class="alert alert-success text-center">The user was removed!</div>';
            } elseif (isset($_GET["userDeleted"]) && $_GET["userDeleted"] == 2) {
              echo '<div class="alert alert-warning text-center">Action not allowed!</div>';
            }
          ?>

          <table class="table table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">User_ID</th>
                <th scope="col">Username</th>
                <th scope="col">User_acces</th>
                <th scope="col">Promote</th>
                <th scope="col">Demote</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <?php while ($rowUserId = $resultUserId->fetch_array()): ?>
            <tbody>
              <tr>
                <td scope="row"><?php echo $rowUserId["user_id"];?></td>
                <td><?php echo $rowUserId["username"];?></td>
                <td><?php echo $rowUserId["user_access"];?></td>
                <td><a class="btn btn-outline-success" href="users-promote.php?user_id=<?php echo $rowUserId["user_id"];?>"><i class="fas fa-chevron-up"></i></a></td>
                <td><a class="btn btn-outline-warning" href="users-demote.php?user_id=<?php echo $rowUserId["user_id"];?>"><i class="fas fa-chevron-down"></i></a></td>
                <td><a class="btn btn-outline-danger" href="users-delete.php?user_id=<?php echo $rowUserId["user_id"];?>"><i class="fas fa-user-minus"></i></a></td>
              </tr>
            <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

<?php
  endif;
  include "../partials/footer.php";
?>
