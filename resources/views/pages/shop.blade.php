@extends('frontend.header')
@section('title','Greys Store | Shop')
@section('content')
<div class="shop_sidebar_area">
            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Categories</h6>

                <!--  Catagories  -->
               
                <div class="catagories-menu">
                @foreach($category as $c)
                    <ul>
                        <li><a href="{{ URL('/search/'.$c->id )}}">{{$c->ca_name}}</a></li>
                    </ul>
                    @endforeach
                </div>
                
            </div>


        </div>
        
        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">
            <div class="alert alert-success" style="display:none">
			    <strong>Success!</strong>Product added to cart
			</div> 
                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Showing 1-8 0f 25</p>
                                <div class="view d-flex">
                                    <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                               
                                <!-- <div class="view-product d-flex align-items-center">
                                    <p>View</p>
                                    <form action="#" method="get">
                                        <select name="limit" id="viewProduct" onchange="this.form.submit()">
                                            <option value="value">10</option>
                                            <option value="value">15</option>
                                            <option value="value">20</option>
                                        </select>
                                    </form>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($products as $p)
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{ asset('amado/img/product-img/product1.jpg')}}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{ asset('amado/img/product-img/product2.jpg')}}" alt="">
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">Rs {{$p->pr_price}}</p>
                                    <a href="{{ URL('/product/details/'.$p->id )}}">
                                        <h6>{{$p->pr_name}}</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                <input type="hidden" name="rating" id="rating{{$p->id}}"  value="{{$p->pr_rating}}">
                                    <div class="ratings rat{{$p->id}}">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <script>
                                    $(document).ready(function() 
                                    {
                                      var rat = $('#rating{{$p->id}}').val();
                                        console.log(rat);
                                        function addDiv(){
                                            $('.rat{{$p->id}}').append('<i class="fa fa-star" aria-hidden="true"></i>');
                                        }
                                        for(var i = 0; i< rat; i++){
                                            addDiv();
                                        }

                                    });

                                     </script>   
                                    <div class="cart">
                                        <a href="#" data-toggle="tooltip" data-value="{{$p->id}}" data-placement="left" title="Add to Cart"><img src="{{ asset('amado/img/core-img/cart.png')}}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
          
                </div>

                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                {!! $products->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $(".cart a").click(function() {
            var i=$(this).data("value");
            $.ajax({
					url: "/add/cart",
					type : "post",
					data: {"_token": "{{ csrf_token() }}",id:i,qty:"1"},
					success: function(result)
					{
						$(".alert-success").show();
						setTimeout(()=>{
							$(".alert-success").hide();	
						},2000)
						window.scrollTo({
						top: 0,
						behavior: 'smooth',
					});
					},
					error: function(){
						alert("error");
					}
				});
        });
    });
</script>
@endsection