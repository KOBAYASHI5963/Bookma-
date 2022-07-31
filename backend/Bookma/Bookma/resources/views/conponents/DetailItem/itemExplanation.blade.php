<div>
  <h2 class="book-title">{{ $book->title }}</h2>
</div>

<div class="mt-3">
  <h4 class="book-price">¥{{ $book->price }} (税込)</h4>
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
    <p class="book-favorite"> お気に入り数 {{ $book->favoriteUsers()->count() }}</p>
  </div>
  @endif
@endauth


@if(Auth::id() === $book->user_id)
  <a class="btn btn-primary btn-lg " href="{{ route('sellerSalesBooksEdit', ['id' => $book->id]) }}" >商品内容を編集</a>
@else
  @if($isSoldOut)
  <button type="button" class="btn btn-secondary btn-lg" disabled>売り切れました</button>
  @else
  <a class="btn btn-danger btn-lg mt-3" href="{{ route('book.purchase', ['id' => $book->id]) }}" >購入手続きへ</a>
    @auth
      @if ($book->carts()->where('user_id', Auth::id())->exists())
        <h5 class="inCart mt-3">この本は既にカートに入っています。</h5>
        <a class="cart-list" href="{{ route('cart.show') }}" >カート一覧はこちら</a>
      @else
        <div class="mt-3">
          <form method="post" action="{{ route('cart.add') }}">
              @csrf
              <input type="hidden" name="book_id" value="{{ $book->id }}" >
              <button type="submit" class="btn btn-warning btn-lg" >カートに入れる</button>
          </form>
        </div>
      @endif
    @endauth
  @endif
@endif


<div class="mt-5">
  <h4 class="item-explanation">商品の説明</h4>
</div>

<div>
  <p class="explanation">{{ $book->content }}</p>
</div>

<div class="mt-5">
  <h4 class="item-explanation">商品の情報</h4>
</div>

<div class="row">
  <div class="col-4">
    <div class="infomation mt-4">
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
      <div class="infomation mt-4">
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
    <h4 class="item-explanation">出品者</h>
  </div>


  <div class="card">
    <div>
      <div class="row g-0">

          @if(is_null( $book->User->UserProfile->profile_image ))
          <div class="col-4 col-sm-6 d-flex align-items-center justify-content-strat">
            <a href="{{ route('user.show', ['id' => $book->User->id]) }}">
              <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle">
            </a>
          </div>
          @else
          <div class="col-4 col-sm-6 d-flex align-items-center justify-content-strat">
            <a href="{{ route('user.show', ['id' => $book->User->id]) }}">
              <img src="{{ $book->User->UserProfile->profile_image }}" class="rounded-circle">
            </a>
          </div>
          @endif
        
          @if (Auth::id())
            @if (Auth::id() != $book->User->id)
              <div class="col-4 col-sm-2 d-flex align-items-center justify-content-center"> 
                <a href="{{ route('user.show', ['id' => $book->User->id]) }}">
                  <div>
                    <h5 class="user-name">{{ $book->User->name }}</h5>
                  </div>
                </a>
              </div>
            @else
              <div class="col-8 col-sm-6 d-flex align-items-center justify-content-center"> 
                <a href="{{ route('user.show', ['id' => $book->User->id]) }}">
                  <div>
                    <h5 class="user_name">{{ $book->User->name }}</h5>
                  </div>
                </a>
              </div>
            @endif
          @else
            <div class="col-8 col-sm-6 d-flex align-items-center justify-content-center"> 
                <a href="{{ route('user.show', ['id' => $book->User->id]) }}">
                  <div>
                    <h5 class="user_name">{{ $book->User->name }}</h5>
                  </div>
                </a>
            </div>
          @endif
        
          @auth
          @if (Auth::id() != $book->User->id)
            @if (Auth::user()->is_following($book->User->id))
              <div class="col-4 col-sm-4 d-flex align-items-center justify-content-end">
                <form class="mb-4" method="post" action="{{ route('user.unfollow', $book->User->id) }}">
                  @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn_follow btn btn-danger">フォロー中</button>
                </form>
              </div>
            @else
              <div class="col-4 col-sm-4 d-flex align-items-center justify-content-end">
                <form class="mb-4" method="post" action="{{ route('user.follow', $book->User->id) }}">
                  @csrf
                    <button type="submit" class="btn_follow btn btn-primary">フォロー</button>
                </form>
              </div>
            @endif
          @endif
          @endauth
        
      </div>
    </div>
  </div>




@push('css')

<link rel="stylesheet" href="{{ asset('css/itemExplanation.css') }}">

@endpush