@extends('adminlte::page')

@section('title', 'Upload Media')

@section('content_header')
    <h1>Upload Media</h1>
@stop

@section('content')
    <div class="container-fluid">
        <form action="{{ route('media.store', $album->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Select File</label>
                <input type="file" id="file" name="file" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    <!-- Footer -->
<footer style="position: fixed; bottom: 0; width: 100%; background-color: #f8f9fa; text-align: center; ">
    <div class="container">
        <span class="text-muted">© {{ date('Y') }} Orris. All rights reserved.</span>
    </div>
</footer>
@stop
