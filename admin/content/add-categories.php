<?php
  include "../partials/header.php";

  $categoryAdded = "";
  $categoryNameErr = "";
  if (isset($_POST["submit"])) {
    $name = addslashes($_POST['category_name']);
    $description = addslashes($_POST['category_description']);

    if(!empty($name)) {
      $sql = "INSERT INTO categories(category_name,category_description) VALUES ('$name','$description')";
      if (mysqli_query($db_conn, $sql)) {
        $categoryAdded = 1;
      } else {
        echo "Error: " . $sql . "" . mysqli_error($db_conn);
      }
    } else {
      $categoryNameErr = 1;
    }
    mysqli_close($db_conn);
  }
  if( $user_access == "0" || $user_access == "1") :
?>

    <div class="container mt-5">
      <h2 class="text-center">Create new category</h2>

      <div class="row mt-5">
        <form class="col-md-12" action="add-categories.php" method="post">
          <?php
            if ($categoryAdded == 1) {
              echo '<div class="alert alert-success text-center">The category was added successful!</div>';
            }

            if ($categoryNameErr == 1) {
              echo '<div class="alert alert-danger text-center">Please input a category name!</div>';
            }
          ?>
          <div class="form-group mt-3">
            <label class="mb-3" for="categoryName">Category name *</label>
            <input name="category_name" type="text" class="form-control" id="categoryName">
          </div>
          <div class="form-group mt-3">
            <label class="mt-3 mb-3" for="categoryDescription">Add description</label>
            <input name="category_description" type="text" class="form-control" id="categoryDescription">
          </div>
          <button class="btn btn-outline-primary mt-3" name="submit" type="submit">Create Category</button>
        </form>
      </div>
    </div>


<?php
  endif;
  include '../partials/footer.php';
?>
