<div>
  <h2>{{ $book->title }}</h2>
</div>

<div class="mt-3">
  <h4>¥{{ $book->price }} (税込)</h4>
</div>
<div class="mt-3">
@auth
  @if(Auth::id() !== $book->user_id)
    @if ($book->favoriteUsers()->where('user_id', Auth::id())->exists())
      <form method="post" action="{{ route('favorites.unfavorite', $book->id) }}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" class="btn btn-danger"><i class="far fa-star text-white mr-2"><i class="fa-duotone fa-star"></i></i>お気に入り解除</button>
      </form>
    @else
      <form method="post" action="{{ route('favorites.favorite', $book->id) }}">
        @csrf
        <button type="submit" class="btn btn-success"><i class="far fa-star text-white mr-2"></i>お気に入り</button>
      </form>
    @endif
  </div>
  <div>
    <p> お気に入り数 {{ $book->favoriteUsers()->count() }}</p>
  </div>
  @endif
@endauth


@if(Auth::id() === $book->user_id)
  <a class="btn btn-primary btn-lg " href="{{ route('sellerSalesBooksEdit', ['id' => $book->id]) }}" >商品内容を編集</a>
@else
  <button type="button" class="btn btn-secondary btn-lg" disabled>売り切れました</button>

  <a class="btn btn-danger btn-lg" href="{{ route('book.purchase', ['id' => $book->id]) }}" >購入手続きへ</a>
  @auth
    @if ($book->carts()->where('user_id', Auth::id())->exists())
      <h5 class="mt-3">この本は既にカートに入っています。</h5>
      <a href="{{ route('cart.show') }}" >カート一覧はこちら</a>
    @else
      
      <form method="post" action="{{ route('cart.add') }}">
          @csrf
          <input type="hidden" name="book_id" value="{{ $book->id }}" >
          <button type="submit" class="btn btn-warning btn-lg" >カートに入れる</button>
      </form>
    @endif
  @endauth
@endif


<div class="mt-5">
      <h4>商品の説明</h4>
</div>

<div>
  <p>{{ $book->content }}</p>
</div>

<div class="mt-5">
  <h4>商品の情報</h4>
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

<a href="{{ route('user.show', ['id' => $book->User->id]) }}">
  <div class="card">
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
          @auth
          @if (Auth::id() != $book->User->id)
            @if (Auth::user()->is_following($book->User->id))
                <form class="mb-4" method="post" action="{{ route('user.unfollow', $book->User->id) }}">
                  @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">フォロー中</button>
                </form>
            @else
                <form class="mb-4" method="post" action="{{ route('user.follow', $book->User->id) }}">
                  @csrf
                    <button type="submit" class=" btn btn-primary">フォロー</button>
                </form>
            @endif
          @endif
          @endauth
        </div>
      </div>
    </div>
  </div>
</a>
  
<div class="mt-4">
  <h4>コメント</h>
</div>
<p>コメントはありません</p>
<p class="mt-3">※売り切れのためコメントできません</p>