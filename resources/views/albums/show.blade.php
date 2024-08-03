@extends('adminlte::page')

@section('title', 'Album Details')

@section('content_header')
    <h1>{{ $album->name }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <h3>Media</h3>
        <div class="row">
            @foreach ($media as $mediaItem)
            <div class="col-md-3 mb-3">
                @php
                    // Get file extension
                    $fileExtension = pathinfo($mediaItem->file_path, PATHINFO_EXTENSION);
                @endphp
                
                @if (in_array($fileExtension, ['jpeg', 'png', 'jpg', 'gif', 'svg']))
                    <!-- Display image -->
                    <a href="{{ Storage::url($mediaItem->file_path) }}" target="_blank">
                        <img src="{{ Storage::url($mediaItem->file_path) }}" class="img-fluid" alt="Media Image">
                    </a>
                @elseif (in_array($fileExtension, ['mp4', 'mov', 'avi', 'wmv']))
                    <!-- Display video -->
                    <a href="{{ Storage::url($mediaItem->file_path) }}" target="_blank">
                        <video width="320" height="240" controls>
                            <source src="{{ Storage::url($mediaItem->file_path) }}" type="video/{{ $fileExtension }}">
                            Your browser does not support the video tag.
                        </video>
                    </a>
                @else
                    <!-- Handle other file types or display a default message -->
                    <p>Unsupported file type</p>
                @endif
            </div>
            
            
            @endforeach
        </div>
        <a href="{{ route('albums.index') }}" class="btn btn-primary">Back to Albums</a>
    </div>
    <!-- Footer -->
<footer style="position: fixed; bottom: 0; width: 100%; background-color: #f8f9fa; text-align: center; ">
    <div class="container">
        <span class="text-muted">© {{ date('Y') }} Orris. All rights reserved.</span>
    </div>
</footer>
@stop
