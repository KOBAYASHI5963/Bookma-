<div class="mt-4 ml-3">
  <h3 class="font">出金管理</h3>
</div>


<div class="btn-group mt-3 mb-2" role="group">
  <a href="{{ route('top') }}" class="btn btn-primary mr-2">出金申請中</a>
  <a href="{{ route('pay') }}" class="btn btn-secondary">出金済</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col-1 col-sm-1">#</th>
      <th scope="col-2 col-sm-3">申請ユーザー</th>
      <th scope="col-3 col-sm-3">申請日時</th>
      <th scope="col-3 col-sm-3">申請金額</th>
      <th scope="col-3 col-sm-2">アクション</th>
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
          <td><button type="button" class="btn btn-danger payment" data-toggle="modal" data-target="#exampleModal">
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
    <div class="">
      <h5 class="notApplication">※出金申請中のものはありません。</h5>
    </div>
  @endif
</table>


@push('css')

<link rel="stylesheet" href="{{ asset('css/administratorApplication.css') }}">

@endpush