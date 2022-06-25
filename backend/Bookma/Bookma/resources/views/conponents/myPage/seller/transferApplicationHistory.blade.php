<div class="mb-3">
  <h3 class="font">振込申請履歴</h3>
</div>

@if($applicationAmounts->count())
  @foreach($applicationAmounts as $applicationAmount)
  <div class="card mb-3 mt-3">
      <div class="col-md-8">
        <div class="card-body">
          @if($applicationAmount->application_status == 1)
            <p class="application_status">振込申請中</p>
          @else
            <p class="application_status">入金済</p>
          @endif
          <div>
            <p class="applicationAmount">振込申請金額：¥{{ $applicationAmount->amount_money }}</p>
          </div>
          <p class="card-text"><small>日時：{{ $applicationAmount->created_at }}</small></p>
        </div>
      </div>
  </div>
  @endforeach
{{ $applicationAmounts->links() }}
@else
  <div class="mt-4">
    <h5 class="transferApplicationHistory">※振込履歴はありません。</h5>
  </div>
  <div class="mt-3">
    <h5><a class="transferApplication" href="{{ route('sellerTransferApplication') }}">振込申請はこちらから</a></h5>
  </div>
@endif

@push('css')

<link rel="stylesheet" href="{{ asset('css/transferApplicationHistory.css') }}">

@endpush