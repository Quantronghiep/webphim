@extends('admin.layouts.master')
@section('title','Danh sach Tap phim')



@section('content')
<div class="container-fluid">
    <div class="row col-md-2">
        <a href="{{route('episode.create')}}" class="btn btn-success">
            <i class="fa fa-plus"></i> Thêm mới
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
                <div class="card-header bg-primary">Liệt kê danh sách Tập phim</div>

                <div class="card-body">
                   
                    <table class="table" id="tablephim">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th>Movie</th>
                            <th>Ảnh phim</th>
                            <th>Tập</th>
                            <th>Link phim</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($list_episode))
                            @foreach ($list_episode as $episode)
                          <tr>
                            <th scope="row">{{$episode->id}}</th>
                            <td>{{$episode->movie->title}}</td>
                            <th scope="row">
                                <img height="80" src="{{ asset('uploads/movies/' . $episode->movie->image) }}"/>
                            </th>
                            <td>{{$episode->episode}}</td>
                            {{-- <td>
                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/{{$episode->linkphim}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </td> --}}
                            <td>{{$episode->linkphim}}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($episode->created_at))}}</td>
                            <td>{{ !empty($episode->updated_at) ? date('d-m-Y H:i:s', strtotime($episode->updated_at)) : '--' }}</td>
                            <td>
                                <a class="btn btn-info" href="{{route('episode.edit',$episode->id)}}">Sửa</a>
                                {!! Form::open(['method'=>'DELETE','route'=>['episode.destroy',$episode->id],'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa bản ghi này")']) !!}
                                {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                          </tr>
                          @endforeach
                          @endif
                        </tbody>
                      </table>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
