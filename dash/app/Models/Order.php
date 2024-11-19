<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_total_pric',
        'order_status',
        'user_id',
        'mall_id',
        'address',
        'created_at',
        'updated_at',
    ];

    // App\Models\Order



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }
    
public function products()
{
    return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')
                ->withPivot('quantity', 'price', 'total_price');
}

}
