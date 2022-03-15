<?php
ob_start();
include "../partials/header.php";

$newEpisodeName = $newSeasonNumber = $newEpisodeNumber ="";
$newEpisodeNameErr = $newSeasonNumberErr = $newEpisodeNumberErr = "";

if(isset($_GET["video_id"])){
  $videoId = $_GET["video_id"];
  if(isset($_POST["submit_new_title"])){
    $newEpisodeName = addslashes($_POST["episode_name"]);
    $newSeasonNumber = $_POST["season_number"];
    $newEpisodeNumber = $_POST["episode_number"];

    if(empty($newEpisodeName)) {
      $newEpisodeNameErr = 1;
    }
    if(empty($newSeasonNumber)) {
      $newSeasonNumberErr = 1;
    }
    if(empty($newEpisodeNumber)) {
      $newEpisodeNumberErr = 1;
    }

    $updateVideo = "UPDATE video SET episode_name = '$newEpisodeName', season_number = '$newSeasonNumber', episode_number = '$newEpisodeNumber' WHERE video_id = $videoId;";
    if ($newEpisodeNameErr == 0 and $newSeasonNumberErr == 0 and $newEpisodeNumberErr == 0) {
      $result = mysqli_query($db_conn,$updateVideo);
      header("Location: list-episodes.php?episodeUpdated=1");
    }
  }
  $query1 = "SELECT * FROM video WHERE video_id = $videoId;";
  $resultQuery1 = mysqli_query($db_conn, $query1);
  $rowQuery1 = $resultQuery1->fetch_array();
}

if( $user_access == "0" || $user_access == "1") :
?>

<div class="container mt-5">
  <h2 class="text-center">Edit episode</h1>
  <div class="row mt-5">
    <form class="col-md-12" action="" method="post">
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-nowrap mb-3">Enter new title</p>
          <div class="form-group">
            <input name="episode_name" type="text" class="form-control"  id="title" value="<?php echo $rowQuery1["episode_name"]; ?>">
          </div>
          <?php
            if ($newEpisodeNameErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please input episode title!</div>';
            }
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 mt-3">
          <p class="text-nowrap mb-3">Episode number</p>
          <div class="form-group">
            <input type="number" min="1" step="1" class="form-control" name="episode_number" id="episodeNumber" value="<?php echo $rowQuery1["episode_number"];?>">
          </div>
          <?php
            if ($newEpisodeNumberErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3 ';
              if($newEpisodeNumberErr == 1 or $newSeasonNumberErr == 1) {echo "pb-2 mb-1";};
              echo '">Please input episode number!</div>';
            }
          ?>
        </div>

        <div class="col-md-5 offset-md-2 mt-3">
          <p class="text-nowrap mb-3">Select season</p>
          <select class="custom-select" name="season_number">
            <option></option>
            <?php
              $query2 = "SELECT * FROM season";
              $resultQuery2 = mysqli_query($db_conn, $query2);
              while ($rowQuery2 = $resultQuery2->fetch_array()):
            ?>
            <option value="<?php echo $rowQuery2["season_id"]; ?>" <?php if ($rowQuery1["season_number"] == $rowQuery2["season_id"]) echo 'selected="selected"'; ?>><?php echo $rowQuery2["season_id"];?></option>
            <?php endwhile; ?>
          </select>
          <?php
            if ($newSeasonNumberErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3 ';
              if($newEpisodeNumberErr == 1 or $newSeasonNumberErr == 1) {echo "pb-2 mb-1";};
              echo '">Please select the season!</div>';
            }
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 <?php if($newSeasonNumberErr == 1 or $newEpisodeNumberErr == 1) {echo "mt-3";} else { echo "mt-5";} ?>">
          <button class="btn btn-outline-primary <?php if($newSeasonNumberErr == 1 or $newEpisodeNumberErr == 1) {echo "mt-2";} else { echo "mt-4";} ?>" name="submit_new_title" type="submit">Edit Episode</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
  endif;
  include "../partials/footer.php";
  ob_end_flush();
?>
