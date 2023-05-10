@extends('admin.layouts.master')
@section('title','Edit Genre')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">Edit thể loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($genre))
                    {!! Form::open(['route'=>['genre.update',$genre->id],'method'=>'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title', []) !!}
                        {!! Form::text('title', $genre->title, ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'Slug', []) !!}
                        {!! Form::text('slug', $genre->slug, ['class'=>'form-control','id'=>'convert_slug']) !!}
                    </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', []) !!}
                            {!! Form::textarea('description', $genre->description, ['class'=>'form-control','placeholder'=>'Nhập vào dữ liệu...','id'=>'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Active', []) !!}
                            {!! Form::select('status',['1'=>'Hiển thị','0'=>'Không']  ,$genre->status,['class'=>'form-control']) !!}
                        </div>
                        {!! Form::submit('Sửa thể loại', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
