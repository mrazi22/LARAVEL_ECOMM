<style type="text/css">
    .cartbtn{
        border-radius: 30px;
    }

    .kiki{
        font-size: 20px;
    }


    </style>


<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            
            <h2>Our <span>products</span></h2>
        </div>
        <div class="row">

            @foreach ($products as $products) 
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="  {{ url('/ProductDetails/'.$products->id) }} " class="btn btn-danger">Product Details</a>

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
                        <div class="img-box">
                            <img src="productimage/{{ $products->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>{{ $products->title }}</h5>
                            <h6>${{ $products->price }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>