<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
     <base href="/public">
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
            <h1 class="text-center" style="padding: 20px;"  >Edit Products</h1>

            <form action="{{url('/update_product/'.$product->id)}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <label for="product_title">Product Title</label>
                    <input type="text" name="product_title" value="{{$product->title}}" class="form-control" id="product_title" aria-describedby="emailHelp" required="">
                </div>
                <div class="form-group">
                    <label for="product_description">Product Description</label>
                    <input type="text" name="product_description" value="{{$product->description}}" class="form-control" id="product_description" aria-describedby="emailHelp" required="">
                </div>

                <div class="form-group">
                    <label for="product_price">Product Price</label>
                    <input type="number" name="product_price" class="form-control" value="{{$product->price}}" id="product_price" aria-describedby="emailHelp" required="">
                </div>
                <div class="form-group">
                    <label for="product_discount">Product Discount</label>
                    <input type="number" name="product_discount" class="form-control" value="{{$product->discount_price}}" id="product_discount" aria-describedby="emailHelp" >
                </div>

                <div class="form-group">
                    <label for="product_image">Current Product Image</label>
                    <img height="200" width="200"  src="productimage/{{$product->image}}" alt="">
                   
                </div>



                <div class="form-group">
                    <label for="product_image">Change Product Image</label>
                    <input type="file" name="product_image" class="form-control"  id="product_image" aria-describedby="emailHelp" >
                </div>

                <div class="form-group">
                    <label for="product_quantity">Product Quantity</label>
                    <input type="number" name="product_quantity" min="0" class="form-control" value ="{{$product->quantity}}" id="product_quantity" aria-describedby="emailHelp" required="">
                </div>

                <div class="form-group">
                    <label for="product_category">Product Category</label>
                    <select name="product_category" class="form-control" id="product_category" required="">
                        <option  value="{{$product->category}}">{{$product->category}}</option>
                        @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach




                       
                        
                      
                       
                        
                    </select>
                </div>

                <button type="submit"  name = "update_product"  class="btn btn-primary">Update Product</button>
            </form>
              



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
