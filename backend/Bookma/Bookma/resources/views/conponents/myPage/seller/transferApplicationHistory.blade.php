<div class="mb-3">
  <h3>振込申請履歴</h3>
</div>

@foreach($applicationAmounts as $applicationAmount)
<div class="card mb-3 mt-3">
    <div class="col-md-8">
      <div class="card-body">
        @if($applicationAmount->application_status = 1)
          <p class="card-text"><span style="font-weight: bold">入金申請中</span></p>
        @else
          <p class="card-text"><span style="font-weight: bold">入金済</span></p>
        @endif
        <p class="card-text">振込申請金額：¥{{ $applicationAmount->amount_money }}</p>
        <p class="card-text"><small>日時：{{ $applicationAmount->created_at }}</small></p>
      </div>
    </div>
</div>
@endforeach