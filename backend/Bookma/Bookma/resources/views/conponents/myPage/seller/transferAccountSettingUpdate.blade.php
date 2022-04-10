<div class="mb-3">
  <h3>振込口座編集</h3>
</div>

<div class="card mb-3 mt-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
      
      <form method="POST" action="{{ route('sellerTransferAccountSettingUpdate') }}" enctype="multipart/form-data">
   {{ csrf_field() }}
        
       <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">銀行名</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$transferAccountSetting->bank_name}}" name="bank_name">
        <div id="emailHelp" class="form-text"><small class="text-muted">例：みずほ</small></div>
       </div>
        @if($errors->has('bank_name'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('bank_name') }}
        </div>
        @endif
        
        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">銀行コード(4桁)</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$transferAccountSetting->bank_code}}" name="bank_code">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：1234</small></div>
        </div>
        @if($errors->has('bank_code'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('bank_code') }}
        </div>
        @endif
        
        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">支店名</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$transferAccountSetting->branch_name}}" name="branch_name">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：新宿</small></div>
        </div>
        @if($errors->has('branch_name'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('branch_name') }}
        </div>
        @endif

        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">支店コード(3桁)</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$transferAccountSetting->branch_code}}" name="branch_code">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：123</small></div>
        </div>
        @if($errors->has('branch_code'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('branch_code') }}
        </div>
        @endif
       
        <div class="mb-3">
          <div>
            <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
            <label for="exampleInputEmail1" class="form-label">預金種別</label>
          </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="deposit_type" id="inlineRadio1" value="普通" {{ $transferAccountSetting->deposit_type == '普通' ? 'checked' : '' }}>
              <label class="form-check-label" for="inlineRadio1">普通</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="deposit_type" id="inlineRadio2" value="当座" {{ $transferAccountSetting->deposit_type == '当座' ? 'checked' : '' }}>
              <label class="form-check-label" for="inlineRadio2">当座</label>
            </div>
        </div>
        @if($errors->has('deposit_type'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('deposit_type') }}
        </div>
        @endif

        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">口座番号(7桁)</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$transferAccountSetting->account_number}}" name="account_number">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：1234567</small></div>
        </div>
        @if($errors->has('account_number'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('account_number') }}
        </div>
        @endif
        
        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">口座名義（全角カタカナ）</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$transferAccountSetting->account_name}}" name="account_name">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：ブックマ</small></div>
       </div>
        @if($errors->has('account_name'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('account_name') }}
        </div>
        @endif 
        

        <input class="btn btn-info btn" type="submit" value="更新">
        <a class="btn btn-secondary btn" href="{{ route('sellerTransferAccountSetting') }}" >戻る</a>
      
        </form>
        </div>
      </div>
    </div>
  </div>
</div>




