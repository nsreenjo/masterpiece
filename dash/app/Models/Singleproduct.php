<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singleproduct extends Model
{
    use HasFactory;


    protected $primaryKey = 'mall_id'; 

    public $incrementing = true; 

    protected $fillable = [
        'Quantity',
        'Comment',
        'mall_address',
        'mall_descrbtion',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}


