<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVarient extends Model {
    use HasFactory;
    protected $fillable = [ 'category_id', 'subcategory_id', 'product_id', 'varient', 'varient_img', 'varient_name', 'value', 'offer_price', 'mrp_price', 'product_qty', 'low_stock', 'hot_deals', 'Popular_products', 'product_gst', 'size_value' ];
}