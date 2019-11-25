@extends('frontend.header')
@section('title','Greys Store | Checkout')
@section('content')
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
            <div class="alert alert-danger print-error-msg" style="display:none">
					<ul></ul>
            </div>
            <div id="cancelresponse">

            </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                            <form action="#" id="order-form" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{$user->name}}" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="last_name" id="last_name" value="" placeholder="Last Name" required>
                                    </div>
                                    <!-- <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name id="company" placeholder="Company Name" value="">
                                    </div> -->
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control"name="email" id="email" placeholder="Email" value="{{$user->email}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" name="country" id="country">
                                        <option value="Pakistan">Pakistan</option>
                                     
                                    </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="address" id="street_address" placeholder="Address" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="province" id="province" placeholder="Province" value="">
                                    </div>
                                    <input type="hidden" name="cart_id" value="{{$cart_items[0]->session_id}}">
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Town" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="post_code" id="zipCode" placeholder="Zip Code" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="tel" class="form-control" name="phone" id="phone_number" min="0" placeholder="Phone No" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" name="comment" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>
                                    <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                                    <!-- <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                        </div>
                                        <div class="custom-control custom-checkbox d-block">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                                        </div>
                                    </div> -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>Rs {{Session::get('total_price')}}</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>Rs {{Session::get('total_price')}}</span></li>
                            </ul>

                            <div class="payment-method">
                                <!-- Cash on delivery -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input checkbox" name="payment_type" id="cod" value="cod" checked>
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <!-- Paypal -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input checkbox"  name="payment_type" value="paypal" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                                </div>
                            </div>

                            <div class="cart-btn mt-100">
                                <a href="#" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
    $(".cart-btn a").click(function() {
        var data = $('#order-form').serializeArray();
        var pay = $('.checkbox').val();
        data.push({name: 'payment_type', value: pay});
        console.log(data);
	$.ajax({
		url: "/create-order",
		type : 'post',
		data: data,
		success: function(result)
		{
			if($.isEmptyObject(result.error))
			{
				e.preventDefault();
				$("#cancelresponse").append('<div  class="alert alert-success alert-dismissible"><i class="fa fa-check-circle">Success! Order placed Successfully </i><button type="button" class="close" data-dismiss="alert">×</button></div>');
			}
			else
			{
				printErrorMsg(result.error);
                window.scrollTo({
						top: 0,
						behavior: 'smooth',
					});
			}
		},
		error: function(error){
			console.log(error);
		}
	});

	function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
});

</script>
@endsection