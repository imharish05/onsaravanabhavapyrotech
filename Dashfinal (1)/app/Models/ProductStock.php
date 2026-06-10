<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model {
    use HasFactory;
    protected $fillable = [ 'category_id', 'subcategory_id', 'product_id', 'varient_id', 'productname', 'overallstock', 'availablestock', 'salestock', 'low_stocks', 'last_stockupdate_date', 'vendor_id' ];

    public function user() {
        return $this->belongsTo( User::class, 'vendor_id' );
    }

    public function vendor() {
        return $this->belongsTo( Vendor::class, 'vendor_id' );
    }

    public function product() {
        return $this->belongsTo( Product::class, 'product_id' );
    }

    public function category() {
        return $this->belongsTo( Category::class, 'category_id' );
    }
}