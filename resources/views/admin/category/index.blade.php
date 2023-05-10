@extends('admin.layouts.master')
@section('title','Danh sach Category')



@section('content')
<div class="container-fluid">
    <div class="row col-md-2">
        <a href="{{route('category.create')}}" class="btn btn-success">
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
            
                <div class="card-header bg-primary">Danh mục</div>

                <div class="card-body">
                   
                    <table class="table" id="tablephim">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Position</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody class="order_position">
                            @if (!empty($categories))
                            @foreach ($categories as $category)
                          <tr id="{{$category->id}}">
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->title}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                {{ $category->status == 1 ? "Hiển thị" : "Không"}}
                            </td>
                            <td>{{$category->position}}</td>
                            
                            <td>{{ date('d-m-Y H:i:s', strtotime($category->created_at))}}</td>
                            <td>{{ !empty($category->updated_at) ? date('d-m-Y H:i:s', strtotime($category->updated_at)) : '--' }}</td>
                            <td>
                                <a class="btn btn-info" href="{{route('category.edit',$category->id)}}">Edit</a>
                                {!! Form::open(['method'=>'DELETE','route'=>['category.destroy',$category->id],'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa bản ghi này")']) !!}
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
