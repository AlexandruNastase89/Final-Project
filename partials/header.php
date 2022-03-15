<?php
session_start();

// Include config file
include ($_SERVER["DOCUMENT_ROOT"]."/Final-Project/database/db-sqli.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Witcher Francise</title>
    <link rel="stylesheet" href="/Final-Project/assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/Final-Project/assets/css/style.css" type="text/css">
  </head>

  <body>
    <?php include("navbar.php"); ?>
