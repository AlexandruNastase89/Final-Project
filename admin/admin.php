<?php
include("partials/header.php");
if( $user_access == "0" || $user_access == "1") :
?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
              Your Content HERE
            </div>
            <!-- /.container-fluid -->


<?php
endif;
include("partials/footer.php");
?>
