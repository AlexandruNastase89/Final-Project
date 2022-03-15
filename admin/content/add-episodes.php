<?php
  ob_start();
  include "../partials/header.php";

  $videoFile = $randomizeFile = $seasonNumber = $episodeNumber = $episodeName = "" ;
  $target_dir = $target_file = $videoFileType = $extensions_arr = "";
  $videoFileErr = $seasonNumberErr = $episodeNumberErr = $episodeNameErr = "";

  $invalidFileFormat = $uploadStatus = "";

  $seasonNumber = $seasonAdded = "";

  if(isset($_POST["submit_episode"])) {

    $videoFile = $_FILES["file"]["name"];
    $randomizeFile = rand(10000,99999);
    $seasonNumber = $_POST["season_number"];
    $episodeNumber = $_POST["episode_number"];
    $episodeName = addslashes($_POST["episode_name"]);

    $target_dir = $_SERVER["DOCUMENT_ROOT"]."/Final-Project/content/video/";
    $target_file = $target_dir . $randomizeFile . "-". $videoFile;

    if(empty($videoFile)) {
      $videoFileErr = 1;
    }
    if(empty($seasonNumber)) {
      $seasonNumberErr = 1;
    }
    if(empty($episodeNumber)) {
      $episodeNumberErr = 1;
    }
    if(empty($episodeName)) {
      $episodeNameErr = 1;
    }

    // Select file type
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("mp4","avi","3gp","mov","mpeg","mkv");

    // Check extension
    if(in_array($videoFileType,$extensions_arr)) {

      if($videoFileErr == 0 and $seasonNumberErr == 0 and $episodeNumberErr == 0 and $episodeNameErr == 0) {
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)){
          // Insert record
          $query = "INSERT INTO video(file_name,file_path,episode_name,season_number,episode_number) VALUES('$videoFile','$target_file','$episodeName','$seasonNumber','$episodeNumber')";
          mysqli_query($db_conn, $query);
          header("Location: add-episodes.php?uploadStatus=1");
          mysqli_close($db_conn);
        }
      }
    } elseif ($videoFileErr == 0) {
      $invalidFileFormat = 1;
    }
  }

  if(isset($_POST["submit_season"])) {
    ++$seasonNumber;
    $query = "INSERT INTO season(season_add) VALUES ('$seasonNumber')";
    mysqli_query($db_conn, $query);
    mysqli_close($db_conn);
    header("Location: add-episodes.php?seasonAdded=1");
  }
  if( $user_access == "0" || $user_access == "1") :
?>

<div class="container mt-5">
  <h2 class="text-center">Add new episode</h2>

  <div class="row mt-5">
    <form class="col-md-12" action="" method="post" enctype="multipart/form-data">

      <?php
        if (isset($_GET["uploadStatus"]) && $_GET["uploadStatus"] == 1) {
          echo '<div class="alert alert-success text-center">The episode was uploaded successful!</div>';
        }

        if (isset($_GET["seasonAdded"]) && $_GET["seasonAdded"] == 1) {
          echo '<div class="alert alert-info text-center">New season was added!</div>';}
      ?>

      <div class="row">
        <div class="col-md-9 mt-3">
          <p class="text-nowrap">Browse to your file</p>

          <div class="custom-file d-flex">
            <label for="file-upload" class="custom-file-upload btn btn-outline-primary">
              Select
            </label>
            <div class="text-center" id="file-selected"></div>
            <input id="file-upload" type="file" name="file">
          </div>
          <?php
            if ($videoFileErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please select your video file!</div>';
            }
            if ($invalidFileFormat == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Invalid file format!</div>';
            }
          ?>
        </div>
        <div class="col-md-3 mt-3">
          <p class="text-nowrap mb-3">Episode number</p>
          <div class="form-group">
            <input type="number" min="1" step="1" class="form-control" name="episode_number" id="episodeNumber" value="<?php echo $episodeNumber;?>">
          </div>
          <?php
            if ($episodeNumberErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please input episode number!</div>';
            }
          ?>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-9">
          <div class="form-group">
            <label class="mb-3" for="title">Enter the title:</label>
            <input type="text" class="form-control" name="episode_name" id="title" value="<?php echo $episodeName;?>">
          </div>
          <?php
            if ($episodeNameErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please input episode title!</div>';
            }
          ?>
        </div>

        <div class="col-md-3">
          <p class="text-nowrap">Select season</p>
          <select class="custom-select" name="season_number">
            <option></option>
            <?php
              $query = "SELECT season_id FROM season";
              $result = mysqli_query($db_conn, $query);
              while ($row = $result->fetch_array()):
            ?>
            <option <?php if ($seasonNumber == $row["season_id"]) echo 'selected="selected"';?>><?php echo $row["season_id"];?></option>
            <?php endwhile; ?>
          </select>
          <?php
            if ($seasonNumberErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please select the season!</div>';
            }
          ?>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-sm-3 mb-3 text-center">
          <button class="btn btn-outline-primary" name="submit_episode" type="submit" value="submit">Upload</button>
        </div>
        <div class="col-sm-3 offset-sm-6 text-center">
          <button class="btn btn-outline-primary text-nowrap" name="submit_season" type="submit">Add season</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
  endif;
  include '../partials/footer.php';
  ob_end_flush();
?>

<script type="text/javascript">
$('#file-upload').bind('change', function() {
  var fileName = '';
  var fileNameSubstring = '';
  fileName = $(this).val();
  fileNameSubstring = fileName.substring(12);
  $('#file-selected').html(fileNameSubstring);
})
</script>
