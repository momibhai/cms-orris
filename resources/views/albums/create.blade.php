@extends('adminlte::page')

@section('title', 'Create Album')

@section('content_header')
    <h1>Create New Album</h1>
@stop

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

@section('content')
    <div class="container-fluid">
        <form action="{{ route('albums.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Album Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter album name" required>
            </div>
            <button type="submit" class="btn btn-success">Create Album</button>
        </form>
    </div>
    <!-- Footer -->
<footer style="position: fixed; bottom: 0; width: 100%; background-color: #f8f9fa; text-align: center; ">
    <div class="container">
        <span class="text-muted">© {{ date('Y') }} Orris. All rights reserved.</span>
    </div>
</footer>
@stop

