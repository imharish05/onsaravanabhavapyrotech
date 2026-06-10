<?php

namespace App\Models;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    use HasFactory;

    protected $table = 'navbars';
    protected $fillable = ['navbar_name'];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'navbar_id');
    }
}
