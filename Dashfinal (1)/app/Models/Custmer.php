<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custmer extends Model
{
    protected $table = "customers";
    protected $guarded = [];
    use HasFactory;
}
