<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $guarded = 'admin';
    public $timestamps = true;

    protected $fillable = [
       'email', 'password','type',
   ];
}
