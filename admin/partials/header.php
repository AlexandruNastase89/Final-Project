<?php
session_start();
$user_access = "";
include($_SERVER["DOCUMENT_ROOT"]."/Final-Project/database/db-sqli.php");

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {

  $query = "SELECT user_access FROM users WHERE user_id={$_SESSION['user_id']}";
  $result = mysqli_query($db_conn, $query);
  $row = mysqli_fetch_array($result);
  $user_access = $row["user_access"];
}

  if( $user_access == "0" || $user_access == "1") :
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>The Witcher Francise - Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="/Final-Project/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/Final-Project/admin/assets/css/sb-admin-2.css" rel="stylesheet" type="text/css">
    <link href="/Final-Project/admin/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php include "navbars/side-navbar.php"; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

<?php
  endif;
?>
