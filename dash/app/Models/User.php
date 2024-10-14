<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $primaryKey = 'user_id'; 

    public $incrementing = true; 
    protected $fillable = [
        
        'user_first_name',
        'user_last_name' ,
        'user_email',
        'user_password',
        'user_mobile',
        'user_address',
        'gender' ,
        'date_of_birth' ,
        'user_image',
        'type',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class, 'user_id');
    }

    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class, 'user_id');
    }

    public function image_slideers()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

    

    
   

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'user_id');
    }

   

  


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
  

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
   

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
   
}
