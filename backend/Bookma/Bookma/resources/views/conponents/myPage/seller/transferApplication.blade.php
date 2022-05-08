<div class="mb-3">
  <h3>振込申請</h3>
</div>

<div class="card-group">
  <div class="card">
    <div class="card-body">
    <h5>申請可能金額</h5>
      <h2 class="card-title">¥{{ $canApplicationAmount }}</h2>
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

  @if(Auth::id() !== $transferAccountSetting->user_id)
    <div class="mt-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">振込口座</h5>
          <p class="card-text text-center mt-4">振込申請には、振込口座設定をお願いします。</p>
          <div class="text-center">
            <a href="{{ route('sellerTransferAccountSetting') }}" class="btn btn-danger">振込先口座を登録</a>
          </div>
        </div>
      </div>
    </div>
  @else
    <div class="mt-3">
      <h5 class="card-title">振込口座</h5>
        <div class="card">
          <div class="row g-0">
            <div class="col-md-8">
              <div class="card-body">
              <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">銀行名：</span>{{ $transferAccountSetting->bank_name }}</div>
              <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">銀行コード：</span>{{ $transferAccountSetting->bank_code }}</div>
              <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">支店名：</span>{{ $transferAccountSetting->branch_name }}</div>
              <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">支店コード：</span>{{ $transferAccountSetting->branch_code }}</div>
              <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">預金種別：</span>{{ $transferAccountSetting->deposit_type }}</div>
              <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">口座番号：</span>{{ $transferAccountSetting->account_number }}</div>
              <div style=”line-height:1em;”><span style="font-weight: bold line-height:1em;">口座名義：</span>{{ $transferAccountSetting->account_name }}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-3">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
          申請する
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">申請金額</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h2 class="card-title">¥{{ $canApplicationAmount }}</h2>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">申請しない</button>
                  <button type="button" class="btn btn-danger">申請する</button>
                </div>
              </div>
            </div>
          </div>
    </div>
  @endif



  <div class="mt-4 mb-5">
    <div class="card">
      <div class="card-body">
        <p class="card-text text-center">申請可能金額が￥1,000以上の時のみ、振込申請可能です。</p>
        <p class="card-text text-center">詳しくは<a href="#">こちら</a>からご確認お願いします。</p>
      </div>
    </div>
  </div>