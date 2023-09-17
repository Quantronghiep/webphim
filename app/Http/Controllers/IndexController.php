<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Rating;
use App\Models\RegisterMovieMonth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function addRating(Request $request){
        $data = $request->all();
        // dd($data);
        $ip_address = $request->ip();
        $rating_count = Rating::where('movie_id',$data['movie_id'])->where('ip_address',$ip_address)->count();
        if($rating_count > 0){
            return 1;
        }
        else{
            $rating = new Rating();
            $rating->movie_id = $data['movie_id'];
            $rating->rating = $data['index'];
            $rating->ip_address = $ip_address;
            $rating->save();
            return 0;
        }
    }
    public function locphim(){
        $sapXep = $_GET['order'] ?? '';
        $genre = $_GET['genre'] ?? '';
        $country = $_GET['country'] ?? '';
        $year = $_GET['year'] ?? '';

        // Lưu trữ các giá trị $_GET ban đầu
        $originalParams = [
            'order' => $sapXep,
            'genre' => $genre,
            'country' => $country,
            'year' => $year,
        ];


        if($sapXep =='' && $genre == '' && $country == '' && $year == ''){
            return redirect()->back();
        }
        else {
            if($sapXep == "watch_view" && $genre == '' && $country == '' && $year == ''){
                $movie = Movie::withCount('episode')
                                ->orderBy('count_views', 'DESC') 
                                ->orderBy('updated_at', 'DESC')
                                ->paginate(8);
            } 
            elseif($sapXep == "watch_view" || $genre != '' |! $country == '' || $year != '') {
                $movie = Movie::withCount('episode')->whereHas('movie_genre', function($query) use ($genre) {
                    $query->where('genre_id', $genre);
                })->orWhere('country_id', $country)
                    ->orWhere('year', $year)
                    ->orderBy('count_views', 'DESC') 
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(8);
            }
            if($sapXep == "name_a_z" && $genre == '' && $country == '' && $year == ''){
                $movie = Movie::withCount('episode')
                                ->orderBy('title', 'ASC') 
                                ->orderBy('updated_at', 'DESC')
                                ->paginate(8);
            } 
            elseif($sapXep == "name_a_z" || $genre != '' |! $country == '' || $year != '') {
                $movie = Movie::withCount('episode')->whereHas('movie_genre', function($query) use ($genre) {
                            $query->where('genre_id', $genre);
                        })->orWhere('country_id', $country)
                            ->orWhere('year', $year)
                            ->orderBy('title', 'ASC') 
                            ->orderBy('updated_at', 'DESC')
                            ->paginate(8);
            }
            if($sapXep == "year_release" && $genre == '' && $country == '' && $year == ''){
                $movie = Movie::withCount('episode')
                                ->orderBy('year', 'DESC') 
                                // ->orderBy('updated_at', 'DESC')
                                ->paginate(8);
            } 
            elseif($sapXep == "year_release" || $genre != '' |! $country == '' || $year != '') {
                $movie = Movie::withCount('episode')->whereHas('movie_genre', function($query) use ($genre) {
                            $query->where('genre_id', $genre);
                        })->orWhere('country_id', $country)
                            ->orWhere('year', $year)
                            ->orderBy('year', 'DESC') 
                            ->orderBy('updated_at', 'DESC')
                            ->paginate(8);
            }
            if($sapXep == "date" && $genre == '' && $country == '' && $year == ''){
                $movie = Movie::withCount('episode')
                                ->orderBy('created_at', 'DESC') 
                                ->orderBy('updated_at', 'DESC')
                                ->paginate(8);
            } 
            elseif($sapXep == "date" || $genre != '' |! $country == '' || $year != '') {
                $movie = Movie::withCount('episode')->whereHas('movie_genre', function($query) use ($genre) {
                            $query->where('genre_id', $genre);
                        })->orWhere('country_id', $country)
                            ->orWhere('year', $year)
                            ->orderBy('created_at', 'DESC') 
                            ->orderBy('updated_at', 'DESC')
                            ->paginate(8);
            }
            $movie->appends($originalParams)->links();
           
            return view('pages.filter-movie', [
                'movie' =>  $movie,
                ]);
        }
    }

    public function timKiemPhim()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $movie = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('updated_at', 'DESC')->paginate(8);
            return view('pages.searchphim', [
                'search' =>  $search,
                'movie' =>  $movie,
            ]);
        } else {
            redirect()->to('/');
        }
    }

    public function home()
    {
        $phimhot = Movie::where('phim_hot', 1)->where('status', 1)->orderBy('updated_at', 'DESC')->get();
        $category_home = Category::with(['movie' => function($q){$q->withCount('episode');}])->orderBy('position', 'ASC')->where('status', 1)->get();
        return view('pages.home', [
            'category_home' => $category_home,
            'phimhot' => $phimhot,
        ]);
    }
    public function category($slug)
    {
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::withCount('episode')->where('category_id', $cate_slug->id)->orderBy('updated_at', 'DESC')->paginate(8);
        return view('pages.category', [
            'cate_slug' =>  $cate_slug,
            'movie' =>  $movie,
        ]);
    }
    public function locTheoNam($year)
    {
        $movie = Movie::withCount('episode')->where('year', $year)->orderBy('updated_at', 'DESC')->paginate(8);
        return view('pages.year', [
            'year' =>  $year,
            'movie' =>  $movie,
        ]);
    }
    public function tag($tag)
    {
        $movie = Movie::withCount('episode')->where('tags', 'LIKE', '%' . $tag . '%')->orderBy('updated_at', 'DESC')->paginate(8);
        return view('pages.tag', [
            'tag' =>  $tag,
            'movie' =>  $movie,
        ]);
    }
    public function genre($slug)
    {
        $genre_slug = Genre::where('slug', $slug)->first();
        //nhieu the loai
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->pluck('movie_id');
        // dd($movie_genre);
        // return $movie_genre;
        $movie = Movie::withCount('episode')->whereIn('id', $movie_genre)->orderBy('updated_at', 'DESC')->paginate(8);
        return view('pages.genre', [
            'genre_slug' => $genre_slug,
            'movie' => $movie,
        ]);
    }
    public function country($slug)
    {
        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::withCount('episode')->where('country_id', $country_slug->id)->orderBy('updated_at', 'DESC')->paginate(8);
        return view('pages.country', [
            'country_slug' => $country_slug,
            'movie' => $movie,
        ]);
    }

    public function movie($slug)
    {
        $movie = Movie::with('category', 'country', 'genre', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        $movie_related = Movie::with('category', 'country', 'genre')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $episode_first = Episode::with('movie')->orderBy('episode', 'ASC')->first()->episode;
        // dd($episode_first);
        //so tap phim da them
        $count_episode = count($movie->episode->all());
        //rating
        $rating = Rating::where('movie_id',$movie->id)->avg('rating');
        $rating = round($rating);
        // dd($rating);
        $count_total = Rating::where('movie_id',$movie->id)->count();
        //views
        $movie->count_views += 1;
        $movie->save();
        $check_register_month = 0;
        if(auth()->guard('web')->check()){
            $is_payment = DB::table('orders')
                        ->join('users','orders.user_id','=','users.id')
                        ->join('order_details','orders.id','=','order_details.order_id')
                        ->join('movies','order_details.movie_id','=','movies.id')
                        ->where('users.id','=',auth()->guard('web')->user()->id)
                        ->where('order_details.movie_id','=',$movie->id)
                        ->value('payment_status');
                    
            $registerMonth = RegisterMovieMonth::with('user')->where('user_id',auth()->guard('web')->user()->id)->orderBy('expiration_date','DESC')->first();
            // dd(Carbon::parse($registerMonth->expiration_date)->toDateString());
            if(isset($registerMonth)){
                $ngayHetHan = Carbon::parse($registerMonth->expiration_date);
                if($ngayHetHan->diffInDays(Carbon::now('Asia/Ho_Chi_Minh')) >= 0)
                    $check_register_month = 1;
                else
                    $check_register_month = 0;
            }
        }
        else{
            $is_payment = 0;
        }
        return view('pages.movie', [
            'movie' => $movie,
            'movie_related' => $movie_related,
            'episode_first' => $episode_first,
            'count_episode' => $count_episode,
            'rating' => $rating,
            'count_total' => $count_total,
            'is_payment' => $is_payment,
            'check_register_month' => $check_register_month,
        ]);
    }
    public function watch($slug,$episode)
    {
        // $episode_first = Episode::with('movie')->orderBy('episode', 'ASC')->first()->episode;
        // if (isset($_GET['episode'])) {
        //     $tap_phim = intval($_GET['episode']);
        //     // $tap_phim = $episode;
        // } 
        // else {
        //     $tap_phim = $episode_first;
        // }
        // dd($tap_phim);
        
        $tap_phim = $episode;
       
        $movie = Movie::with('category', 'country', 'genre', 'movie_genre', 'episode')->where('slug', $slug)->where('status', 1)->first();
        $movie_related = Movie::with('category', 'country', 'genre')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $episode = Episode::with('movie')->where('movie_id', $movie->id)
                ->where('episode', $tap_phim)->first();
        
        // $episode->status = 1;
        // $episode->save(); 
        $count_episode = count($movie->episode->all());
        return view('pages.watch', [
            'movie' => $movie,
            'movie_related' => $movie_related,
            'tap_phim' => $tap_phim,
            'episode' => $episode,
            'count_episode' => $count_episode,
        ]);
    }
    public function episode()
    {
        //         $url = 'https://ophim1.com/phim/navalny';
        // $json = file_get_contents($url);
        // $data = json_decode($json);
        // return $data;
        // return $data->episodes[0]->server_data[0]->link_embed;
        // return $data->episodes['server_data']->link_embed;
        //         return view('pages.episode');
    }
}
