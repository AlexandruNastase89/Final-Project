<?php
  include "../partials/header.php";

  $query = "SELECT * FROM video ORDER BY season_number ASC, episode_number ASC;";
  $result = mysqli_query($db_conn, $query);
  mysqli_close($db_conn);

  if( $user_access == "0" || $user_access == "1") :
?>

    <div class="container mt-5">
      <h2 class="text-center">List episodes</h1>

      <div class="row mt-5">
        <div class="col-md-12">
          <?php
            if (isset($_GET["episodeUpdated"]) && $_GET["episodeUpdated"] == 1) {
              echo '<div class="alert alert-info text-center">The episode was updated successful!</div>';}

            if(isset($_GET["episodeDeleted"]) && $_GET["episodeDeleted"] == 1) {
              echo '<div class="alert alert-danger text-center">The episode was deleted successful!</div>';}
          ?>

          <table class="table table-striped table-hover text-center">
              <thead class="thead-dark">
              <tr>
                <th scope="col">Season</th>
                <th scope="col">Episode</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $result->fetch_array()): ?>
              <tr>
                <td><?php echo $row["season_number"];?></td>
                <td><?php echo $row["episode_number"];?></td>
                <td><?php echo $row["episode_name"];?></td>
                <td><a class="btn btn-outline-primary" href="edit-episodes.php?video_id=<?php echo $row["video_id"];?>">Edit</a></td>
                <td><a class="btn btn-outline-danger" href="delete-episodes.php?video_id=<?php echo $row["video_id"];?>">Delete</a></td>
              </tr>
            <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

<?php
  endif;
  include "../partials/footer.php";
?>
