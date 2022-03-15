<?php
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/Final-Project/database/db-sqli.php");

if(isset($_GET["user_id"])) {
  $userId = $_GET["user_id"];

  $userReadQuery = "SELECT * FROM users WHERE user_id = $userId";
  $resultUserRead = mysqli_query($db_conn, $userReadQuery);
  $rowUser = $resultUserRead->fetch_array();

  if ($_SESSION["user_id"] == $rowUser["user_id"] or $rowUser["user_access"] == "0") {
    header("Location: users.php?userDeleted=2");
  } else {
    $userDeleteQuery = "DELETE FROM users WHERE user_id = $userId;";
    $resultUserDelete = mysqli_query($db_conn, $userDeleteQuery);
    header("Location: users.php?userDeleted=1");
  }

  mysqli_close($db_conn);
}



?>
