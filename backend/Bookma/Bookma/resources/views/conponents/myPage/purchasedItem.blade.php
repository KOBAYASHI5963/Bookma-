<div class="mb-3">
  <h3>購入した商品</h3>
</div>

  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="{{ route('purchaseHistory_transaction') }}" role="tab" aria-controls="pills-home" aria-selected="true">取引中</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="{{ route('purchaseHistory_past_transaction') }}" role="tab" aria-controls="pills-profile" aria-selected="false">過去の取引</a>
    </li>
  </ul>
<div id="pills-tabContent">
  <div id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">現在取引中のものはありません。</div>
</div>
