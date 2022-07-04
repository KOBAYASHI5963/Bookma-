<div class="mb-3">
  <h3 class="font">お届け先住所一覧</h3>
</div>

@if($shippingAddressLists->count())
@foreach($shippingAddressLists as $shippingAddressList)
<div class="card mb-2">
  <div class="row g-0">
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

        <div class="d-flex justify-content-start mt-2">
          <a class="btn btn-success btn mr-2" href="{{ route('shippingAddressEdit', ['id' => $shippingAddressList->id]) }}" >編集</a>
          <form action="{{ route('shippingAddressDestroy', ['id' => $shippingAddressList->id]) }}" method="post" id="delete_{{ $shippingAddressList->id }}">
          @method('DELETE')
          {{ csrf_field() }}
            <button class="btn btn-danger" onclick="deletePost(this);" type="button" data-id="{{ $shippingAddressList->id }}">削除</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
{{ $shippingAddressLists->links() }}

<div class="mb-4">
  <a href="{{ route('shippingAddress') }}">
    <h5 class="shippingAddress">お届け先住所の追加登録</h5>
  </a>
</div>

@else
<div class="mt-3">
  <h5 class="notAddress">※お届け先の住所が設定されておりません。</h5>
</div>
<div class="mt-3">
  <a href="{{ route('shippingAddress') }}">
      <h5 class="shippingAddress">お届け先の住所登録はこちら</h5>
  </a>
</div>

@endif


<script>
function deletePost(e) {
  if (confirm('本当に削除していいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
}
</script>


@push('css')

<link rel="stylesheet" href="{{ asset('css/shippingAddressList.css') }}">

@endpush