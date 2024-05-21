

 
 <script src="assets/vendor/js/vendor.bundle.base.js"></script>
 
 
 <script src="assets/vendor/chart.js/Chart.min.js"></script>

 
 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

 <script src="assets/js/off-canvas.js"></script>
 <script src="assets/js/hoverable-collapse.js"></script>
 <script src="assets/js/misc.js"></script>
 
 
 
 <script src="assets/js/todolist.js"></script>
 <script src="assets/js/file-upload.js"></script>
 


 



 <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
 <!-- <script src="assets/vendor/datatables/dataTables.bootstrap.js"></script> -->
 <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>


 

<script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  <script >
 function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 1000);
    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('page', true);
    show('loading', false);
});
</script>