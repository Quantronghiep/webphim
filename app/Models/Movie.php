<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'title', 'description','status','slug','image','category_id','genre_id',
       'country_id','phim_hot','name_eng','resolution','phude','year','thoiluong','tags',
       'topview','season','trailer','sotap','thuocphim','count_views','price'
   ];

   public function createMovie($params = []){
        $this->title = $params['title'];
        $this->thoiluong = $params['thoiluong'];
        $this->name_eng = $params['name_eng'];
        $this->description = $params['description'];
        $this->status = $params['status'];
        $this->phim_hot = $params['phim_hot'];
        $this->resolution = $params['resolution'];
        $this->phude = $params['phude'];
        $this->slug = $params['slug'];
        $this->category_id = $params['category_id'];
        $this->country_id = $params['country_id'];
        $this->year = $params['year'];
        $this->topview = $params['topview'];
        $this->tags = $params['tags'];
        $this->season = $params['season'];
        $this->trailer = $params['trailer'];
        $this->sotap = $params['sotap'];
        $this->thuocphim = $params['thuocphim'];
        $this->price = $params['price'];
        $this->image = $params['image'];
        $this->count_views = rand(100,99999);
        foreach($params['genre'] as $genre){
            $this->genre_id = $genre[0];
        }
        if(!empty($this->image)){
            $generatedImage = 'image'.time().'-'. $this->title .'.'.$this->image->extension();
            //move to a folder
            $this->image->move(public_path('uploads/movies') , $generatedImage);
            $this->image = $generatedImage;
        }
        $this->save();
        //Them nhieu the loai cho phim
        $this->movie_genre()->attach($params['genre']);
   }

   public function updateMovie($params = [], $id){
        $movieFindId = Movie::find($id);
        foreach($params['genre'] as $genre){
            $this->genre_id = $genre[0];
        }
        $movieFindId->update([
            'title' => $params['title'],
            'thoiluong' => $params['thoiluong'],
            'name_eng' => $params['name_eng'],
            'description' => $params['description'],
            'status' => $params['status'],
            'phim_hot' => $params['phim_hot'],
            'resolution' => $params['resolution'],
            'phude' => $params['phude'],
            'slug' => $params['slug'],
            'category_id' => $params['category_id'],
            'country_id' => $params['country_id'],
            'year' => $params['year'],
            'topview' => $params['topview'],
            'tags' => $params['tags'],
            'season' => $params['season'],
            'trailer' => $params['trailer'],
            'sotap' => $params['sotap'],
            'genre_id' => $this->genre_id,
            'thuocphim' => $params['thuocphim'],
            'price' => $params['price'],
        ]);

        $this->image = $params['image'];

        if (!empty($params['image'])) {
            $destination = 'uploads/movies/' . $movieFindId['image'];
            if (File::exists($destination)) {
                File::delete($destination);
            };
            $generatedImage = 'image' . time() . '-' . $params['title'] . '.' . $this->image->extension();
            //move to a folder
            $params['image']->move(public_path('uploads/movies'), $generatedImage);
            $movieFindId->update([
                'image' => $generatedImage
            ]);
        }
        $movieFindId->movie_genre()->sync($params['genre']);
        // else {
        //     $movieFindId->update(['image' => $movieFindId['image']]);
        // }
   }

    public function category()
    {
       return $this->belongsTo(Category::class,'category_id');
    //    return $this->belongsTo(Category::class,'categories','category_id','id');
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    // 1 phim co nhieu the loai
    public function movie_genre()
    {
        return $this->belongsToMany(Genre::class,'movie_genre','movie_id','genre_id');//ten bang,ten 2 cot
    }
    //1 phim nhieu so tap
    public function episode()
    {
        return $this->hasMany(Episode::class);
    }

     // 1 phim co nhieu hoa don
     public function orders()
     {
         return $this->belongsToMany(Order::class,'order_details','order_id','genre_id');//ten bang,ten 2 cot
     }
}
