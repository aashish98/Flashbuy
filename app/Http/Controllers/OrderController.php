<?php

namespace App\Http\Controllers;

use Session;
use App\order;
use App\order_product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$orders1 = order::all()->join('order_product', 'id', 'o_id');

        
        $u_id = Session::get('user')[3];
        $orders = order::all()->where('status','=','1')->where('u_id','=',$u_id);
        return view('orderUser')->with('orders', $orders);
    }

    public function admin_index()
    {

        // $ordersWithProducts = order::all()->hasMany("App\order_product", "o_id" , "id");
        // print_r($ordersWithProducts);

        $orders = order::all()->where('status','=','1');
        return view('orderAdmin')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
