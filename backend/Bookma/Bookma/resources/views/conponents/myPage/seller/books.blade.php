<div class="mb-3">
  <h3>ログインユーザーの出品本一覧</h3>
</div>
@foreach($books as $book)
<div class="card mb-3 mt-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $book->title }}</h5>
        <p class="card-text">{{ $book->price }}</p>
        <div>
        <p class="card-text"><small class="text-muted">出品日時：{{ $book->created_at }}</small></p>
        <div class="d-flex justify-content-start">
          <a class="btn btn-success btn mr-2" href="{{ route('sellerSalesBooksEdit', ['id' => $book->id]) }}" >編集</a>

          <form action="{{ route('sellerSalesBooksDestroy', ['id' => $book->id]) }}" method="post" id="delete_{{ $book->id }}">
          @method('DELETE')
          {{ csrf_field() }}
            <button  data-id="{{ $book->id }}" class="btn btn-danger" onclick="deletePost(this);">削除</button>
          </form>
        </div> 
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
{{ $books->links() }}
<script>
function deletePost(e) {
  'use strict';
 
  if (confirm('本当に削除していいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
}
</script>
