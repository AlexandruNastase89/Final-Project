<?php

include($_SERVER["DOCUMENT_ROOT"]."/Final-Project/database/db-sqli.php");

if (isset($_GET["video_id"])) {

  $videoId = $_GET["video_id"];
  $fileDelete = "SELECT file_path FROM video WHERE video_id = $videoId;";
  $result = mysqli_query($db_conn, $fileDelete);

  $queryFilePath = $result->fetch_all();
  foreach ($queryFilePath as $filepath) {
    foreach ($filepath as $value) {
      $deleteEpisode = $value;
      unlink($deleteEpisode);
    }
  }

  $queryDelete = "DELETE FROM video WHERE `video_id` = $videoId;";
  $result = mysqli_query($db_conn, $queryDelete);

  mysqli_close($db_conn);
}

header("Location: list-episodes.php?episodeDeleted=1");

?>
