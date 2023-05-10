@extends('admin.layouts.master')
@section('title','Danh sach Country')



@section('content')
<div class="container-fluid">
    <div class="row col-md-2">
        <a href="{{route('country.create')}}" class="btn btn-success">
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
                <div class="card-header bg-primary">Quốc gia</div>

                <div class="card-body">
                   
                    <table class="table" id="tablephim">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($countries))
                            @foreach ($countries as $country)
                          <tr>
                            <th scope="row">{{$country->id}}</th>
                            <td>{{$country->title}}</td>
                            <td>{{$country->slug}}</td>

                            <td>{{$country->description}}</td>
                            <td>
                                {{ $country->status == 1 ? "Hiển thị" : "Không"}}
                            </td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($country->created_at))}}</td>
                            <td>{{ !empty($country->updated_at) ? date('d-m-Y H:i:s', strtotime($country->updated_at)) : '--' }}</td>
                            <td>
                                <a class="btn btn-info" href="{{route('country.edit',$country->id)}}">Edit</a>
                                {!! Form::open(['method'=>'DELETE','route'=>['country.destroy',$country->id],'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa bản ghi này")']) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
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
