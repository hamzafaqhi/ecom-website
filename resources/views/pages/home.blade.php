@extends('frontend.header')
@section('title','Greys Store | Home')
@section('content')
<div class="products-catagories-area clearfix">            
<div class="amado-pro-catagory clearfix">

                @if(!empty($product))
                @foreach($product as $p)
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{ URL('/product/details/'.$p->id )}}">
                    <img src="{{ asset('amado/img/bg-img/1.jpg')}}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From Rs{{$p->pr_price}}</p>
                            <h4>{{$p->pr_name}}</h4>
                        </div>
                    </a>
                </div>
                
                @endforeach
                @endif
                <!-- Single Catagory -->
            
            </div>
            </div>
                


                
        <!-- Product Catagories Area End -->



    <!-- ##### Main Content Wrapper End ##### -->
    @endsection