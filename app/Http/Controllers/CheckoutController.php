<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use Response;
use App\User;
use App\Order;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id',$user_id)->first();
        $session_id = Session::get('session_id');
        $cart_items = Cart::getCart($session_id);
        return view('pages.checkout',compact('cart_items','user'));
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
        
        $user_id = Auth::user()->id;
        $orderno = 1;
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        if($latestOrder)
        {
            $orderno = $latestOrder->id;
        }
        $validator = Validator::make($request->all(),[
            'first_name' => 'required| string |max:25',
            'last_name' => 'required| string |max:25',
            'address' => 'required| string |max:255',
            'city' => 'required| string |max:25',
            'country' => 'required| string |max:25',
            'phone' => 'required|string|max:11|regex:/^[0-9]+$/',
            'province' => 'required| string |max:25',
            'email' => 'required|string|email|max:25',
            'post_code' => 'required| string |max:25',
            'payment_type' => 'required'
        ]);
        if($validator->passes())
        {
            $cart = Cart::where('session_id',$request->cart_id)->get();
            $total_price = $cart->sum->total_price;
            $order = new Order;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->country = $request->country;
            $order->province = $request->province;
            $order->phone = $request->phone;
            $order->user_id = $user_id;
            $order->email = $request->email;
            $order->post_code = $request->post_code;
            $order->order_code = '#'.str_pad($orderno + 1, 8, "0", STR_PAD_LEFT);
            $order->payment_type = $request->payment_type;
            $order->cart_id = $request->cart_id;
            $order->status = "processing";
            $order->comment = $request->comment;
            $order->total_price = $total_price; 
            $order->save();
            Session::forget('cart_items');
            Session::forget('total_price');
            return 'true';
        }
        else
        {
            return response()->json(['error'=>$validator->errors()->all()]);
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
        //
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
