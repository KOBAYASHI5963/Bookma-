<div class="card mt-5">
  <div class="card-body">
    <div class="row">
      <div class="col-6 col-xs-7">
        <div class="mt-3">
        <p><h5 class="list-price">商品代金</h></p>
        <p><h5 class="list-price">支払い金額</h></p>
        </div>
      </div>
      <div class="col-6 col-xs-5">
        <ul class='list-unstyled'>
          <li class="mt-3"><h5 class="book-price">¥{{ $book->price }}</h></li>
          <li class="mt-3"><h5 class="book-price">¥{{ $book->price }}</h></li>
        </ul>
      </div>
    </div>
  </div>
</div>


@push('css')

<link rel="stylesheet" href="{{ asset('css/itemPurchase.css') }}">

@endpush
