<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'title', 'description','status','slug','position'
   ];

   public function createCategory($params = []){
        $this->title = $params['title'];
        $this->description = $params['description'];
        $this->status = $params['status'];
        $this->position = count(Category::all());
        $this->slug = $params['slug'];
        $this->save();
   }

   public function updateCategory($params = [], $id){
        $categoryFindId = Category::find($id);
        $categoryFindId->update([
            'title' => $params['title'],
            'description' => $params['description'],
            'status' => $params['status'],
            'slug' => $params['slug']
        ]);
   }

   public function movie(){
        return $this->hasMany(Movie::class)->orderBy('id','DESC');
   }
}
