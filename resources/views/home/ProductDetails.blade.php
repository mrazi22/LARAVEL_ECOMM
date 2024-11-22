<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
       <base href="/public" />
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
   </head>
   <body>
      <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        <!-- end header section -->
         <!-- slider section -->


     
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding:30px;">

     
                   
                        <div class="img-box" >
                            <img src="productimage/{{ $products->image }}"  alt="" style= "width: 300px; height: 300px;">
                        </div>
                        <div class="detail-box">
                            <h5>{{ $products->title }}</h5>
                            <h6>Ksh.{{ $products->price }}</h6>

                           
                            <h6>Product Category:{{ $products->category }}</h6>
                            <h6>Product Description:{{ $products->description }}</h6>
                            <h6>Product Quantity:{{ $products->quantity}}</h6>
                          
                            <form action="{{ url('/addCart', $products->id ) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 mt-4">
                                        <input type="number" class="form-control border-0 font-weight-bold kiki" name="quantity" value="1" min="1">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <button type="submit" class="btn btn-danger btn-lg cartbtn">Add to Cart</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
      <!-- end slider section -->
       
      <!-- footer start -->
      
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="https://github.com/mrazi22">Simon github</a><br>
         
           
         
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