<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'title', 'description','status','slug'
   ];

   public function createGenre($params = []){
        $this->title = $params['title'];
        $this->description = $params['description'];
        $this->status = $params['status'];
        $this->slug = $params['slug'];
        $this->save();
   }

   public function updateGenre($params = [], $id){
        $genreFindId = Genre::find($id);
        $genreFindId->update([
            'title' => $params['title'],
            'description' =>  $params['description'],
            'status' => $params['status'],
            'slug' => $params['slug']
        ]);
   }

   //1 the loai co 1 phim
   public function movie()
   {
       return $this->belongsTo(Movie::class);
   }
}
