<div class="mb-3">
  <h3>お気に入り一覧</h3>
</div>

    <div class="text-right">
      <a href="#"><i class="fas fa-pencil-alt"></i>編集する</a>
    </div>

@if($favoriteBooks->count())
@foreach($favoriteBooks as $favoriteBook)
<div class="card">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $favoriteBook->BookImages[0]->book_images_url }}" class="my-3" style="height:190px; width:290px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <div>
          <h5 class="card-title"><a href="{{ route('book.show', ['id' => $favoriteBook->id]) }}" >{{ $favoriteBook->title }}</a></h5>
        </div>
        <div>
          <p class="card-text">{{ $favoriteBook->price }}円</p>
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