<div class="mb-3">
  <h3>振込口座新規作成</h3>
</div>

<div class="card mb-3 mt-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
      
      <form method="POST" action="{{ route('sellerTransferAccountSettingCreate') }}" enctype="multipart/form-data">
   {{ csrf_field() }}

        <p class="card-text"><small class="text-muted">銀行名</small></p>
        <button type="button" class="btn btn-danger btn-sm">必須</button>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bank_name">
        @if($errors->has('bank_name'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('bank_name') }}
        </div>
        @endif

        <p class="card-text"><small class="text-muted">銀行コード</small></p>
        <button type="button" class="btn btn-danger btn-sm">必須</button>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="bank_code">
        @if($errors->has('bank_code'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('bank_code') }}
        </div>
        @endif

        <p class="card-text"><small class="text-muted">支店名</small></p>
        <button type="button" class="btn btn-danger btn-sm">必須</button>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="branch_name">
        @if($errors->has('branch_name'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('branch_name') }}
        </div>
        @endif

        <p class="card-text"><small class="text-muted">支店コード</small></p>
        <button type="button" class="btn btn-danger btn-sm">必須</button>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="branch_code">
        @if($errors->has('branch_code'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('branch_code') }}
        </div>
        @endif

        <p class="card-text"><small class="text-muted">預金種別</small></p>
        <button type="button" class="btn btn-danger btn-sm">必須</button>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="deposit_type" id="inlineRadio1" value="普通" checked>
        <label class="form-check-label" for="inlineRadio1">普通</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="deposit_type" id="inlineRadio2" value="当座">
        <label class="form-check-label" for="inlineRadio2">当座</label>
        </div>
        @if($errors->has(''))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('') }}
        </div>
        @endif

        <p class="card-text"><small class="text-muted">口座番号</small></p>
        <button type="button" class="btn btn-danger btn-sm">必須</button>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="account_number">
        @if($errors->has('account_number'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('account_number') }}
        </div>
        @endif

        <p class="card-text"><small class="text-muted">口座名義（全角カタカナ）</small></p>
        <button type="button" class="btn btn-danger btn-sm">必須</button>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="account_name">
        @if($errors->has('account_name'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('account_name') }}
        </div>
        @endif

        <input class="btn btn-info btn" type="submit" value="保存">
        <a class="btn btn-secondary btn" href="{{ route('sellerTransferAccountSetting') }}" >戻る</a>
      
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
