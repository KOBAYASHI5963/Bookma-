<div>
  <h2>{{ $book->title }}</h2>
</div>

<div class="mt-3">
  <h4>¥{{ $book->price }} (税込)</4>
</div>

<button type="button" class="btn btn-secondary btn-lg" disabled>売り切れました</button>

<a class="btn btn-danger btn-lg " href="#" >購入手続きへ</a>

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
        <a href=""><li>{{ $category->name }}</li></a>
        <li class="mt-3">{{ $productCondition->condition }}</li>
        <li class="mt-3">{{ $book->shipping_bearer }}</li>
        <li class="mt-3">{{ $sippingMethod->means }}</li>
        <li class="mt-3">{{ $shippingArea->area }}</li>
        <li class="mt-3">{{ $book->delivery_days }}</li>
      </div>
    </ul>
  </div>
<div>

<div class="mt-4">
  <h4>出品者</h>
</div>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">田辺さん</h5>
        <p class="card-text">★★★★★534</p>
      </div>
    </div>
  </div>
</div>
  
<div class="mt-4">
  <h4>コメント</h>
</div>
<p>コメントはありません</p>
<p class="mt-3">※売り切れのためコメントできません</p>