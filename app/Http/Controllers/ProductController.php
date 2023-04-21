<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list_products(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $products = Product::all();
            return view('product.staff_list', compact('products'));
        } else {

        }
    }

    public function detail_product(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        $product_id = (int) $request->route('product_id');
        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $product = Product::find($product_id);
            return view('product.staff_detail', compact('product'));
        } else if ($profile_type == 'employee') {
            $product = Product::where([
                ['id', '=', $product_id],
                ['product_id', '=', $profile->product->id]
            ]);
            return view('product.product_detail', compact('product'));
        } else {

        }
    }

    public function create_product(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $product = Product::create([
                
            ]);
        } else {

        }

        return back();
    }

    public function update_product(Request $request)
    {

        $user = $request->user();
        $profile = $user->profile;
        $profile_type = $profile->type;
        $profile_id = $profile->id;

        $product_id = (int) $request->route('product_id');

        if ($profile_type == 'admin' || $profile_type == 'staff') {
            $product = Product::find($product_id);
            $product->update([]);
        } else if ($profile_type == 'employee') {
            $product = Product::where([
                ['id', '=', $product_id],
            ])->first();
            $product->update([]);
        } else {

        }    

        return back();
    }
}
