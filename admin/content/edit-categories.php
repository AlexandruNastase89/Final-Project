<?php
ob_start();
include "../partials/header.php";

if(isset($_GET["category_id"])){
  $categoryId = $_GET["category_id"];
  if(isset($_POST["submit_new_name"])){
    $newName = addslashes($_POST["category_name"]);
    $newDescription = addslashes($_POST["category_description"]);
    $updateCategory = "UPDATE categories SET category_name = '$newName', category_description = '$newDescription' WHERE category_id = $categoryId;";
    if (!empty($newName)) {
      $result = mysqli_query($db_conn,$updateCategory);
      header("Location: list-categories.php?categoryUpdated=1");
    }
  }
  $query = "SELECT * FROM categories WHERE category_id = $categoryId;";
  $result = mysqli_query($db_conn, $query);
  $rows = $result->fetch_array();
  mysqli_close($db_conn);
}

if( $user_access == "0" || $user_access == "1") :
?>

<div class="container mt-5">
  <h2 class="text-center">Edit category</h1>
  <div class="row mt-5">
    <div class="col-md-12">
      <?php
      if (isset($_POST["submit_new_name"]) and empty($newName)) {
        echo '<div class="alert alert-danger text-center">Please input a category name!</div>';
      }
      ?>
      <form action="" method="post">
        <div class="form-group mt-3">
          <label class="mb-3" for="exampleFormControlInput1">New name *</label>
          <input name="category_name" type="text" class="form-control" value="<?php echo $rows["category_name"]; ?>">
        </div>
        <div class="form-group mt-3">
          <label class="mt-3 mb-3" for="exampleFormControlInput1">New description</label>
          <input name="category_description" type="text" class="form-control" value="<?php echo $rows["category_description"]; ?>">
        </div>

        <button class="btn btn-outline-primary mt-5" name="submit_new_name" type="submit">Edit Category</button>
      </form>
    </div>
  </div>
</div>

<?php
  endif;
  include "../partials/footer.php";
  ob_end_flush();
?>
