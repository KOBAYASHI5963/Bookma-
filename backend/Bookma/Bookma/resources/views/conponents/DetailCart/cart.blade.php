<div class="container">
    <div class="cart__title mb-3">
      <h3>カート一覧</h3>
    </div>
    @if($cartBooks->count())
    <div class="cart-wrapper">
        @foreach ($cartBooks as $cartBook)
        <a href="{{ route('book.show', ['id' => $cartBook->id]) }}">
          <div class="card mb-3">
              <div class="row">
                  <img src="{{ $cartBook->BookImages[0]->book_images_url }}" alt="{{ $cartBook->title }}" style="height:200px; width:280px;">
                  <div class="card-body">
                    <div class="card-product-name col-8">
                      {{ $cartBook->title }}
                    </div>
                    <div class="card__total-price col-9 text-center">
                      ￥{{ $cartBook->price }} 
                    </div>
                    <form action="{{ route('cart.destroy',['id' => $cartBook->id])}}" method="post">
                    <div class="card__btn-trash col-10">
                      @method('DELETE')
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $cartBook->id }}" >
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-danger" >削除</button>
                        </div>
                    </div>
                    </form>
                  </div>
              </div>
          </div>
        </a>
        @endforeach
    </div>

<form action="{{ route('cart.checkout')}}" method="get">
<button type="submit" class="btn btn-danger" >決済ページに進む</button>
  <div class="mt-3">
    @if($shippingAddressLists->count())
      <p>お届け先を選択して下さい。</p>
      @foreach($shippingAddressLists as $shippingAddressList)
          <div class="card mb-2">
            <div class="row g-0">
              <input class="shippingAddress-check ml-4" type="radio" name="shipping_address_id" value="{{ $shippingAddressList->id }}">
              <div class="col-md-8">
                <div class="card-body">
                <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">氏名：</span>{{ $shippingAddressList->name }}</div>
                <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">郵便番号：</span>{{ $shippingAddressList->post_code }}</div>
                <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">都道府県市区町村：</span>{{ $shippingAddressList->shippingArea->area}}{{ $shippingAddressList->city }}</div>
                <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">番地：</span>{{ $shippingAddressList->street }}</div>
                <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">建物名：</span>{{ $shippingAddressList->building_name }}</div>
                <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">電話番号：</span>{{ $shippingAddressList->phone_number }}</div>
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
        <h6>※お届け先に変更がないかご確認ください</h>
      </div>
  @else
  <div class="mt-3">
      <h5>※お届け先の住所が設定されておりませんので設定してください。</h5>
    </div>
    <div class="mt-3">
      <h5><a href="{{ route('shippingAddress') }}">お届け先の住所登録はこちら</a></h5>
    </div>
  @endif
</div>
    @else
    <div class="cart__empty">
        カートに商品が入っていません。
    </div>
    <div class="mt-3">
      <a href="{{ route('top') }}" >トップにもどる</a>
    </div>
    @endif
</div>