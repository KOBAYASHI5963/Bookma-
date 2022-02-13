<div class="text-center mb-3">
  <h3>商品の出品</h3>
</div>


    <div class="col-md-12">
      <div class="card-body">

      <form method="POST" action="{{ route('sellerSalesBooksCreate') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

        <p class="card-text">出品画像<small class="text-muted">(最大5枚)</small></p>
        <button type="button" class="btn btn-danger btn-sm" style="pointer-events: none">1枚目は画像登録必須</button>
        <div class="show-book_image">
          <input id="file-sample1" type="file" name="book_image1">
          <img id="file-preview1" class="my-4" style="height: 230px; width:400px;">
          <input id="file-sample2" type="file" name="book_image2">
          <img id="file-preview2" class="my-4" style="height: 230px; width:400px;">
          <input id="file-sample3" type="file" name="book_image3">
          <img id="file-preview3" class="my-4" style="height: 230px; width:400px;">
          <input id="file-sample4" type="file" name="book_image4">
          <img id="file-preview4" class="my-4" style="height: 230px; width:400px;">
          <input id="file-sample5" type="file" name="book_image5">
          <img id="file-preview5" class="my-4" style="height: 230px; width:400px;">
        </div>

    @if($errors->has('book_image1'))
    <div class="alert alert-success" role="alert">
        {{ $errors->first('book_image1') }}
    </div>
    @endif
    @if($errors->has('book_image2'))
    <div class="alert alert-success" role="alert">
        {{ $errors->first('book_image2') }}
    </div>
    @endif
    @if($errors->has('book_image3'))
    <div class="alert alert-success" role="alert">
        {{ $errors->first('book_image3') }}
    </div>
    @endif
    @if($errors->has('book_image4'))
    <div class="alert alert-success" role="alert">
        {{ $errors->first('book_image4') }}
    </div>
    @endif
    @if($errors->has('book_image5'))
    <div class="alert alert-success" role="alert">
        {{ $errors->first('book_image5') }}
    </div>
    @endif

        <div class="mt-4">
          <div>
            <h5 class="font-weight-bold">商品の詳細</h5>
          </div>
        </div>
        <div>
          <h8 class="card-text">カテゴリー</h8>
        <div>
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg" name="category_id">
          <option value="">選択してください</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}" @if(old('category_id')=="$category->id") selected  @endif>{{$category->name}}</option>
          @endforeach
         </select>
        </div>
        @if($errors->has('category_id'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('category_id') }}
        </div>
        @endif

        <div>
          <h8 class="card-text">商品の状態</h8>
        <div>
        <div>
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg" name="product_condition">
          <option value="">選択してください</option>
          @foreach ($productConditions as $productCondition)
            <option value="{{$productCondition->id}}" @if(old('product_condition')=="$productCondition->id") selected  @endif>{{$productCondition->condition}}</option>
          @endforeach
         </select>
        </div>
        @if($errors->has('product_condition'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('product_condition') }}
        </div>
        @endif

        <div class="mt-4">
          <div>
            <h5 class="font-weight-bold">商品名と説明</h5>
          </div>
        </div>
          <label for="exampleInputEmail1" class="form-label">商品名</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('title') }}" name="title">
          <p class="mt-2">※40文字以内</p>
          @if($errors->has('title'))
          <div class="alert alert-success" role="alert">
              {{ $errors->first('title') }}
          </div>
          @endif
          <label for="exampleInputEmail1" class="form-label">商品名の説明</label></label>
          <textarea name="content" cols="100" rows="10">{{ old('content') }}</textarea>
          <p>※1000文字以内</p>
        @if($errors->has('content'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('content') }}
        </div>
        @endif

        <div class="mt-4">
          <div>
            <h5 class="font-weight-bold">配送について</h5>
          </div>
        </div>

        <div>
          <h8 class="card-text">配送料の負担</h8>
        <div>
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg" name="shipping_bearer">
            <option value="">選択してください</option>
            <option value="1" @if(old('shipping_bearer')=='1') selected  @endif>送料込み（出品者負担）</option>
            <option value="2" @if(old('shipping_bearer')=='2') selected  @endif>着払い（購入者負担）</option>
         </select>
        </div>
        @if($errors->has('shipping_bearer'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('shipping_bearer') }}
        </div>
        @endif

        <div>
          <h8 class="card-text">配送の方法</h8>
        <div>
        <div>
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg" name="shipping_method_id">
          <option value="">選択してください</option>
          @foreach ($sippingMethods as $sippingMethod)
            <option value="{{$sippingMethod->id}}" @if(old('shipping_method_id')=="$sippingMethod->id") selected  @endif>{{$sippingMethod->means}}</option>
          @endforeach
         </select>
        </div>
        @if($errors->has('shipping_method_id'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('shipping_method_id') }}
        </div>
        @endif

        <div>
          <h8 class="card-text">発送元の地域</h8>
        <div>
        <div>
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg" name="shipping_area">
          <option value="">選択してください</option>
          @foreach ($shippingAreas as $shippingArea)
            <option value="{{$shippingArea->id}}" @if(old('shipping_area')=="$shippingArea->id") selected  @endif>{{$shippingArea->area}}</option>
          @endforeach
         </select>
        </div>
        @if($errors->has('shipping_area'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('shipping_area') }}
        </div>
        @endif

        <div>
          <h8 class="card-text">発送までの日数</h8>
        <div>
        <div>
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg" name="delivery_days">
          <option value="">選択してください</option>
            <option value="1〜2日で発送" @if(old('delivery_days')=='1〜2日で発送') selected  @endif>1〜2日で発送</option>
            <option value="2〜3日で発送" @if(old('delivery_days')=='2〜3日で発送') selected  @endif>2〜3日で発送</option>
            <option value="4〜7日で発送" @if(old('delivery_days')=='4〜7日で発送') selected  @endif>4〜7日で発送</option>
         </select>
        </div>
        @if($errors->has('delivery_days'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('delivery_days') }}
        </div>
        @endif


        <div class="mt-4">
          <div>
            <h5 class="font-weight-bold">販売価格</h5>
          </div>
        </div>
        <div>
          <h8 class="card-text">販売価格(¥300〜9,999,999)</h8>
        </div>
            <div class="input-group input-group-sm">
             <input type="text" class="form-control text-right"  id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('price') }}" name="price" placeholder="0">
            </div>
          @if($errors->has('price'))
        <div class="alert alert-success" role="alert">
            {{ $errors->first('price') }}
        </div>
        @endif

        <div class="mt-3">
          <h8 class="card-text">販売手数料</h8>
        <div>
        <div class="mt-2">
          <h8 class="card-text">販売利益</h8>
        <div>

        <div class="mt-3">
          <h8 class="card-text">禁止されている行為および出品物を必ずご確認ください。また、出品をもちまして加盟店規約に同意したことになります。</h8>
        <div>


       <div class="d-grid col-2 mx-auto">
       <input class="btn btn-danger btn" type="submit" value="出品する">
        </div>
        </form>
      
      </div>
    </div>

    <script>
  document.getElementById('file-sample1').addEventListener('change', function(e) {
    
    var file = e.target.files[0];

    // ファイルのブラウザ上でのURLを取得する
    var blobUrl = window.URL.createObjectURL(file);

    // img要素に表示
    var img = document.getElementById('file-preview1');
    img.src = blobUrl;
    
  });
  document.getElementById('file-sample2').addEventListener('change', function(e) {
    
    var file = e.target.files[0];

    // ファイルのブラウザ上でのURLを取得する
    var blobUrl = window.URL.createObjectURL(file);

    // img要素に表示
    var img = document.getElementById('file-preview2');
    img.src = blobUrl;
    
  });
  document.getElementById('file-sample3').addEventListener('change', function(e) {
    
    var file = e.target.files[0];

    // ファイルのブラウザ上でのURLを取得する
    var blobUrl = window.URL.createObjectURL(file);

    // img要素に表示
    var img = document.getElementById('file-preview3');
    img.src = blobUrl;
    
  });
  document.getElementById('file-sample4').addEventListener('change', function(e) {
    
    var file = e.target.files[0];

    // ファイルのブラウザ上でのURLを取得する
    var blobUrl = window.URL.createObjectURL(file);

    // img要素に表示
    var img = document.getElementById('file-preview4');
    img.src = blobUrl;
    
  });
  document.getElementById('file-sample5').addEventListener('change', function(e) {
    
    var file = e.target.files[0];

    // ファイルのブラウザ上でのURLを取得する
    var blobUrl = window.URL.createObjectURL(file);

    // img要素に表示
    var img = document.getElementById('file-preview5');
    img.src = blobUrl;
    
  });
</script>