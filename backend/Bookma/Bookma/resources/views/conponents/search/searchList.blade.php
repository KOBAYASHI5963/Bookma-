
<div class="mb-3">
  <h3>検索結果：{{$message}}</h3>
</div>

@if (count($books) >0)
<div class="mb-3">
  <h5>  検索に該当する商品は{{ $books->total() }}件ありました。</h5> 
</div>
       {{  ($books->currentPage() -1) * $books->perPage() + 1}} - 
       {{ (($books->currentPage() -1) * $books->perPage() + 1) + (count($books) -1)  }}件の商品が表示されています。</p>
@else
</h5> 検索に該当する商品は見当たりませんでした。</h5> 
@endif 


@foreach($books as $book)
<div class="card mt-6">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $book->BookImages[0]->book_images_url }}" class="my-3" style="height:210px; width:290px;">
    </div>
    
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title text-center mt-4"><a href="{{ route('book.show', ['id' => $book->id]) }}" >{{ $book->title }}</a></h5>
        <p class="card-text text-center">{{ $book->price }}円</p>
        <p class="card-text text-right"><small class="text-muted">出品日時：{{ $book->created_at }}</small></p>
      </div>
    </div>
  </div>
</div>
@endforeach
{{ $books->links() }}
