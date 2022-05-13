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
      <th scope="col">申請ユーザー</th>
      <th scope="col">申請日時</th>
      <th scope="col">申請金額</th>
      <th scope="col">アクション</th>
    </tr>
  </thead>
  @if($ApplicationAccounts->count())
    @foreach($ApplicationAccounts as $ApplicationAccount)
      <tbody>
        <tr>
          <th scope="row">{{ $number++ }}</th>
          <td>{{ $ApplicationAccount->user->name }}</td>
          <td>{{ $ApplicationAccount->created_at }}</td>
          <td>{{ $ApplicationAccount->amount_money }}</td>
          <td><button type="submit" class="btn btn-danger">入金する</button></td>
        </tr>
      </tbody>
    @endforeach
  @else
    <div class="mt-4 ml-5">
      <h5>※出金申請中のものはありません。</h5>
    </div>
  @endif
</table>
