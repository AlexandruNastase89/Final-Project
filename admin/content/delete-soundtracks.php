<?php

include($_SERVER["DOCUMENT_ROOT"]."/Final-Project/database/db-sqli.php");

if (isset($_GET["audio_id"])) {

  $audioId = $_GET["audio_id"];
  $fileDelete = "SELECT file_path FROM audio WHERE audio_id = $audioId;";
  $result = mysqli_query($db_conn, $fileDelete);

  $queryFilePath = $result->fetch_all();
  foreach ($queryFilePath as $filepath) {
    foreach ($filepath as $value) {
      $deleteAudio = $value;
      unlink($deleteAudio);
    }
  }

  $queryDelete = "DELETE FROM audio WHERE `audio_id` = $audioId;";
  $result = mysqli_query($db_conn, $queryDelete);

  mysqli_close($db_conn);
}

header("Location: list-soundtracks.php?audioDeleted=1");

?>
