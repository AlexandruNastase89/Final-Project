<?php
  if( $user_access == "0" || $user_access == "1") {
?>
    </div>
<!-- End of Content -->

<!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span class="text-capitalize font-weight-bold">Copyright &copy; The Witcher Francise - Admin Panel</span>
            </div>
        </div>
    </footer>
  <!-- End of Footer -->

  </div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="/Final-Project/assets/js/jquery-3.5.1.js"></script>
<script src="/Final-Project/assets/js/bootstrap.bundle.js"></script>

<!-- Custom scripts for all pages-->
<script src="/Final-Project/admin/assets/js/sb-admin-2.js"></script>

</body>

</html>

<?php
} else {
  header("Location: /Final-Project/404.php");
}
?>
