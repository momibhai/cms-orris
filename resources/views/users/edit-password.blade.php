@extends('adminlte::page')

@section('title', 'Change Password')

@section('content_header')
    <h1>Change Password for {{ $user->name }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <form action="{{ route('users.updatePassword', $user->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </div>
@stop
