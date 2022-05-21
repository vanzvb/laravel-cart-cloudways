<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        //debug var_dump(session('cartItems'));
        //debug dd(session('cartItems')); 
        return view('cart.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id); //getting data in db
        $cartItems = session()->get('cartItems', []);

        //if id is already added ++ else new item added to cart
        if(isset($cartItems[$id])) {
            $cartItems[$id]['quantity']++;
        } else{
            $cartItems[$id] = [
                "image_path" => $product->image_path,
                "name" => $product->name,
                "details" => $product->details,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cartItems', $cartItems);
        return redirect()->back()->with('success', 'Product added to cart !');
    }

    public function delete(Request $request)
    {
        if ($request->id) {
            $cartItems = session()->get('cartItems');

            if(isset($cartItems[$request->id]))
            {
                unset($cartItems[$request->id]);
                session()->put('cartItems',$cartItems);
            }
            return redirect()->back()->with('success', 'Product delete sucessfully');
        }
    }
}
