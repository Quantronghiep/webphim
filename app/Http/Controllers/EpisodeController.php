<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; 
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function indexEpisodeByMovieId($movie_id){
        $list_episode_add = Episode::with('movie')->where('movie_id',$movie_id)->orderBy('episode','DESC')->get();
        return view('admin.episode.index-episode-by-movie-id',[
            'list_episode_add' => $list_episode_add,
        ]);
    }
    public function createEpisodeByMovieId($movie_id){
        $movie = Movie::find($movie_id);
        $episode_add = Episode::with('movie')->where('movie_id',$movie_id)->orderBy('episode','DESC')->get();
        if(count($episode_add)>0){
            foreach($episode_add as $ep_add)
                $arr_ep_add[] = $ep_add['episode'];
        }
        else
            $arr_ep_add[] = [];
        return view('admin.episode.create-episode',[
            'movie' => $movie,
            'arr_ep_add' => $arr_ep_add,
        ]);
    }

    public function getEpisodeByMovie(Request $request){
        $movie_by_id = Movie::find($request->id);
        return $movie_by_id->sotap;
    }
    public function index()
    {
        $list_episode = Episode::with('movie')->orderBy('movie_id','DESC')->get();
        return view('admin.episode.index',[
            'list_episode' => $list_episode,
        ]);
    }

    public function create()
    {
        $list_movie = Movie::orderBy('id','DESC')->pluck('title','id');
        return view('admin.episode.create',[
            'list_movie' => $list_movie,
        ]);
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $episode = new Episode();
        $episode->createEpisode($params);
        return redirect('admin/movie')->with('success','Create success!');
    }


    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $episode = Episode::with('movie')->find($id);
        // return response()->json($episode);
        return view('admin.episode.edit',[
            'episode' => $episode,
        ]);
    }

    public function update(Request $request, $id)
    {
        $episode = new Episode();
        $params = $request->all();
        $episode->updateEpisode($params,$id);
        return redirect('admin/episode')->with('success','Update success!');
    }

    public function destroy($id)
    {
        Episode::find($id)->delete();
        return redirect('admin/episode')->with('success','Delete success!');
    }
}
