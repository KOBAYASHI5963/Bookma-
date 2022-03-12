<div class="mb-3">
  <h3>お届け先の住所登録</h3>
</div>

<div class="card mb-3 mt-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
      
      <form method="POST" action="{{ route('shippingAddressCreate') }}" enctype="multipart/form-data">
   {{ csrf_field() }}
        
        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">氏名</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('name') }}" name="name">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：本田 熊雄</small></div>
        </div>
        @if($errors->has('name'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('name') }}
        </div>
        @endif
        
        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">郵便番号(7桁)</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('post_code') }}" name="post_code">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：1234567</small></div>
        </div>
        @if($errors->has('post_code'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('post_code') }}
        </div>
        @endif
        
        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">都道府県</label>
          <div>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg" name="prefecture">  
            <option value="">選択してください</option>
              @foreach ($prefectures as $prefecture)
                <option value="{{$prefecture->id}}" @if(old('prefecture')=="$prefecture->id") selected  @endif>{{$prefecture->area}}</option>
              @endforeach
            </select>
          </div>
        </div>
        @if($errors->has('prefecture'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('prefecture') }}
        </div>
        @endif

        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">市区町村</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('city') }}" name="city">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：港区</small></div>
        </div>
        @if($errors->has('city'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('city') }}
        </div>
        @endif

        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">番地</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('street') }}" name="street">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：青山1-2-3</small></div>
        </div>
        @if($errors->has('street'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('street') }}
        </div>
        @endif
        
        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">任意</button>
          <label for="exampleInputEmail1" class="form-label">建物名</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('building_name') }}" name="building_name">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：レブロンハイツ325</small></div>
        </div>
        @if($errors->has('building_name'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('building_name') }}
        </div>
        @endif

        <div class="mb-3">
          <button type="button" class="btn btn-danger btn-sm mb-2" style="pointer-events: none">必須</button>
          <label for="exampleInputEmail1" class="form-label">電話番号</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('phone_number') }}" name="phone_number">
          <div id="emailHelp" class="form-text"><small class="text-muted">例：09012345678</small></div>
        </div>
        @if($errors->has('phone_number'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('phone_number') }}
        </div>
        @endif

        <input class="btn btn-info btn" type="submit" value="保存">
        <a class="btn btn-secondary btn" href="{{ route('shippingAddress') }}" >戻る</a>
      
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
