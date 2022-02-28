<div class="card mb-3" style="height:190px; width:400px;">
  <div class="card-body">
    <div class="row">
      <div class="col-sm-6 col-xs-7">
        <div class="mt-3">
        <p><h5>商品代金</h></p>
        <p><h5>支払い金額</h></p>
        <p><h5>支払い方法</h></p>
        </div>
      </div>
      <div class="col-sm-6 col-xs-5">
        <ul class='list-unstyled'>  
          <li class="mt-3"><h5>¥{{ $book->price }}</h></li>
          <li class="mt-3"><h5>¥{{ $book->price }}</h></li>
          <li class="mt-3"><h5>クレジットカード</h></li>
        </ul>  
      </div>
    </div>
  </div>
</div>

<div class="d-grid col-2 mx-auto">
  <a class="btn btn-danger btn " href="{{ route('book.complete', ['id' => $book->id]) }}" >購入する</a>
</div>