<div class="container">
    <div class="cart__title mb-3">
      <h3>カート一覧</h3>
    </div>
    @if($cartBooks->count())
    <div class="cart-wrapper">
        @foreach ($cartBooks as $cartBook)
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
                  <div class="card__btn-trash col-12">
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
        @endforeach
    </div>
    @else
    <div class="cart__empty">
        カートに商品が入っていません。
    </div>
    @endif
</div>