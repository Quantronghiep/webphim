@extends('admin.layouts.master')
@section('title','Danh sách Người dùng')



@section('content')
<div class="container-fluid">

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
                <div class="card-header bg-primary">Người dùng</div>

                <div class="card-body">
                   
                    <table class="table" id="tablephim">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (!empty($users))
                            @foreach ($users as $user)
                          <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($user->created_at))}}</td>
                            <td>{{ !empty($user->updated_at) ? date('d-m-Y H:i:s', strtotime($user->updated_at)) : '--' }}</td>
                            <td>
                                <a class="btn btn-info btn-sm px-3" href="{{route('user.edit',$user->id)}}"><i class='fa fa-pen-to-square'></i></a>
                                <form action="{{route('user.destroy',$user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-3 mt-2 delete-btn" data-id="{{ $user->id }}"><i class='fa fa-trash'></i></button>
                                </form>
                                {{-- <a class="btn btn-info" href="{{route('genre.edit',$genre->id)}}">Edit</a>
                                {!! Form::open(['method'=>'DELETE','route'=>['genre.destroy',$genre->id],'onsubmit'=>'return confirm("Bạn có chắc chắn muốn xóa bản ghi này")']) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!} --}}
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
@stop
@section('scripts')
    <script>
             document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    var id = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Bạn có chắc chắn muốn xóa?',
                        text: 'Hành động này sẽ không thể hoàn tác!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Xóa',
                        cancelButtonText: 'Hủy bỏ'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Gửi yêu cầu xóa thông qua AJAX hoặc form submit
                            // Ví dụ: gửi yêu cầu xóa thông qua AJAX sử dụng Axios
                            // axios.delete(`/admin/country/${id}`)
                            //     .then(response => {
                            //         // Xử lý phản hồi thành công
                            //         Swal.fire('Đã xóa!', 'Mục đã được xóa thành công.', 'success');
                            //         // Cập nhật giao diện hoặc chuyển hướng nếu cần thiết
                            //     })
                            //     .catch(error => {
                            //         // Xử lý phản hồi lỗi
                            //         Swal.fire('Lỗi!', 'Đã xảy ra lỗi khi xóa mục.', 'error');
                            //     });
                            
                            // Hoặc có thể sử dụng form submit
                            this.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
@stop
