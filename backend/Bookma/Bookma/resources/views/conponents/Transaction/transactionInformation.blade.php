<div class="mb-2"> 
  <h3 class="font">購入内容の確認</h3>
</div>


<div class="card mb-3">
  <div class="row g-0">
    <div class="col-4 col-xs-3">
      <a href="{{ route('book.show', ['id' => $book->id]) }}">
        <img src="{{ $book->BookImages[0]->book_images_url }}" class="book_image">
      </a>
    </div>
    <div class="col-8 col-xs-9">
      <div class="card-body">
        <div class="row">
          <div class="col-4 col-xs-3">
            <div class="mt-3">
              <p class="list">商品名</p>
              <p class="list">商品代金</p>
              <p class="list">送料</p>
            </div>
          </div>
          <div class="col-8 col-xs-9">
            <ul class='list-unstyled'>
              <a href="{{ route('book.show', ['id' => $book->id]) }}">
                <li class="title mt-3">{{ $book->title }}</li>
              </a>
              <li class="price mt-3">¥{{ $book->price }}</li>
              @if($book->shipping_bearer === 1)
              <li class="shipping_bearer mt-3">送料込み（出品者負担）</li>
              @else($book->shipping_bearer === 2)
              <li class="shipping_bearer mt-3">着払い（購入者負担）</li>
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<form action="{{ route('book.checkout',['id' => $book->id ])}}" method="get">
<button type="submit" class="btn btn-danger" >決済ページに進む</button>

<div class="mt-5">
  <h3 class="font">配送先</h>
</div>

<div class="mt-3">
  @if($shippingAddressLists->count())
    @foreach($shippingAddressLists as $shippingAddressList)
      <div class="card mt-2">
        <div class="row g-0 d-flex align-items-center">
        <input class="shippingAddress-check ml-4" type="radio" name="shipping_address_id" value="{{ $shippingAddressList->id }}">
          <div class="col-md-8">
            <div class="card-body">
              <div class="line mt-1">
                <span class="line-item">氏名：</span>{{ $shippingAddressList->name }}
              </div>
              <div class="line mt-1">
                <span class="line-item">郵便番号：</span>{{ $shippingAddressList->post_code }}
              </div>
              <div class="line mt-1">
                <span class="line-item">都道府県市区町村：</span>{{ $shippingAddressList->shippingArea->area}}{{ $shippingAddressList->city }}
              </div>
              <div class="line mt-1">
                <span class="line-item">番地：</span>{{ $shippingAddressList->street }}
              </div>
              <div class="line mt-1">
                <span class="line-item">建物名：</span>{{ $shippingAddressList->building_name }}
              </div>
              <div class="line mt-1">
                <span class="line-item">電話番号：</span>{{ $shippingAddressList->phone_number }}
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    @if($errors->has('shipping_address_id'))
        <div class="alert alert-success" role="alert">
          {{ $errors->first('shipping_address_id') }}
        </div>
      @endif
    </form>
      <div class="mt-4">
        <h6 class="attention">※配送先に変更がないかご確認ください</h>
      </div>
      <div class="mb-4">
        <a href="{{ route('shippingAddress') }}">
          <h5 class="shippingAddress">お届け先住所の追加登録</h5>
        </a>
      </div>
  @else
  <div class="mt-3">
      <h5 class="notAddress">※お届け先の住所が設定されておりませんので設定してください。</h5>
    </div>
    <div class="mt-3">
      <h5><a class="shippingAddress" href="{{ route('shippingAddress') }}">お届け先の住所登録はこちら</a></h5>
    </div>
  @endif
</div>


@push('css')

<link rel="stylesheet" href="{{ asset('css/transactionInformation.css') }}">

@endpush