<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_id = Session::get('session_id');
        
        $cart_items = Cart::getCart($session_id);
        
        return view('pages.cart',compact('cart_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id',$id)->first();
        $session_id = Session::get('session_id');
        if(empty($session_id))
        {
            $session_id = str_random(10);
            Session::put('session_id',$session_id);
        }
        $cart_items = Cart::where('session_id',$session_id)->where('product_id',$id)->where('status',1)->first();
        if(!empty($cart_items))
        {
           $cart_items->quantity = $cart_items->quantity += $request->qty;
           $total_price = $product->pr_price * $cart_items->quantity;
           $cart_items->total_price =  $total_price;
           if($cart_items->save())
            {
                return response()->json('Product Added to Cart');
            }
            else
            {
                return response()->json(array("error" => "Cannot add product to the cart"));
            }

        }
        else
        {
            $cart = new Cart();
            $cart->product_id = $product->id;
            $cart->product_name = $product->pr_name;
            $cart->price = $product->pr_price;
            $total_price = $product->pr_price * $request->qty;
            $cart->total_price = $total_price;
            $cart->status = 1;
            $cart->quantity = $request->qty;
            $cart->session_id = $session_id;
            if($cart->save())
            {
                $cart_count = Cart::where('session_id',$session_id)->count();
                Session::put('cart_count',$cart_count);
                return response()->json('Product Added to Cart');
            }
            else
            {
                return response()->json(array("error" => "Cannot add product to the cart"));
            }

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = cart::where('session_id',$request->session)->where('id',$request->id)->first();
        $product_price = $cart->price;
        $cart->quantity = $request->quantity;
        $cart->total_price = $request->quantity * $product_price;
        $cart->save();
        return 'true';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
