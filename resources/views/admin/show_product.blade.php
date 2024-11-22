<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
     

      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
        @if(session()->has('message'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('message')}}
</div>



@endif
            <h2 class="text-center">All Products</h2>

        <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">

        <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr  >
        <th > # </th>
        <th> Name </th>
        <th> Description </th>
        <th> Price </th>
        <th> Discount Price </th>
        <th> Quantity </th>
        <th> Category </th>
        <th> Image </th>
        <th> Edit </th>
        <th> Delete </th>
        </tr>
        </thead>
        <tbody>

        @foreach($product as $product)
       
        <tr>
        <td> {{ $product->id }} </td>
        <td> {{ $product->title }} </td>
        <td> {{ $product->description }} </td>
        <td> {{ $product->price }}</td>
        <td> {{ $product->discount_price }}</td>
        <td> {{ $product->quantity }}</td>
        <td> {{ $product->category }}</td>
       <td> <img src="/productimage/{{ $product->image }}" width="100px" height="100px"> </td>
        <td> <a href=" {{ url('/edit_product/'.$product->id) }} " class ="btn btn-primary">Edit</a> </td>
        <td> <a href=" {{ url('/delete_product/'.$product->id) }}" onclick ="return confirm('Are you sure?')" class ="btn btn-danger">Delete</a> </td>
        </tr>
        @endforeach
       
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>



       </div>

     </div>
      

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
