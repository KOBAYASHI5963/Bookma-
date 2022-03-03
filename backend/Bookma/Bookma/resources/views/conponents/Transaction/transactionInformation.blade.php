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


<div class="mt-4">
  <h3>配送先</h>
</div>

<div class="mt-3">
  <h6>名前</h>
  <h6>郵便番号</h>
  <h6>住所</h>
  <h6>建物名</h>
</div>
<div class="d-grid col-2 mx-auto">
  <input class="btn btn-primary btn" type="button" value=" 編集する">
</div>

<div class="mt-4">
  <h6>※配送先に変更がないかご確認ください</h>
</div>