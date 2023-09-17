<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $table = 'statistics';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
       'order_date', 'revenue','quantity_movie','total_order'
   ];

}
