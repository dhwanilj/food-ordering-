<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dishes;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::selectRaw("users.name as customer_name,users.address as customer_address,dishes.name as dish_name,orders.created_at")
        ->join('dishes','dishes.id','=','orders.dish_id')
        ->join('users','users.id','=','orders.user_id')->whereRaw('orders.restaurant_id =?',Auth::id())->get();
        //dd($orders);
        // $orders = Orders::whereRaw('restaurant_id = ?',Auth::id())->get();
        return view('orders_restaurant')->with('orders',$orders);
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
       
        $orders =  New Orders();
        $orders->user_id =Auth::id();
        $orders->dish_id = $request->dish_id;
        $orders->restaurant_id = $request->restaurant_id;
        $orders->save();
        $dish=Dishes::find($orders->dish_id);
        $customer=User::find(Auth::id());
        return view('order_complete')->with('orders',$orders)->with('dish',$dish)->with('customer',$customer);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
