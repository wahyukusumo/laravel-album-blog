@extends('layout')

@section('content')
    <div class="card border-0 shadow rounded">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                
                @csrf

                <div class="mb-3">
                    <label for="ImageInput" class="form-label">Gambar</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="ImageInput" aria-label="Upload">
                    
                    <!-- error message untuk title -->
                    @error('image')
                      <div class="alert alert-danger mt-2">
                          {{ $message }}
                      </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="TitleInput" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="TitleInput" name="title" value="{{ old('title') }}" placeholder="Masukkan judul post">
                
                    <!-- error message untuk title -->
                    @error('title')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="TextAreaInput" class="form-label">Konten</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5" placeholder="Masukkan Konten Post" id="TextAreaInput">{{ old('content') }}</textarea>
                    
                    <!-- error message untuk content -->
                    @error('content')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection