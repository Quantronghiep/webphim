@extends('admin.layouts.master')
@section('title','Danh sach Movie')

@section('content')
<div class="modal" id="videoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="video_title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="video_desc"></p>
          <p id="video_link">
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div class="container-fluid">
    <div class="row col-md-2">
        <a href="{{route('movie.create')}}" class="btn btn-success">
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
                <div class="card-header bg-primary">Phim</div>

                <div class="card-body">
                   
                    <table class="table table-responsive" id="tablephim">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            {{-- <th scope="col">Slug</th> --}}
                            {{-- <th scope="col">Name English</th> --}}
                            <th scope="col">Thời lượng</th>
                            <th scope="col">Image</th>
                            {{-- <th scope="col">Description</th> --}}
                            {{-- <th scope="col">Tags phim</th> --}}
                            {{-- <th scope="col">Status</th> --}}
                            <th scope="col">Hot</th>
                            {{-- <th scope="col">Định dạng</th> --}}
                            {{-- <th scope="col">Phụ đề</th> --}}
                            {{-- <th>Created_at</th>
                            <th>Updated_at</th> --}}
                            <th>Category</th>
                            <th>Genre</th>
                            <th>Country</th>
                            <th>Số tập</th>
                            <th></th>
                            <th>Năm sản xuất</th>
                            <th>Top View</th>
                            <th>Season</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($movies))
                            @foreach ($movies as $movie)
                          <tr>
                            <th scope="row">{{$movie->id}}</th>
                            <td>{{$movie->title}}</td>
                            {{-- <td>{{$movie->slug}}</td> --}}
                            {{-- <td>{{$movie->name_eng}}</td> --}}
                            <td>{{$movie->thoiluong}}</td>
                            <td>
                                @if(!empty($movie->image))
                                <img height="80" src="{{ asset('uploads/movies/' . $movie->image) }}"/>
                                @endif
                            </td>
                            {{-- <td>{{$movie->description}}</td> --}}
                            {{-- <td>{{$movie->tags}}</td> --}}
                            {{-- <td>
                                {{ $movie->status == 1 ? "Hiển thị" : "Không"}}
                            </td> --}}
                            <td>
                                {{ $movie->phim_hot == 1 ? "Có" : "Không"}}
                            </td>
                            {{-- <td>
                                @if($movie->resolution == 0)
                                 HD
                                @elseif($movie->resolution == 1)
                                SD
                                @elseif($movie->resolution == 2)
                                FullHD
                                @else
                                Trailer
                                @endif
                            </td> --}}
                            {{-- <td>
                                {{ $movie->phude == 1 ? "Thuyết Minh" : "Vietsub"}}
                            </td> --}}
                            <td>{{$movie->category->title}}</td>
                            <td>
                                @foreach($movie->movie_genre as $genre)
                                    <span class="badge badge-dark">{{$genre->title}}</span>
                                @endforeach
                            </td>
                            <td>{{$movie->country->title}}</td>
                            <td>{{$movie->episode_count}} / {{$movie->sotap}}</td>
                            @if($movie->episode_count > 0)
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('episode.indexEpisodeByMovieId',[$movie->id])}}">Thêm tập</a>
                                    @foreach($movie->episode as $key => $epi)
                                        <a class="show_video" data-movie_video_id="{{$epi->movie_id}}" data-video_episode="{{$epi->episode}}" style="cursor: pointer">
                                            <span class="badge badge-dark">{{$epi->episode}}</span>
                                        </a>
                                    @endforeach
                                </td>
                            @else
                                <td>
                                    <a href="{{route('episode.createEpisodeByMovieId',$movie->id)}}" class="btn btn-primary btn-sm">
                                        Thêm tập
                                    </a>
                                </td>
                            @endif
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                {!! Form::selectYear('year',2000,2023 ,isset($movie->year) ? $movie->year : '',
                                    ['class'=>'select-year','id'=>$movie->id,'placeholder' =>'Năm phim']) !!} 
                                </form>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                {!! Form::select('topview',['0'=>'Ngày','1'=>'Tuần','2'=>'Tháng']  ,
                                isset($movie->topview) ? $movie->topview : '' ,['class'=>'select-topview','id'=>$movie->id]) !!}
                                </form>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    {!! Form::selectRange('season',0,20,
                                    isset($movie->season) ? $movie->season : '',['class'=>'select-season','id'=>$movie->id]) !!}
                                </form>
                            </td>
                            {{-- <td>{{ date('d-m-Y H:i:s', strtotime($movie->created_at))}}</td>
                            <td>{{ !empty($movie->updated_at) ? date('d-m-Y H:i:s', strtotime($movie->updated_at)) : '--' }}</td> --}}
                            <td>
                                <a class="btn btn-info" href="{{route('movie.edit',$movie->id)}}">Sửa</a>
                                {!! Form::open(['method'=>'DELETE','route'=>['movie.destroy',$movie->id],'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa bản ghi này")']) !!}
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
