<div class="mb-3">
  <h3>ログインユーザーの出品本一覧</h3>
</div>

<div class="card mb-3 mt-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="" alt="...">
    </div>
    <div class="col-md-8">
    @foreach($books as $book)
      <div class="card-body">
        <h5 class="card-title">{{ $book->title }}</h5>
        <p class="card-text">{{ $book->price }}</p>
        <div>
        <p class="card-text"><small class="text-muted">出品日時：{{ $book->update_at }}</small></p>
          <a class="btn btn-success btn" href="#" >編集</a>
          <a class="btn btn-danger btn" href="#" >削除</a>
        </div>
      </div>
    @endforeach
     {{ $books->links() }}
    </div>
  </div>
</div>

