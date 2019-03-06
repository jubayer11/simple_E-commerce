<?php

namespace App\Http\Controllers;
use Cart;
use Session;
use Mail;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    //


    public function index()


    {
        if(Cart::content()->count()==0)
        {
            Session::flash('info','your cart is still empty.do some shopping');
            return redirect()->back();
        }


        return view('checkout');
    }

    public function pay()
    {

        Stripe::setApiKey("sk_test_jpJ4t2vzMSydg8t9m3hLv2bM");
        $token=request()->stripeToken;


        $charge=Charge::create([

            'amount'=>Cart::total()*100,
            'currency'=>'usd',
            'description'=>'udemy course practice selling books',
            'source'=>request()->stripeToken


        ]);

        Session::flash('success','purchas successful.wait for our email.');
        Cart::destroy();
        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchasSuccessful());

        return redirect('/');





    }

}
