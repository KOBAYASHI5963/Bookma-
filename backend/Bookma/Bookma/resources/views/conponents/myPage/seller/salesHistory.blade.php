<div class="mb-3">
  <h3 class="font">売上履歴</h3>
</div>

<div class="salesHistory">
  @if(count($viewBooks))
  @foreach($viewBooks as $viewBook)
  <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
        <a class="page-link" href="{{ route('book.show', ['id' => $viewBook['id']]) }}">
          <img src="{{ $viewBook['book_images_url'] }}">
          </a>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="title">{{ $viewBook['title'] }}</h5>
            <p class="price">{{ $viewBook['price'] }}円</p>
            <p>購入ユーザー：<a class="user" href="{{ route('user.show', ['id' => $viewBook['user_id']]) }}">{{ $viewBook['name'] }}</a></p>
            <p><small class="text-muted">日時：{{ $viewBook['created_at'] }}</small></p>
          </div>
        </div>
      </div>
  </div>
  @endforeach
  {{ $paginator->links() }}
  @else
    <div class="mt-4">
      <h4 class="notSales">売上はありません。<h4>
      <h5 class="SalesBooks">※本を出品してみましょう。</h5>
    </div>
    <div class="mt-3">
      <a class="sells" href="{{ route('sellerSalesBooks') }}" >本を出品する</a>
    </div>
  @endif
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/salesHistory.css') }}">

@endpush