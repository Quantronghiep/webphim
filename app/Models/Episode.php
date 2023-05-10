<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $table = 'episodes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'movie_id', 'linkphim','episode',
   ];

    public function createEpisode($params = []){
        $this->movie_id = $params['movie_id'];
        $this->linkphim = $params['link'];
        $this->episode = $params['episode'];
        $this->save();
    }

    public function updateEpisode($params = [],$id){
        $episodeFindId = Episode::find($id);
        $episodeFindId->update([
            'movie_id' => $params['movie_id'],
            'linkphim' =>  $params['link'],
            'episode' => $params['episode']
        ]);
    }

    public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
