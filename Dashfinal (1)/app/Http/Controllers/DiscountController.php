<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function adddiscount(Request $request)
{
    $discount = $request->discount;

    // Create the discount record
    Discount::create([
        "discount" => $discount,
    ]);

    // Apply the discount to all products and update their regular prices
    $products = Product::all();

    foreach ($products as $product) {
        // Calculate the new price based on the discount
        $newPrice = $product->product_mrp_price * (1 - $discount / 100);

        // Update the product's regular price
        $product->product_regular_price = $newPrice;
        $product->save();
    }

    return response()->json([
        'status' => '200',
        'message' => 'Discount applied and products updated successfully.']);
}

}
