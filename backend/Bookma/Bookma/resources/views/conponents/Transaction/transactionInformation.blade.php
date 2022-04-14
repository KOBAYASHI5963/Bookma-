<div class="mb-3"> 
  <h3>購入内容の確認</h3>
</div>

<div class="card mb-3" style="max-width: 700px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ $book->BookImages[0]->book_images_url }}" style="height:180px; width:240px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3 col-xs-6">
            <div class="mt-3">
              <p>商品名</p>
              <p>商品代金</p>
              <p>送料</p>
            </div>
          </div>
          <div class="col-sm-9 col-xs-6">
            <ul class='list-unstyled'>  
              <li class="mt-3">{{ $book->title }}</li>
              <li class="mt-3">¥{{ $book->price }}</li>
              @if($book->shipping_bearer === 1)
              <li class="mt-3">送料込み（出品者負担）</li>
              @else($book->shipping_bearer === 2)
              <li class="mt-3">着払い（購入者負担）</li>
              @endif
            </ul>  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="mt-5">
  <h3>配送先</h>
</div>

<div class="mt-3">
  @if($shippingAddressLists->count())
    @foreach($shippingAddressLists as $shippingAddressList)
      <div class="card">
        <div class="row g-0">
        <label>
          <input class="shippingAddress-check ml-4" type="radio" name="shippingAddress_select" value="{{ $shippingAddressList->id }}" onclick="formSwitch()">
        </label>
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
      <div class="mt-4">
        <h6>※配送先に変更がないかご確認ください</h>
      </div>
      <div class="mb-4">
        <a href="{{ route('shippingAddress') }}">
          <h5 class="text-right">お届け先住所の追加登録</h5>
        </a>
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