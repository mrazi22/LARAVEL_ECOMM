<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style type="text/css">
        
      </style>
   </head>
   <body>
      <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')



        @if(session()->has('message'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get('message')}}
</div>

@endif

      
      


      <div class="zek container mt-5 ">
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <table class="table table-bordered">
        <tr>
          <th>Product Title</th>
          <th>Product Quantity</th>
          <th>Product Price</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        <?php $total_price = 0; ?>

        @foreach($cart as $cart)

        <tr>
          <td>{{ $cart->product_title }}</td>
          <td>{{ $cart->quantity }}</td>
          <td>{{ $cart->product_price }}</td>
          <td><img src="/productimage/{{ $cart->image }}" style="width: 50px; height: 50px;"></td>
          <td><a href=" {{ url('/destroy_cart/'. $cart->id ) }}" onclick ="return confirm('Are you sure?')"  class="btn btn-danger">Delete</a></td>
        </tr>
        <?php $total_price = $total_price + $cart->product_price; ?>

        

        @endforeach
       
      </table>
      <div class="row justify-content-end">
        <div class="col-sm-6">
          <div class="card text-white bg-primary mb-3">
            <div class="card-body">
              <h5 class="card-title font-weight-bold text-uppercase "> Total Price</h5>
              <p class="card-text ">Ksh. {{ $total_price }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- procced to checkout -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">Procced To Checkout</h5>
          <a href="{{ url('/Cash_pay') }} " class="btn btn-primary">Cash On Delivery</a>
          <a href=" {{ url('/stripe', $total_price) }}" class="btn btn-success">Pay Using Card</a>
        </div>
      </div>
    </div>
  </div>   
    </div>
    </div>
  </div>

</div>

 


</div>



    

                
      
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>