<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id'; 


    protected $fillable = [
        'product_image',
        'product_name',
        'product_descrbtion',
        'product_price',
        'category_id',
        
    ];




    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_id');
    }
    public function singleProduct()
    {
        return $this->hasMany(SingleProduct::class, 'product_id');
    }
    public function imgProducts()
    {
        return $this->hasMany(ImgProduct::class, 'product_id');
    }


    
    public function order()
    {
        return $this->hasOne(order::class, 'product_id');
    } 
}
