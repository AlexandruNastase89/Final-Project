<?php
ob_start();
include "../partials/header.php";

$newAudioName = $newAudioNumber = $newAlbumSelect ="";
$newAudioNameErr = $newAudioNumberErr = $newAlbumSelectErr = "";

if(isset($_GET["audio_id"])){
  $audioId = $_GET["audio_id"];
  if(isset($_POST["submit_new_title"])){
    $newAudioName = addslashes($_POST["audio_name"]);
    $newAudioNumber = $_POST["audio_number"];
    $newAlbumSelect = $_POST["album_select"];

    if(empty($newAudioName)) {
      $newAudioNameErr = 1;
    }
    if(empty($newAudioNumber)) {
      $newAudioNumberErr = 1;
    }
    if(empty($newAlbumSelect)) {
      $newAlbumSelectErr = 1;
    }

    $updateAudio = "UPDATE audio SET audio_name = '$newAudioName', album_name = '$newAlbumSelect', audio_number = '$newAudioNumber' WHERE audio_id = $audioId;";
    if ($newAudioNameErr == 0 and $newAudioNumberErr == 0 and $newAlbumSelectErr == 0) {
      $result = mysqli_query($db_conn,$updateAudio);
      header("Location: list-soundtracks.php?audioUpdated=1");
    }
  }
  $query1 = "SELECT * FROM audio";
  $resultQuery1 = mysqli_query($db_conn, $query1);
  $rowQuery1 = $resultQuery1->fetch_array();
}
if( $user_access == "0" || $user_access == "1") :
?>

<div class="container mt-5">
  <h2 class="text-center">Edit Soundtrack</h1>
  <div class="row mt-5">
    <form class="col-md-12" action="" method="post">
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-nowrap mb-3">Enter new title</p>
          <div class="form-group">
            <input name="audio_name" type="text" class="form-control"  id="title" value="<?php echo $rowQuery1["audio_name"]; ?>">
          </div>
          <?php
            if ($newAudioNameErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please input audio title!</div>';
            }
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5 mt-3">
          <p class="text-nowrap mb-3">Track number</p>
          <div class="form-group">
            <input type="number" min="1" step="1" class="form-control" name="audio_number" id="audioNumber" value="<?php echo $rowQuery1["audio_number"];?>">
          </div>
          <?php
            if ($newAudioNumberErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3 mb-0">Please input track number!</div>';
            }
          ?>
        </div>

        <div class="col-md-5 offset-md-2 mt-3">
          <p class="text-nowrap mb-3">Select album</p>
          <select class="custom-select" name="album_select">
            <option></option>
            <?php
              $query2 = "SELECT * FROM album";
              $resultQuery2 = mysqli_query($db_conn, $query2);
              while ($rowQuery2 = $resultQuery2->fetch_array()):
            ?>
            <option value='<?php echo $rowQuery2["album_name"];?>' <?php if ($rowQuery1["album_name"] == $rowQuery2["album_name"]) echo 'selected="selected"';?>><?php echo $rowQuery2["album_name"];?></option>
            <?php endwhile; ?>
          </select>
          <?php
            if ($newAlbumSelectErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please select album!</div>';
            }
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 <?php if($newAudioNumberErr == 1 or $newAlbumSelectErr == 1) {echo "mt-0";} else { echo "mt-3";} ?>">
          <button class="btn btn-outline-primary <?php if($newAudioNumberErr == 1 or $newAlbumSelectErr == 1) {echo "mt-0";} else { echo "mt-5";} ?>" name="submit_new_title" type="submit">Edit audio-track</button>
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
