@extends('admin.layouts.master')
@section('title','Thêm mới Movie')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">Thêm mới Phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <ul style="padding:0px">
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if (Session::has('error'))
                    <li class="alert alert-danger">{{ Session::get('error') }}</li>
                    @endif
                    @if(session('error'))
                    <li class="alert alert-danger">{{session('error')}}</li>
                    @endif
                    {!! Form::open(['route'=>'movie.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            <span class="text-danger"> *</span>
                            {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', null, ['class'=>'form-control','id'=>'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name_eng', 'Name English', []) !!}
                            <span class="text-danger"> *</span>
                            {!! Form::text('name_eng', null, ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('trailer', 'Trailer', []) !!}
                            {!! Form::text('trailer', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('thoiluong', 'Thời lượng', []) !!}
                            <span class="text-danger"> *</span>
                            {!! Form::text('thoiluong', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tags', 'Tags phim', []) !!}
                            {!! Form::textarea('tags', null, ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Active', []) !!}
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không']  ,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phim_hot', 'Hot', []) !!}
                            {!! Form::select('phim_hot',['1'=>'Có','0'=>'Không']  ,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('resolution', 'Định dạng', []) !!}
                            {!! Form::select('resolution',['0'=>'HD','1'=>'SD','2'=>'FullHD','3'=>'Trailer']  ,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('phude', 'Phụ đề', []) !!}
                            {!! Form::select('phude',['1'=>'Thuyết Minh','0'=>'Vietsub']  ,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category', 'Category', []) !!}
                            {!! Form::select('category_id', $categories ,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Genre', 'Genre', []) !!}
                            <span class="text-danger"> *</span>
                            <br>
                            @foreach($list_genre as $genre)
                                {!! Form::checkbox('genre[]',$genre->id) !!}
                                {!! Form::label('genre', $genre->title, []) !!}
                            @endforeach
                        </div>
                    
                        <div class="form-group">
                            {!! Form::label('country', 'Country', []) !!}
                            {!! Form::select('country_id',$countries  ,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('thuocphim', 'Thuộc phim', []) !!}
                            {!! Form::select('thuocphim',['0'=>'Phim lẻ','1'=>'Phim bộ']  ,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('sotap', 'Số tập', []) !!}
                            {!! Form::text('sotap', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('year', 'Năm sản xuất', []) !!}
                            {!! Form::selectYear('year',2000,2023 ,'',['class'=>'select-year']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('topview', 'Top View', []) !!}
                            {!! Form::select('topview',['0'=>'Ngày','1'=>'Tuần','2'=>'Tháng']  ,null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('season', 'Season', []) !!}
                            {!! Form::selectRange('season',1,20  ,null,['class'=>'select-year']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('price', 'Price', []) !!}
                            {!! Form::text('price', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image', []) !!}
                            <span class="text-danger"> *</span>
                            {!! Form::file('image', ['class'=>'form-control-file']) !!}
                        </div>
                        {!! Form::submit('Thêm phim', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
