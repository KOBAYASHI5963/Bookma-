<div class="container">
  <div class="content-top-title">
    <h1>新しく出品された本</h1>
  </div>
  <div class="mt-5 explanation">
    <div class="card-deck row text-center">
      @foreach($newBooks as $newBook)
      <div class="image col-sm-3">
        <figure class="image">
          <a href="{{ route('book.show', ['id' => $newBook->id]) }}">
            <img  src="{{ $newBook->BookImages[0]->book_images_url }}" class="my-2">
            <p class="book-title">{{ $newBook->title }}</p>
          </a>
        </figure>
      </div>
      @endforeach
    </div>
  </div>
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/newArrival.css') }}">

@endpush