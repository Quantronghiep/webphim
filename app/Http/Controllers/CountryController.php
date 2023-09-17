<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Requests\CreateCategoryRequest;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.country.index',[
            'countries' => $countries,
        ]);
    }

    public function create()
    {
        return view('admin.country.create');
    }

    
    public function store(CreateCategoryRequest $request)
    {
        $params = $request->all();
        $country = new Country();
        $country->createCountry($params);
        return redirect('admin/country')->with('success','Create success!');
    }

   
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $country = Country::find($id);
        return view('admin.country.edit',[
            'country' => $country,
        ]);
    }

    
    public function update(CreateCategoryRequest $request, $id)
    {
        $params = $request->all();
        $country = new Country();
        $country->updateCountry($params,$id);
        return redirect('admin/country')->with('success','Update success!');

    }

    
    public function destroy($id)
    {
        Country::find($id)->delete();
        return redirect('admin/country')->with('success','Delete success!');
    }
}
