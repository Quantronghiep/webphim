@extends('admin.layouts.master')
@section('title','Edit User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">Edit người dùng</div>

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
                    @if(isset($user))
                    {!! Form::open(['route'=>['user.update',$user->id],'method'=>'PUT']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', []) !!}
                        {!! Form::text('name', $user->name, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email', []) !!}
                        {!! Form::text('email', $user->email, ['class'=>'form-control','readonly' => 'readonly']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password', []) !!}
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>
                        {!! Form::submit('Sửa người dùng', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
