<div class="mb-3">
  <h3 class="font">お気に入り一覧</h3>
</div>

<div class="favorites">
  @if($favoriteBooks->count())
  @foreach($favoriteBooks as $favoriteBook)
  <div class="card mt-3 mb-3">
    <div class="row g-0">
      
      <div class="col-4 col-sm-4">
        <a href="{{ route('book.show', ['id' => $favoriteBook->id]) }}" ><img src="{{ $favoriteBook->BookImages[0]->book_images_url }}" class="my-3"></a>
      </div>
      
      <div class="col-3 col-sm-3 d-flex align-items-center justify-content-center">

          <h5 class="book-title"><a class="title" href="{{ route('book.show', ['id' => $favoriteBook->id]) }}" >{{ $favoriteBook->title }}</a></h5>
      </div>

      <div class="col-5 col-sm-5 d-flex align-items-center justify-content-center">
        <form method="post" action="{{ route('favorites.unfavorite', $favoriteBook->id) }}">
        @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="img_btn btn btn-danger"><i class="far fa-star text-white mr-2"><i class="fa-duotone fa-star"></i></i>お気に入り解除</button>
        </form>
      </div>

    </div>
  </div>
  @endforeach
  {{ $favoriteBooks->links() }}
  @else
    <div class="mt-4">
      <h5 class="notFavorite">※現在お気に入りされている本はありません。</h5>
    </div>
  @endif
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/favorites.css') }}">

@endpush