<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;
use Stripe;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    public function cart()
    {
        return view('cart');

    }
    public function checkout()
    {
        return view('checkout');

    }

    public function profile()
    {
        $user=User::find(Auth::user()->id);
        return view('profile',['user'=>$user]);

    }
    public function addToCart($id)
    {

        $product = DB::select('SELECT * FROM products WHERE id = ?', [$id]);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [

                "name" => $product[0]->name,

                "quantity" => 1,

                "price" => $product[0]->price,

                "image" => $product[0]->photo

            ];

        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }//================END OF ADD TO CART===========

    public function updateToCart(Request $request)
    {
        if($request->id && $request->quantity){

            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');

        }

    }//==============END OF UPDATE CART

    public function removeFromCart(Request $request)
    {

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);

            }

            session()->flash('success', 'Product removed successfully');

        }

    }//==============END OF REMOVE FROM CART


    public function stripePost(Request $request)
    {
        $total=0;
        $now = Carbon::now();
        foreach((array) session('cart') as $id => $details){
            $total += $details['price'] * $details['quantity'];
        }


        // ==================HERE BELOW PAYMENT INTEGRATION==============
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        $customer=Stripe\Customer::create(array(

            "email" => Auth::user()->email,

            "name" => Auth::user()->firstname.' '.Auth::user()->lastname,

            "source" => $request->stripeToken

         ));
        $donePayment=Stripe\Charge::create ([

                "amount" => 100* $total,

                "currency" => "usd",

                "customer" => $customer->id,

                "description" => "Payment from the customer of FootLocker"

        ]);

        if($donePayment->status=='succeeded'){//=========IF PAYMENT DONE
            $cadID=$donePayment->payment_method;
            $result = DB::insert("INSERT INTO sales (user_id, pay_id, sales_date) VALUES (:user_id, :pay_id, :sales_date)", [
                'user_id' => Auth::user()->id,
                'pay_id' => $cadID,
                'sales_date' => $now,
            ]);

            if ($result) {
                 $salesid = DB::getPdo()->lastInsertId();

                foreach((array) session('cart') as $id => $details){
                     DB::insert("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)", [
                        'sales_id' => $salesid,
                        'product_id' => $id,
                        'quantity' =>  $details['quantity'],
                    ]);
                }
            } else {
                session()->flash('error', 'insertion failed in sales');

            }


            session()->forget('cart');

            FacadesSession::flash('success', 'Payment successful!');

        }
        else{
            session()->flash('error', 'insertion failed in sales');
        }
        return back();

    }




}
