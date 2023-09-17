<?php

namespace App\Http\Controllers;
use App\Models\Genre;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;


class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genre.index',[
            'genres' => $genres,
        ]);
    }

    public function create()
    {
        return view('admin.genre.create');
    }

    
    public function store(CreateCategoryRequest $request)
    {
        $params = $request->all();
        $genre = new Genre();
        $genre->createGenre($params);
        return redirect('admin/genre')->with('success','Create success!');
    }

   
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('admin.genre.edit',[
            'genre' => $genre,
        ]);
    }

    
    public function update(CreateCategoryRequest $request, $id)
    {
        $params = $request->all();
        $genre = new genre();
        $genre->updateGenre($params,$id);
        return redirect('admin/genre')->with('success','Update success!');

    }

    
    public function destroy($id)
    {
        Genre::find($id)->delete();
        return redirect('admin/genre')->with('success','Delete success!');
    }
}
