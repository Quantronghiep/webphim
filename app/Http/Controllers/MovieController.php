<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function watchVideo(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $video = Episode::where('movie_id',$data['movie_id'])->where('episode',$data['episode'])->first();
        $output['video_title'] = $movie->title.' - Tập '.$video->episode;
        $output['video_desc'] = $movie->description;
        $output['video_link'] = $video->linkphim;
        return $output;
        // echo json_encode($output);
    }
    public function filterTopViewPhimDefault(){
        $movie = Movie::where('topview',0)->orderBy('updated_at','DESC')->take(20)->get();
        $output = '';
        foreach($movie as $mov){
            if($mov->resolution == 0)
                $text = 'HD';
            elseif($mov->resolution == 1)
                $text = 'SD';
            elseif($mov->resolution == 2)
                $text = 'FullHD';
            else
                $text = 'Trailer';
            $output .= '<div class="item post-37176">
                <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                <div class="item-link">
                    <img src="'.url('uploads/movies/' . $mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" />
                    <span class="is_trailer">'.$text.'</span>
                </div>
                <p class="title">'.$mov->title.'</p>
                </a>
                <div class="viewsCount" style="color: #9d9d9d;">'.$mov->count_views.' lượt quan tâm</div>
                <ul class="list-inline rating" style="margin-left:0"  title="Average Rating">';

                        for($count=1; $count<=5; $count++){
                            $output.= '<li title="star_rating" 
                            style="cursor:pointer; color:#ffcc00;padding:0;
                            font-size:16px;">&#9733;</li>';
                        }
                         
                    
                     $output.= '</ul>
                <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                <span style="width: 0%"></span>
                </span>
                </div>
            </div>';
        }
        echo $output;
    }
    public function filterTopViewPhim(Request $request){
        $params = $request->all();
        $movie = Movie::where('topview',$params['value'])->orderBy('updated_at','DESC')->take(20)->get();
        $output = '';
        foreach($movie as $mov){
            if($mov->resolution == 0)
                $text = 'HD';
            elseif($mov->resolution == 1)
                $text = 'SD';
            elseif($mov->resolution == 2)
                $text = 'FullHD';
            else
                $text = 'Trailer';
            $output .= '<div class="item post-37176">
                <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                <div class="item-link">
                    <img src="'.url('uploads/movies/' . $mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" />
                    <span class="is_trailer">'.$text.'</span>
                </div>
                <p class="title">'.$mov->title.'</p>
                </a>
                <div class="viewsCount" style="color: #9d9d9d;">'.$mov->count_views.' lượt quan tâm</div>
                <ul class="list-inline rating" style="margin-left:0"  title="Average Rating">';

                        for($count=1; $count<=5; $count++){
                            $output.= '<li title="star_rating" 
                            style="cursor:pointer; color:#ffcc00;padding:0;
                            font-size:16px;">&#9733;</li>';
                        }
                         
                    
                     $output.= '</ul>
                <div style="float: left;">
                <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                <span style="width: 0%"></span>
                </span>
                </div>
            </div>';
        }
        echo $output;
    }
    
    public function updateSeasonPhim(Request $request){
        $params = $request->all();
        $movie = Movie::find($params['id_phim']);
        $movie->season = $params['season'];
        $movie->save();
    }

    public function updateTopView(Request $request){
        $params = $request->all();
        $movie = Movie::find($params['id_phim']);
        $movie->topview = $params['topview'];
        $movie->save();
    }
    
    public function updateYearPhim(Request $request){
        $params = $request->all();
        $movie = Movie::find($params['id_phim']);
        $movie->year = $params['year'];
        $movie->save();
    }
    public function index()
    {
        // $movies = DB::table('movies')
        //             ->join('categories','movies.category_id','=','categories.id')
        //             ->join('genres','movies.genre_id','=','genres.id')
        //             ->join('countries','movies.country_id','=','countries.id')
        //             ->select('categories.title as category_title','genres.title as genre_title','countries.title as country_title', 'movies.*')
        //             ->get();
        $movies = Movie::with('category','movie_genre','country','genre')->withCount('episode')->orderBy('id','DESC')->get();
        // dd($movies);
        //xuat file json
        // $destinationPath = public_path()."/json_file/";
        $destinationPath = public_path("json_file/");
        if(!is_dir($destinationPath)){
            mkdir($destinationPath,0777,true); //0777 toan` quyen` them sua xoa
        }
        File::put($destinationPath.'movies.json',json_encode($movies));
        
        return view('admin.movie.index',[
            'movies' => $movies,     
        ]);
    }

    public function create()
    {
        $movies = Movie::orderBy('id','DESC')->get();
        $categories = Category::pluck('title','id'); // pluck lấy các trường cần thiết, chuyển thành kiểu mảng ( collections)
        $genres = Genre::pluck('title','id');
        $countries = Country::pluck('title','id');
        $list_genre = Genre::all();
        return view('admin.movie.create',[
            'movies' => $movies,
            'categories' => $categories,
            'genres' => $genres,
            'countries' => $countries,
            'list_genre' => $list_genre,
        ]);
    }

    public function store(Request $request)
    {
        $params = $request->all();
        $params['image'] = $request->file('image');
        // dd($request->file('image'));
        $movie = new Movie();
        $movie->createMovie($params);
        return redirect('admin/movie')->with('success','Create success!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        // dd($movie);
        $movie_genre = $movie->movie_genre;
        $categories = Category::pluck('title','id'); // pluck lấy các trường cần thiết, chuyển thành kiểu mảng
        $genres = Genre::pluck('title','id');
        $countries = Country::pluck('title','id');
        $list_genre = Genre::all();
        // return response()->json($movie_genre);
        return view('admin.movie.edit',[
            'movie' => $movie,
            'categories' => $categories,
            'genres' => $genres,
            'list_genre' => $list_genre,
            'countries' => $countries,
            'movie_genre' => $movie_genre,
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();
        $movie = new Movie();
        $params['image'] = $request->file('image');
        $movie->updateMovie($params,$id);
        return redirect('admin/movie')->with('success','Update success!');
    }

    
    public function destroy($id)
    {
        $movie = Movie::find($id);
        //xoa' anh
        $destination = 'uploads/movies/' . $movie->image;
        if (File::exists($destination)) {
            File::delete($destination);
        };
        //xoa the loai ( cach 1)
        Movie_Genre::whereIn('movie_id',[$movie->id])->delete();
        //xoa tap phim
        Episode::whereIn('movie_id',[$movie->id])->delete();
        $movie->delete();
        return redirect('admin/movie')->with('success','Delete success!');

        // cach 2 : casecade : nối mối quan hệ trong DB
        
    }
}
