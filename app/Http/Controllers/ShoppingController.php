<?php

namespace App\Http\Controllers;

use App\Product;
use Session;
use Illuminate\Http\Request;
use Cart;
use function Sodium\add;

class ShoppingController extends Controller
{
    //

    public function  add_to_cart()
    {
        $pdt=Product::find(request()->pdt_id);
        $cart=Cart::add([


            'id'=>$pdt->id,
            'name'=>$pdt->name,
            'qty'=>request()->qty,
            'price'=>$pdt->price

        ]);
        Cart::associate($cart->rowId,'App\Product');
        Session::flash('success','Product added to cart.');


       return redirect()->route('cart');


    }
    public function cart()

    {


        return view('cart');
    }

    public function cartDelete($id)
    {

        Cart::remove($id);


        Session::flash('success','Product removed from cart.');
        return redirect()->back();


    }


    public function incr($id,$qty)
    {

        Cart::update($id,$qty+1);
        Session::flash('success','Product quantity increased.');
        return redirect()->back();
    }
    public function decr($id,$qty)
    {

        Cart::update($id,$qty-1);
        Session::flash('success','Product added to decreased.');
        return redirect()->back();
    }


    public function rapid_add($id)

    {
        $pdt=Product::find($id);
        $cart=Cart::add([


            'id'=>$pdt->id,
            'name'=>$pdt->name,
            'qty'=>1,
            'price'=>$pdt->price

        ]);
        Cart::associate($cart->rowId,'App\Product');


        Session::flash('success','Product added to cart.');


        return redirect()->back();


    }




}
