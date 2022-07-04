<div class="container">
  <div class="cart__title mb-3">
    <h3 class="font">カート一覧</h3>
  </div>
  @if($isShowCartBooks == true)
    <div class="cart-wrapper">
      @foreach ($cartBooks as $cartBook)
        <div class="card mb-3">
          <div class="row">
            <div class="col-4">
              <a href="{{ route('book.show', ['id' => $cartBook->id]) }}">
                <img src="{{ $cartBook->BookImages[0]->book_images_url }}" alt="{{ $cartBook->title }}" class="book_image">
              </a>
            </div>
            <div class="card-product-name col d-flex align-items-center">
              <a class="books-title" href="{{ route('book.show', ['id' => $cartBook->id]) }}">
                {{ $cartBook->title }}
              </a>
            </div>
            <div class="total-price col d-flex align-items-center">
              ￥{{ $cartBook->price }} 
            </div>
            <div class="card__total-price col d-flex align-items-center">
              <form action="{{ route('cart.destroy',['id' => $cartBook->id])}}" method="post" id="delete_{{ $cartBook->id }}">
              @method('DELETE')
              {{ csrf_field() }}
              <input type="hidden" name="book_id" value="{{ $cartBook->id }}">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-danger delete_btn" onclick="deletePost(this);" data-id="{{ $cartBook->id }}">削除</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <form action="{{ route('cart.checkout')}}" method="get">
      <button type="submit" class="btn btn-danger" >決済ページに進む</button>
        @if($errors->has('shipping_address_id'))
          <div class="alert alert-success" role="alert">
            {{ $errors->first('shipping_address_id') }}
          </div>
        @endif
        <div class="mt-3">
          @if($shippingAddressLists->count())
            <p class="select">お届け先を選択して下さい。</p>
            @foreach($shippingAddressLists as $shippingAddressList)
              <div class="card mb-2">
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
              <div class="mt-4">
                <h6 class="attention">※お届け先に変更がないかご確認ください</h>
              </div>
          @else
            <div class="mt-3">
              <h5>※お届け先の住所が設定されておりませんので設定してください。</h5>
            </div>
            <div class="mt-3">
              <h5><a href="{{ route('shippingAddress') }}">お届け先の住所登録はこちら</a></h5>
            </div>
          @endif
    </form>
  @else
    <div class="cart_empty">
      カートに商品が入っていません。
    </div>
    <div class="mt-3">
    <a class="top" href="{{ route('top') }}" >トップにもどる</a>
    </div>
  @endif
</div>

<script>
function deletePost(e) {
  if (confirm('本当に削除していいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  console.log(e.dataset.id)
  }
console.log(e.dataset.id)
}
</script>


@push('css')

<link rel="stylesheet" href="{{ asset('css/cart.css') }}">

@endpush