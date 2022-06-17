@extends('layout')

@section('content')

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Website CRUD untuk tugas kelas <strong>FS204B Pemrograman 2</strong>. Dibuat oleh <strong>Wahyu Kusumoraharjo (2022446263)</strong>. Repositori untuk website ini bisa dilihat <a href="https://github.com/wahyukusumo/Programming_2" target="_blank" class="alert-link">di sini</a>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        @forelse ($posts as $post)
            <div class="col">
                <div class="card shadow-sm">
                    {{-- PICTURE --}}
                    <div class="card-img-top my-thumbnail" style="background-image: url('{{ Storage::url('public/posts/').$post->image }}');"></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="d-grid mt-4">
                            <button class="btn btn-sm btn-secondary btn-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$post->id}}" aria-expanded="false">
                              Baca Keterangan Gambar
                            </button>
                        </p>
                        <div class="collapse" id="collapse{{$post->id}}">
                            <div class="card card-body">
                                {!! $post->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form onsubmit="return confirm('Konfirmasi Untuk Menghapus Post \'{{ $post->title }}\'');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            <div class="btn-group text-center" style="width: 100%;">
                                {{-- BUTTON EDIT --}}
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                    <span>Edit</span>
                                </a>

                                {{-- BUTTON DELETE --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-danger">
                Data Post belum Tersedia.
            </div>
        @endforelse        
    </div>

    {{-- PAGINATION --}}
    <div class="col-md-12 my-3">
        {{ $posts->links() }}    
    </div>
    
    <footer class="text-muted py-5">
        <div class="container">
            <p class="text-center">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                    </svg>
                </a>
            </p>
        </div>
    </footer>
@endsection