<?php
  include "../partials/header.php";
  if( $user_access == "0" || $user_access == "1") :
?>
    <div class="container mt-5">
      <h2 class="text-center">List audio files</h1>

      <div class="row mt-5">
        <div class="col-md-12">
          <?php
            if (isset($_GET["audioUpdated"]) && $_GET["audioUpdated"] == 1) {
              echo '<div class="alert alert-info text-center">The audio file was updated successful!</div>';}

            if(isset($_GET["audioDeleted"]) && $_GET["audioDeleted"] == 1) {
              echo '<div class="alert alert-danger text-center">The audio file was deleted successful!</div>';}
          ?>

          <?php
            $audioQuery = "SELECT * FROM audio ORDER BY album_id_fk";
            $audioResult = mysqli_query($db_conn, $audioQuery);
            while($audioRow = mysqli_fetch_array($audioResult, MYSQLI_ASSOC)) {
              $albumNameArray[] = $audioRow["album_name"];
            }
            if (!empty($albumNameArray)) {
              foreach(array_unique($albumNameArray) as $albumName):
          ?>
          <table class="table table-striped table-hover text-center">
            <div class="p-2 bg-dark text-white">
              <p class="h5"><?php echo $albumName; ?></p>
            </div>
            <thead class="thead-light">
              <tr>
                <th scope="col">Track</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
          <?php
            $audioListingQuery = "SELECT * FROM audio ORDER BY audio_number";
            $audioResult = mysqli_query($db_conn, $audioListingQuery);
            while($audioRow = mysqli_fetch_array($audioResult, MYSQLI_ASSOC)) {
              if($albumName == $audioRow["album_name"]) :
          ?>
            <tbody>
              <tr>
                <td><?php echo $audioRow["audio_number"];?></td>
                <td><?php echo $audioRow["audio_name"];?></td>
                <td>
                  <a class="btn btn-outline-primary" href="edit-soundtracks.php?audio_id=<?php echo $audioRow["audio_id"];?>">Edit</a>
                </td>
                <td>
                  <a class="btn btn-outline-danger" href="delete-soundtracks.php?audio_id=<?php echo $audioRow["audio_id"];?>">Delete</a>
                </td>
              </tr>
            </tbody>
          <?php
              endif;
            }
          ?>
          </table>
          <?php
            endforeach;
          }
          ?>
        </div>
      </div>
    </div>

<?php
  endif;
  include "../partials/footer.php";
?>
