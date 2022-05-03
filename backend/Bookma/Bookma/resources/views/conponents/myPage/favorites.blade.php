<div class="mb-3">
  <h3>お気に入り一覧</h3>
</div>

@if($favoriteBooks->count())
@foreach($favoriteBooks as $favoriteBook)
<div class="card">
  <div class="row g-0">
    <div class="col-md-4">
    <a href="{{ route('book.show', ['id' => $favoriteBook->id]) }}" ><img src="{{ $favoriteBook->BookImages[0]->book_images_url }}" class="my-3" style="height:190px; width:290px;"></a>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <div>
          <h5 class="card-title"><a href="{{ route('book.show', ['id' => $favoriteBook->id]) }}" >{{ $favoriteBook->title }}</a></h5>
        </div>
        <div>
          <p class="card-text">{{ $favoriteBook->price }}円</p>
        </div>
        <div class="mt-3">
          <form method="post" action="{{ route('favorites.unfavorite', $favoriteBook->id) }}">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger"><i class="far fa-star text-white mr-2"><i class="fa-duotone fa-star"></i></i>お気に入り解除</button>
          </form>
      </div>
      </div>
    </div>
  </div>
</div>
@endforeach
{{ $favoriteBooks->links() }}
@else
  <div class="mt-5">
    <h5>※現在お気に入りされている本はありません。</h5>
  </div>
@endif