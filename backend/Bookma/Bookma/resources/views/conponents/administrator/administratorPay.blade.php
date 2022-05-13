<div class="mt-3 ml-5">
  <h3>出金管理</h3>
</div>


<div class="btn-group mt-2 ml-5" role="group">
  <a href="{{ route('top') }}" class="btn btn-outline-primary">出金申請中</a>
  <a href="{{ route('pay') }}" class="btn btn-outline-primary">出金済</a>
</div>

<table class="table mt-2 ml-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">出金済ユーザー</th>
      <th scope="col">出金日時</th>
      <th scope="col">出金額</th>
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
      <h5>※出金済のものはありません。</h5>
    </div>
  @endif
</table>