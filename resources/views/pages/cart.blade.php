@extends('frontend.header')
@section('title','Greys Store | Cart')
@section('content')
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($cart_items))
                                    @foreach($cart_items as $c)
                                    <tr id="{{$c->id}}">
                                        <td class="cart_product_img">
                                            <a href="#"><img src="{{ asset('amado/img/bg-img/cart1.jpg')}}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>{{$c->product_name}}</h5>
                                        </td>
                                        <td class="price">
                                            <span>Rs {{$c->price}}</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty{{$c->id}}'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true">&nbsp;</i></span>
                                                    <input type="number" class="qty-text" id="qty{{$c->id}}" step="1" min="1" max="300" name="quantity" value="{{$c->quantity}}">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty{{$c->id}}'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <!-- <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="{{ asset('amado/img/bg-img/cart2.jpg')}}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>Minimal Plant Pot</h5>
                                        </td>
                                        <td class="price">
                                            <span>$10</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty2'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty2" step="1" min="1" max="300" name="quantity" value="1">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty2'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="{{ asset('amado/img/bg-img/cart3.jpg')}}" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5>Minimal Plant Pot</h5>
                                        </td>
                                        <td class="price">
                                            <span>$10</span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty3'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" id="qty3" step="1" min="1" max="300" name="quantity" value="1">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty3'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>Rs {{ Session::get('total_price')}}</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>Rs {{ Session::get('total_price')}}</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="{{ route('checkout')}}" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('scripts')
        <script>
    //     $(".qty").on('change' , 'input[type="number"]',function() { 
    //         alert('hi');
    //     var q = ($(this).val());
    //     var rowid = $(this).closest('tr').attr('id');
    //     var session_id = $("#session").val();
    //     $.ajaxSetup
	// 			({
	// 				headers: {
	// 					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
	// 				}
	// 			});
	// 			$.ajax({
	// 				url: "/update/cart",
	// 				type : 'get',
	// 				data: {id: rowid,quantity: q, session: session_id},
	// 				success: function(result)
	// 				{
    //                     $(".alert-success").css("display", "block");
	// 					setTimeout(()=>{
	// 					$(".alert-success").hide();	
	// 					},2000)
	// 				},
	// 				error: function(){
	// 					console.log("error");
	// 				}
	// 			});
    // })
        </script>
        @endsection