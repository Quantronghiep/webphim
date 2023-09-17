<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterMovieMonth extends Model
{
    use HasFactory;
    protected $table = 'register_movie_month';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
       'user_id', 'price','payment_status','registration_date','expiration_date'
   ];

   public function user()
    {
        return $this->belongsTo(User::class);
    }

}
