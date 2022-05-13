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
          <!-- Button trigger modal -->
          <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
          入金する
          </button></td>

          <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">出金額</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h2 class="card-title">¥{{ $ApplicationAccount->amount_money }}</h2>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                    <form method="post" action="{{ route('payment', ['id' => $ApplicationAccount->id]) }}">
                    @csrf
                      <input type="hidden" name="application_status" value="2" >
                      <button type="submit" class="btn btn-danger">入金する</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
      </tbody>
    @endforeach
  @else
    <div class="mt-4 ml-5">
      <h5>※出金申請中のものはありません。</h5>
    </div>
  @endif
</table>
