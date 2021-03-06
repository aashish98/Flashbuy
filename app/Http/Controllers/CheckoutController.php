<?php

namespace App\Http\Controllers;


use App\order;
use App\Product;
use App\order_product;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tax = Config('cart.tax');
        return view('checkout')->with(['tax'=> $tax]);

    }
    public function chargePayment(Request $request)
    {
        
        $total = $request->input('money');
        $replaced = Str::replaceArray(',', [''], $total);
        $final = strstr($replaced, '.', true) ?: $replaced;
        \Stripe\Stripe::setApiKey(Config('app.stripePrivateKey'));
        $token = $_POST['stripeToken'];
        try{
        $customer = \Stripe\Customer::create(array(
            'name' => $request->input('name'),
            'description' => 'test description',
            'email' => $request->input('email'),
            "address" => ["city" => 'gurga', "country" => 'india', "line1" => 'bikaji', "line2" => "", "postal_code" => '112233', "state" => 'delhi']
        ));
        $charge = \Stripe\Charge::create([
            'amount'=>$final*100,
            'currency'=>'inr',
            'description'=>'example order',
            'source'=>$token,
        ]);
        Session::flash('success-message', 'Payment Done Successfully');
        Cart::destroy();

        
        
        $order = new order;
        $order->u_id = $request->input('u_id');
        $order->save();
        $oid = $order->id;


        $productCount = $request->input('product_count');
        print_r($productCount);
        for($i = 1; $i<=$productCount;  $i++)
        {
            print_r($i);
            print_r($request->input('product_'.$i.'_name'));
            
            $order_product = new order_product;

            $order_product->name = $request->input('product_'.$i.'_name');
            $order_product->price = $request->input('product_'.$i.'_price');
            $order_product->details = $request->input('product_'.$i.'_details');
            $order_product->slug = $request->input('product_'.$i.'_slug');

            $order_product->o_id = $oid;
           

            //print_r($order_product->name);
            $order_product->save();
        }
       
        
        return redirect('shop');
        }
        catch(\Exception $e){

        Session::flash('fail-message', 'Error!');
        }

        
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
