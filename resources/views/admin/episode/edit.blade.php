@extends('admin.layouts.master')
@section('title','Edit Category')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">Edit Danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($episode))
                    {!! Form::open(['route'=>['episode.update',$episode->id],'method'=>'PUT']) !!}
                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('movie_id', 'Phim', []) !!}
                            {!! Form::text('movie_title',$episode->movie->title,['class'=>'form-control ','readonly']) !!}
                            {!! Form::hidden('movie_id',$episode->movie->id) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link phim', []) !!}
                            {!! Form::text('link', $episode->linkphim, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            {!! Form::text('episode', $episode->episode, ['class'=>'form-control','readonly']) !!}
                        </div>
                    </div>
                        {!! Form::submit('Sửa tập phim', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
