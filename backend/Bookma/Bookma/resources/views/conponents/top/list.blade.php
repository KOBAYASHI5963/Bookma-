<div class="container">
  <div class="content-top-title">
    <h1>出品一覧</h1>
  </div>
  <div class="mt-5 explanation">
    <div class="card-deck row text-center">
      @foreach($books as $book)
      <div class="image col-sm-3">
        <figure class="image">
          <a href="{{ route('book.show', ['id' => $book->id]) }}">
            <img  src="{{ $book->BookImages[0]->book_images_url }}" class="my-2">
            <p class="book-title">{{ $book->title }}</p>
          </a>
        </figure>
      </div>
      @endforeach
    </div>
  </div>
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/list.css') }}">

@endpush