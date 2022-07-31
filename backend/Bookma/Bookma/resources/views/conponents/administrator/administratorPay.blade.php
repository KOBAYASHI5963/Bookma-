<div class="mt-4 ml-3">
  <h3 class="font">出金管理</h3>
</div>


<div class="btn-group mt-3 mb-2" role="group">
  <a href="{{ route('top') }}" class="btn btn-secondary mr-2">出金申請中</a>
  <a href="{{ route('pay') }}" class="btn btn-primary">出金済</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th class="col-3 col-sm-2">#</th>
      <th class="col-3 col-sm-3">出金済ユーザー</th>
      <th class="col-3 col-sm-4">出金日時</th>
      <th class="col-3 col-sm-3 pay">出金額</th>
    </tr>
  </thead>
  @if($PayAccounts->count())
    @foreach($PayAccounts as $PayAccount)
      <tbody>
        <tr>
          <th scope="row">{{ $number++ }}</th>
          <td>{{ $PayAccount->user->name }}</td>
          <td>{{ $PayAccount->updated_at }}</td>
          <td>{{ $PayAccount->amount_money }}</td>
        </tr>
      </tbody>
    @endforeach
  @else
    <div class="mt-4 ml-5">
      <h5 class="notPay">※出金済のものはありません。</h5>
    </div>
  @endif
</table>


@push('css')

<link rel="stylesheet" href="{{ asset('css/administratorPay.css') }}">

@endpush