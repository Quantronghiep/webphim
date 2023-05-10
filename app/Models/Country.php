<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'title', 'description','status' , 'slug'
   ];

   public function createCountry($params = []){
        $this->title = $params['title'];
        $this->description = $params['description'];
        $this->status = $params['status'];
        $this->slug =  $params['slug'];
        $this->save();
   }

   public function updateCountry($params = [], $id){
        $countryFindId = Country::find($id);
        $countryFindId->update([
            'title' => $params['title'],
            'description' =>  $params['description'],
            'status' => $params['status'],
            'slug' => $params['slug']
        ]);
   }
}
