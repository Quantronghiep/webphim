@extends('admin.layouts.master')
@section('title','Edit Movie')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">Edit Phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($movie))
                    {!! Form::open(['route'=>['movie.update',$movie->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            <span class="text-danger"> *</span>
                            {!! Form::text('title', $movie->title, ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', $movie->slug, ['class'=>'form-control','id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name_eng', 'Name English', []) !!}
                            <span class="text-danger"> *</span>
                            {!! Form::text('name_eng', $movie->name_eng, ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('trailer', 'Trailer', []) !!}
                            {!! Form::text('trailer', $movie->trailer, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('thoiluong', 'Thời lượng', []) !!}
                            {!! Form::text('thoiluong', $movie->thoiluong, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', $movie->description, ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags', 'Tags phim', []) !!}
                            {!! Form::textarea('tags', $movie->tags, ['class'=>'form-control','placeholder'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Active', []) !!}
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không']  ,$movie->status,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phim_hot', 'Hot', []) !!}
                            {!! Form::select('phim_hot',['1'=>'Có','0'=>'Không']  ,$movie->phim_hot,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('resolution', 'Định dạng', []) !!}
                            {!! Form::select('resolution',['1'=>'SD','0'=>'HD','2'=>'FullHD','3'=>'Trailer']  ,$movie->resolution,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phude', 'Phụ đề', []) !!}
                            {!! Form::select('phude',['1'=>'Thuyết Minh','0'=>'Vietsub']  ,$movie->phude,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category', 'Category', []) !!}
                            {!! Form::select('category_id', $categories ,$movie->category_id,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Genre', 'Genre', []) !!}
                            <span class="text-danger"> *</span>
                            <br>
                            @foreach($list_genre as $genre)
                                {!! Form::checkbox('genre[]',$genre->id,isset($movie_genre) && $movie_genre->contains($genre->id) ? true : false) !!}
                                {!! Form::label('genre', $genre->title, []) !!}
                            @endforeach
                        </div>
                        <div class="form-group">
                            {!! Form::label('country', 'Country', []) !!}
                            {!! Form::select('country_id', $countries  ,$movie->country_id,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('thuocphim', 'Thuộc phim', []) !!}
                            {!! Form::select('thuocphim',['0'=>'Phim lẻ','1'=>'Phim bộ']  ,$movie->thuocphim,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sotap', 'Số tập', []) !!}
                            {!! Form::text('sotap', $movie->sotap, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('year', 'Năm sản xuất', []) !!}
                            {!! Form::selectYear('year',2000,2023 ,$movie->year,['class'=>'select-year']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('topview', 'Top View', []) !!}
                            {!! Form::select('topview',['0'=>'Ngày','1'=>'Tuần','2'=>'Tháng']  ,$movie->topview,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('season', 'Season', []) !!}
                            {!! Form::selectRange('season',1,20  ,$movie->season,['class'=>'select-year']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price', 'Price', []) !!}
                            {!! Form::text('price', $movie->price, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image', []) !!}
                            <span class="text-danger"> *</span>
                            {!! Form::file('image', ['class'=>'form-control-file']) !!}
                            @if(!empty($movie->image))
                            <img height="80" src="{{ asset('uploads/movies/' . $movie->image) }}"/>
                            @endif
                            <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
                        </div>
                        {!! Form::submit('Sửa phim', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
