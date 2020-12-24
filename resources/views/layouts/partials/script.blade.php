  <?php 
  use \App\Http\Controllers\OrderBackendController;
  use Illuminate\Support\Facades\Route;
	$currentPath= Route::getFacadeRoot()->current()->uri();
  $orderByMonth =  OrderBackendController::orderByMonth();
	?>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/admin.min.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/backend-app.js') }}"></script>
 	@if($currentPath =='home')
 <!-- Page level plugins -->
 <script>
  var order_data_arr = <?php echo $orderByMonth; ?>;
  var order_data = [];
  for (var key in order_data_arr) {
    if (order_data_arr.hasOwnProperty(key)) {
      order_data.push(order_data_arr[key]);
    }
  }
  
  var completedOrder = <?= OrderBackendController::completedOrder() ?>,
      pendingOrder = <?= OrderBackendController::pendingOrder() ?>,
      canceldOrder = <?= OrderBackendController::canceldOrder() ?>,
      refundOrder = <?= OrderBackendController::refundOrder() ?>,
      newOrder = <?= OrderBackendController::newOrder() ?>

  
 </script>
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
  @endif
