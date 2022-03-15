<?php
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/Final-Project/database/db-sqli.php");

if (isset($_GET["user_id"])) {
  $userId = $_GET["user_id"];

  $userQueryRead = "SELECT * FROM users WHERE user_id = $userId";
  $resultUserRead = mysqli_query($db_conn, $userQueryRead);
  $rowUser = $resultUserRead->fetch_array();
  if ($rowUser["user_access"] == "0") {
    header("Location: users.php?userDemoted=0");
  } elseif ($rowUser["user_access"] == "2") {
    header("Location: users.php?userDemoted=2");
  } elseif ($rowUser["user_access"] == "1") {
    if ($rowUser["user_id"] == $_SESSION["user_id"]) {
      header("Location: users.php?userDemoted=0");
    } else {
      $userAccess = $rowUser["user_access"] + "1";
      $userQueryUpdate = "UPDATE users SET user_access = $userAccess WHERE user_id = $userId;";
      $resultUserUpdate = mysqli_query($db_conn, $userQueryUpdate);
      header("Location: users.php?userDemoted=1");
    }
  }
}

?>
