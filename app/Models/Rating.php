<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rating';
    protected $primaryKey = 'id';

    protected $fillable = [
       'rating', 'movie_id','ip_address'
   ];

}
