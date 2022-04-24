<div class="mb-3">
  <h3>売上履歴</h3>
</div>

@if(count($viewBooks))
@foreach($viewBooks as $viewBook)
<div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
      <a class="page-link" href="{{ route('book.show', ['id' => $viewBook['id']]) }}">
        <img src="{{ $viewBook['book_images_url'] }}" style="height:210px; width:280px;">
        </a>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $viewBook['title'] }}</h5>
          <p class="card-text">{{ $viewBook['price'] }}円</p>
          <p class="card-text">購入ユーザー：<a href="{{ route('user.show', ['id' => $viewBook['user_id']]) }}">{{ $viewBook['name'] }}</a></p>
          <p class="card-text"><small class="text-muted">日時：{{ $viewBook['created_at'] }}</small></p>
        </div>
      </div>
    </div>
</div>
@endforeach
{{ $paginator->links() }}
@else
  <div class="mt-5">
    <h4>売上はありません。<h4>
    <h5>※本を出品してみましょう。</h5>
  </div>
  <div class="mt-3">
    <a href="{{ route('sellerSalesBooks') }}" >本を出品する</a>
  </div>
@endif