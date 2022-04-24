<div class="mb-3">
  <h3>購入した商品</h3>
</div>


@if($purchasedBooks->count())
@foreach($purchasedBooks as $purchasedBook)
<div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
      <a class="page-link" href="{{ route('book.show', ['id' => $purchasedBook->id]) }}">
        <img src="{{ $purchasedBook->BookImages[0]->book_images_url }}" style="height:210px; width:280px;">
      </a>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><a href="{{ route('book.show', ['id' => $purchasedBook->id]) }}">{{ $purchasedBook->title }}</h5></a>
          <p class="card-text">{{ $purchasedBook->price }}円</p>
          <p class="card-text">{{ $purchasedBook->productCondition->condition }}</p>
          <p class="card-text">出品ユーザー：<a href="{{ route('user.show', $purchasedBook->User->id) }}">{{ $purchasedBook->User->name }}</a></p>
          <p class="card-text"><small class="text-muted">日時：{{ $purchasedBook->created_at }}</small></p>
        </div>
      </div>
    </div>
</div>
@endforeach
{{ $purchasedBooks->links() }}
@else
  <div class="mt-5">
    <h4>過去の取引はありません。<h4>
    <h5>※購入されている本はありません。</h5>
  </div>
  <div class="mt-3">
    <a href="{{ route('top') }}" >トップにもどる</a>
  </div>
@endif
