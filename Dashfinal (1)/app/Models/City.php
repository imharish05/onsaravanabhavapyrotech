<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
    protected $table = "city_list";
    protected $guarded = [];
    public $timestamps = false;

    public function state() {
        return $this->belongsTo(State::class, 'state_code', 'id');
    }
}
