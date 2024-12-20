<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id'; 

    protected $fillable = [
        'category_name',
        'category_img',
        'mall_id', // هذا الحقل يتواجد لربط الفئة بالمول
        'category_descrbtion',
    ];

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id'); // علاقة بين الفئة والمول
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
