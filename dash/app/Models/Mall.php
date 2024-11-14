<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    use HasFactory;

    protected $primaryKey = 'mall_id';
    public $incrementing = true;

    protected $fillable = [
        'mall_image',
        'mall_name',
        'mall_address',
        'mall_descrbtion',
        'user_id', // This field is used to relate the mall with a user
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'mall_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
