@extends('adminlte::page')

@section('title', 'Albums')

@section('content_header')
    <h1>Albums</h1>
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
        <div class="row mb-3">
            <div class="col-12">
                <a href="{{ route('albums.create') }}" class="btn btn-primary">Create New Album</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($albums as $album)
                    <tr>
                        <td>{{ $album->id }}</td>
                        <td>{{ $album->name }}</td>
                        <td>{{ $album->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('media.create', $album->id) }}" class="btn btn-primary btn-sm">Upload Media</a>
                            <a href="{{ route('albums.show', $album->id) }}" class="btn btn-info btn-sm">View Media</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Footer -->
<footer style="position: fixed; bottom: 0; width: 100%; background-color: #f8f9fa; text-align: center; ">
    <div class="container">
        <span class="text-muted">© {{ date('Y') }} Orris. All rights reserved.</span>
    </div>
</footer>
@stop
