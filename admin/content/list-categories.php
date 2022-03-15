<?php
  include "../partials/header.php";

  $query = "SELECT * FROM categories";
  $result = mysqli_query($db_conn, $query);
  $ascendingId = 1;
  mysqli_close($db_conn);
  if( $user_access == "0" || $user_access == "1") :
?>

    <div class="container mt-5">
      <h2 class="text-center">List categories</h1>

      <div class="row mt-5">
        <div class="col-md-12">
          <?php
            if (isset($_GET["categoryUpdated"]) && $_GET["categoryUpdated"] == 1) {
              echo '<div class="alert alert-info text-center">The category was updated successful!</div>';}

            if(isset($_GET["categoryDeleted"]) && $_GET["categoryDeleted"] == 1) {
              echo '<div class="alert alert-danger text-center">The category was deleted successful!</div>';}
          ?>

          <table class="table table-hover text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_array()): ?>
              <tr>
                <th scope="row"><?php echo $ascendingId++; //echo $row["category_id"];?></th>
                <td><?php echo $row["category_name"];?></td>
                <td><?php echo $row["category_description"];?></td>
                <td><a class="btn btn-outline-primary" href="edit-categories.php?category_id=<?php echo $row["category_id"];?>">Edit</a></td>
                <td><a class="btn btn-outline-danger" href="delete-categories.php?category_id=<?php echo $row["category_id"];?>">Delete</a></td>
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
