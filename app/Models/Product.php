<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasFactory, HasApiTokens, SoftDeletes;

    protected $fillable = ['title', 'price', 'description'];

    public function image() {
        return $this->belongsTo(ProductImage::class, 'id', 'product_id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }
}
