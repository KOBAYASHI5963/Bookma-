div class="mb-3">
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
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">現在取引中のものはありません。</div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">過去の取引はありません。</div>
</div>
