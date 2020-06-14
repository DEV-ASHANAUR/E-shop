<footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/sweetalert.js"></script>
  <script src="assets/js/scripts.js"></script>

  <!-- JS Libraies -->
  <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/preview.js"></script>
  <script src="assets/js/page/datatables.js"></script>
  
  <!-- Custom JS File -->
  <script src="assets/js/chart.min.js"></script>
  <script src="assets/js/chart-bar-demo.js"></script>

  <script src="assets/js/custom.js"></script>
  <!-- new map -->
  <!-- <script src="assets/map/vendor.bundle.base.js"></script>
  <script src="assets/map/vendor.bundle.addons.js"></script> -->
  <!-- new map end-->
  <script type="text/javascript">
        function myfun(paravalue){
            var backup = document.body.innerHTML;
            var divcontend = document.getElementById(paravalue).innerHTML; 
            document.body.innerHTML = divcontend;
            window.print();
            document.body.innerHTML = backup;
        }
    </script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>