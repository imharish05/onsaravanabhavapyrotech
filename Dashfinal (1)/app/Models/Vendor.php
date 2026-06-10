<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model {
    use HasFactory;
    protected $fillable = [ 'vendor_name', 'vendor_email', 'contact_name', 'contact_phone', 'business_type', 'gst_number', 'vendor_address', 'vendor_country', 'vendor_state', 'vendor_district', 'vendor_pincode', 'vendor_bank_name', 'vendor_account_name', 'vendor_account_number', 'vendor_ifsc_number', 'vendor_status' ];
}