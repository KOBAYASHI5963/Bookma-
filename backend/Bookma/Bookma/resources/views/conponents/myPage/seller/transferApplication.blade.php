<div class="mb-3">
  <h3>振込申請</h3>
</div>

<div class="card-group">
  <div class="card">
    <div class="card-body">
    <h5>申請可能金額</h5>
      <h2 class="card-title">¥550</h2>
    </div>
  </div>
      
  <div class="card">
    <div class="card-body">
    <h5>累計の売上金額</h5>
      <h2 class="card-title">¥{{ $totalPrice }}</h2>
    </div>
  </div>
</div>

  <div class="text-right mt-2">
    <a href="{{ route('sellerSalesHistory') }}"><h9>売上履歴</h9></a>
  </div>
  <div class="text-right mt-1">
    <a href="{{ route('sellerTransferApplicationHistory') }}"><h9>振込申請履歴</h9></a>
  </div>
  <div class="text-right mt-1">
    <a href="{{ route('sellerCommission') }}"><h9>振込申請・手数料について</h9></a>
  </div>

  <div class="mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">振込口座</h5>
        <p class="card-text text-center mt-4">振込申請には、振込口座設定をお願いします。</p>
        <div class="text-center">
          <a href="#" class="btn btn-primary">振込先口座を登録</a>
        </div>
      </div>
    </div>
  
  <div class="mt-4 mb-5">
    <div class="card">
      <div class="card-body">
        <p class="card-text text-center">申請可能金額が￥1,000以上の時のみ、振込申請可能です。</p>
        <p class="card-text text-center">詳しくは<a href="#">こちら</a>からご確認お願いします。</p>
       
      </div>
    </div>