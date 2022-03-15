<?php

include($_SERVER["DOCUMENT_ROOT"]."/Final-Project/database/db-sqli.php");

if (isset($_GET["category_id"])) {
  $categoryId = $_GET["category_id"];
  $query = "DELETE FROM categories WHERE category_id = $categoryId;";
  $result = mysqli_query($db_conn, $query);
  mysqli_close($db_conn);
}

header("Location: list-categories.php?categoryDeleted=1");

?>
