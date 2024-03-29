<div class="mb-3">
  <h3 class="font">{{ $user->name }}の出品本一覧</h3>
</div>

<div class="books">

  @if($books->count())
  @foreach($books as $book)
  <div class="card mt-3 mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ $book->BookImages[0]->book_images_url }}" class="book_images">
      </div>
      
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><a class="books-title" href="{{ route('book.show', ['id' => $book->id]) }}" >{{ $book->title }}</a></h5>
          <p class="card-price">{{ $book->price }}円</p>
          <p class="card-text"><small class="text-muted">出品日時：{{ $book->created_at }}</small></p>
          <div class="d-flex justify-content-start">
            <a class="btn btn-success btn mr-2" href="{{ route('sellerSalesBooksEdit', ['id' => $book->id]) }}" >編集</a>

            <form action="{{ route('sellerSalesBooksDestroy', ['id' => $book->id]) }}" method="post" id="delete_{{ $book->id }}">
            @method('DELETE')
            {{ csrf_field() }}
              <button class="btn btn-danger" onclick="deletePost(this);" type="button" data-id="{{ $book->id }}">削除</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  {{ $books->links() }}
</div>
  @else
  <div class="mt-4">
    <h5 class="notSellBook">※現在出品されている本はありません。</h5>
  </div>
  <div class="mt-3">
    <h5><a class="sell" href="{{ route('sellerSalesBooks') }}">出品はこちらから</a></h5>
  </div>
  @endif


<script>
function deletePost(e) {
  if (confirm('本当に削除していいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
}
</script>

@push('css')

<link rel="stylesheet" href="{{ asset('css/books.css') }}">

@endpush