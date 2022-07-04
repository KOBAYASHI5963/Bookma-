<div class="mt-3 mb-3">
  <h3 class="result">検索結果：{{$message}}</h3>
</div>

@if (count($books) >0)
<div class="mb-3">
  <h5 class="resultBook">  検索に該当する商品は{{ $books->total() }}件ありました。</h5> 
</div>
  <p class="result-list">{{  ($books->currentPage() -1) * $books->perPage() + 1}} - 
       {{ (($books->currentPage() -1) * $books->perPage() + 1) + (count($books) -1)  }}件の商品が表示されています。</p>
@else
<h5 class="notResult"> 検索に該当する商品は見当たりませんでした。</h5> 
@endif 


@foreach($books as $book)
<div class="card mt-2">
  <div class="row g-0">
    <div class="col-md-5">
      <img src="{{ $book->BookImages[0]->book_images_url }}" class="book_images">
    </div>
    
    <div class="col-md-7">
      <div class="card-body">
        <h5><a class="card-title" href="{{ route('book.show', ['id' => $book->id]) }}" >{{ $book->title }}</a></h5>
        <p class="card-price">{{ $book->price }}円</p>
        <p class="card-text"><small class="text-muted">出品日時：{{ $book->created_at }}</small></p>
      </div>
    </div>
  </div>
</div>
@endforeach
{{ $books->links() }}


@push('css')

<link rel="stylesheet" href="{{ asset('css/searchList.css') }}">

@endpush