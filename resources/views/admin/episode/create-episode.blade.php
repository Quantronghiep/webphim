@extends('admin.layouts.master')
@section('title','Thêm mới tập phim')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">Thêm mới Tập phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['route'=>'episode.store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('movie_id', 'Phim', []) !!}
                            {!! Form::text('movie_title',$movie->title,['class'=>'form-control ','readonly']) !!}
                            {!! Form::hidden('movie_id',$movie->id) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'Link phim', []) !!}
                            {!! Form::text('link', null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('episode', 'Tập phim', []) !!}
                            <select name="episode" class="form-control" id="episode">
                                @for($i = 1 ; $i <= $movie->sotap ; $i++)
                                    @if(!in_array($i,$arr_ep_add))
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                        {!! Form::submit('Thêm tập phim', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
