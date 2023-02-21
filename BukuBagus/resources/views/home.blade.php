@extends('layouts.main')
@section('container')
  <h1 class="p-2 text-2xl">Buku-buku terbaru</h1>
  <div id="books" class="flex flex-wrap">
    @foreach ($books as $book)
      <div class="card m-2 w-96 bg-base-100 shadow-xl">
        <div class="card-body">
          <h2 class="card-title">{{ $book->title }}</h2>
          <p>ISBN : {{ $book->isbn }}</p>
          <div class="card-actions items-center justify-end">
            <a class="btn btn-primary" href="/book/{{ $book->id }}">lihat</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="pages">
    {{ $books->links() }}
  </div>
@endsection
