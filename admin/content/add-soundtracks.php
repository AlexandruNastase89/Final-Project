<?php
  ob_start();
  include "../partials/header.php";

  $audioFile = $randomizeFile = $albumSelect = $albumName = $audioNumber = $audioName = "" ;
  $target_dir = $target_file = $audioFileType = $extensions_arr = "";
  $audioFileErr = $albumSelectErr = $albumNameErr = $audioNumberErr = $audioNameErr = "";

  $invalidFileFormat = $uploadStatus = $albumAdded = "";

  if(isset($_POST["submit_audio"])) {

    $audioFile = $_FILES["file"]["name"];
    $randomizeFile = rand(10000,99999);
    $albumName = $_POST["album_select"];
    $audioNumber = $_POST["audio_number"];
    $audioName = addslashes($_POST["audio_name"]);

    $target_dir = $_SERVER["DOCUMENT_ROOT"]."/Final-Project/content/audio/";
    $target_file = $target_dir . $randomizeFile . "-" . $audioFile;

    if(empty($audioFile)) {
      $audioFileErr = 1;
    }
    if(empty($albumName)) {
      $albumNameErr = 1;
    }
    if(empty($audioNumber)) {
      $audioNumberErr = 1;
    }
    if(empty($audioName)) {
      $audioNameErr = 1;
    }

    // Select file type
    $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Valid file extensions
    $extensions_arr = array("mp3","wav","ogg","flac");

    // Check extension
    if(in_array($audioFileType,$extensions_arr)) {

      if($audioFileErr == 0 and $albumSelectErr == 0 and $audioNumberErr == 0 and $audioNameErr == 0) {
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file)){
          // Insert record
          $query = "INSERT INTO audio(file_name,file_path,audio_name,album_name,audio_number,album_id_fk) VALUES('$audioFile','$target_file','$audioName','$albumName','$audioNumber',(SELECT album_id FROM album WHERE album_name = '$albumName'))";
          mysqli_query($db_conn, $query);
          header("Location: add-soundtracks.php?uploadStatus=1");
          mysqli_close($db_conn);
        }
      }
    } else {
      $invalidFileFormat = 1;
    }
  }

  if(isset($_POST["submit_album"])) {
    $albumNameSubmit = $_POST["album_name"];
    if (empty($albumNameSubmit)) {
      $albumNameSubmitErr = 1;
    } else {
      $query = "INSERT INTO album(album_name) VALUES ('$albumNameSubmit')";
      mysqli_query($db_conn, $query);
      mysqli_close($db_conn);
      header("Location: add-soundtracks.php?albumAdded=1");
    }
  }
  if( $user_access == "0" || $user_access == "1") :
?>

<div class="container mt-5">
  <h2 class="text-center">Add new audio file</h2>

  <div class="row mt-5">
    <form class="col-md-12" action="" method="post" enctype="multipart/form-data">

      <?php
        if (isset($_GET["uploadStatus"]) && $_GET["uploadStatus"] == 1) {
          echo '<div class="alert alert-success text-center">The audio file was uploaded successful!</div>';
        }

        if (isset($_GET["albumAdded"]) && $_GET["albumAdded"] == 1) {
          echo '<div class="alert alert-info text-center">New album was created!</div>';}
      ?>

      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-nowrap">Browse to your file</p>

          <div class="custom-file d-flex">
            <label for="file-upload" class="custom-file-upload btn btn-outline-primary">
              Select
            </label>
            <div class="text-center" id="file-selected"></div>
            <input id="file-upload" type="file" name="file">
          </div>
          <?php
            if ($audioFileErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please select your audio file!</div>';
            }
            if ($invalidFileFormat == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Invalid file format!</div>';
            }
          ?>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-12 mt-3">
          <div class="form-group">
            <label class="mb-3" for="title">Enter the title:</label>
            <input type="text" class="form-control" name="audio_name" id="title" value="<?php echo $audioName;?>">
          </div>
          <?php
            if ($audioNameErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please input audio name!</div>';
            }
          ?>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-5">
          <p class="text-nowrap">Select album</p>
          <select class="custom-select" name="album_select">
            <option></option>
            <?php
              $query = "SELECT * FROM album";
              $result = mysqli_query($db_conn, $query);
              while ($row = $result->fetch_array()):
            ?>
            <option value='<?php echo $row["album_name"];?>' <?php if ($albumSelect == $row["album_name"]) echo 'selected="selected"';?>><?php echo $row["album_name"];?></option>
            <?php endwhile; ?>
          </select>
          <?php
            if ($albumSelectErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please select the album!</div>';
            }
          ?>
        </div>

        <div class="col-md-2">
          <p class="text-nowrap mb-3">Track number</p>
          <div class="form-group">
            <input type="number" min="1" step="1" class="form-control" name="audio_number" value="<?php echo $audioNumber;?>">
          </div>
          <?php
            if ($audioNumberErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please input track number!</div>';
            }
          ?>
        </div>

        <div class="col-md-5">
          <div class="form-group">
            <label class="mb-3" for="title">Type album name</label>
            <input type="text" class="form-control" name="album_name" id="title" value="<?php echo $albumName;?>">
          </div>
          <?php
            if ($albumNameErr == 1) {
              echo '<div class="alert alert-danger text-center mt-3">Please input album name!</div>';
            }
          ?>
        </div>
      </div>

        <div class="row">
          <div class="col-sm-5 text-center">
            <button class="btn btn-outline-primary mt-3" name="submit_audio" type="submit" value="submit">Upload</button>
          </div>
          <div class="col-sm-5 offset-sm-2 text-center">
            <button class="btn btn-outline-primary mt-3" name="submit_album" type="submit">Add album</button>
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
