<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
        .table{
            margin: auto;
            width:70%;
            text-align: center;
            margin-top: 30px;
            border: 2px solid white;
            border-radius: 10px;
            color: white;
        }

        </style>
  
       
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
                    <div class="div_center">
                        <h2 class="text_center">Add Category</h2>

                        <form action="{{url('/add_category')}}" method="POST">
                            @csrf
                            <input class="form-control" type="text" name="category" placeholder="Category Name">
                            @if ($errors->has('category'))
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                             @endif
                             <br>

                            <input class="btn btn-primary mt-3" type="submit" value="Add Category">
                        </form>

                    </div>
                    <table class="table">
                    <tr>
                        <th >Category Name</th>
                       
                        <th colspan="2" >

                            <a href="" class=" ">Action</a>

                          </th>
                          </tr>

                          @foreach($data as $data)


                          <tr>
                            <th >{{$data->category_name}}</th>
                           
                            <th colspan="2" >
                                <a onclick="return confirm('Are you sure you want to delete this item?');" href=" delete_category/{{ $data->id }}" class="btn btn-danger">Delete</a>
                              </th>
                              </tr>



                         </tr>

                         @endforeach
                    </table>





                 </div>
                
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C89scLLqNg5le/Q1LW/rgx+PuZph5/gNq/LO0Yflx+3J0MVt8tCa9x47Fh+t9jpZuyo" crossorigin="anonymous"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>

