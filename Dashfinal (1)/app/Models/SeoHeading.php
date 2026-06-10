<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoHeading extends Model
{
    protected $table = "seo_heading";
    protected $guarded = [];
    use HasFactory;

    public function seoDatas()
    {
        return $this->hasMany(SeoData::class, 'seo_headingId');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($seoHeading) {
            $seoHeading->seoDatas()->delete();
        });
    }
}
