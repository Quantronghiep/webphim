<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Rating;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $genres = Genre::orderBy('id', 'DESC')->get();
        $countries = Country::orderBy('id', 'DESC')->get();
        $phim_trailer = Movie::where('resolution', 3)->where('status', 1)->orderBy('updated_at', 'DESC')->take(10)->get();

        //total
        $category_total = Category::all()->count();
        $country_total = Country::all()->count();
        $genre_total = Genre::all()->count();
        $movie_total = Movie::all()->count();

        View::share([
            'categories' => $categories,
            'genres' => $genres,
            'countries' => $countries,
            'phim_trailer' => $phim_trailer,
            'category_total' => $category_total ,
            'country_total' => $country_total,
            'genre_total' => $genre_total,
            'movie_total' => $movie_total
        ]);
    }
}
