<div>
  <h2>{{ $book->title }}</h2>
</div>

<div class="mt-3">
  <h4>¥{{ $book->price }} (税込)</4>
</div>

@auth
@if(Auth::id() === $book->user_id)
<a class="btn btn-primary btn-lg " href="{{ route('sellerSalesBooksEdit', ['id' => $book->id]) }}" >商品内容を編集</a>
@else
<button type="button" class="btn btn-secondary btn-lg" disabled>売り切れました</button>
<a class="btn btn-danger btn-lg " href="{{ route('book.purchase', ['id' => $book->id]) }}" >購入手続きへ</a>
@endif
@endauth

<div class="mt-5">
      <h4>商品の説明</h>
</div>

<div>
  <p>{{ $book->content }}</p>
</div>

<div class="mt-5">
  <h4>商品の情報</h>
</div>

<div class="row">
  <div class="col-4">
    <div class="mt-4">
      <p>カテゴリー</p>
      <p>商品の状態</p>
      <p>配送料の負担</p>
      <p>配送の方法</p>
      <p>発送元の地域</p>
      <p>発送までの日数</p>
    </div>
  </div>

  <div class="col-8">
    <ul class='list-unstyled'>
      <div class="mt-4">
        <li>{{ $book->category->name }}</li>
        <li class="mt-3">{{ $book->productCondition->condition }}</li>
        <li class="mt-3">{{ $book->shipping_bearer }}</li>
        <li class="mt-3">{{ $book->shippingMethod->means }}</li>
        <li class="mt-3">{{ $book->shippingArea->area }}</li>
        <li class="mt-3">{{ $book->delivery_days }}</li>
      </div>
    </ul>
  </div>
<div>

<div class="mt-4">
  <h4>出品者</h>
</div>

<div class="mb-3" >
  <div class="row g-0">
    <div class="col-md-8">
      @if(is_null( $book->User->UserProfile->profile_image ))
      <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle" style="width: 250px;">
      @else
      <img src="{{ $book->User->UserProfile->profile_image }}" class="rounded-circle" style="width: 250px;">
      @endif
    </div>
    <div class="col-md-4">
      <div class="card-body">
        <h5 class="card-title">{{ $book->User->name }}</h5>
      </div>
    </div>
  </div>
</div>
  
<div class="mt-4">
  <h4>コメント</h>
</div>
<p>コメントはありません</p>
<p class="mt-3">※売り切れのためコメントできません</p>