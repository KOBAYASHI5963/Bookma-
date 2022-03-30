<div class="card" style="width: 20rem;">
  <div class="card-body">
    <h4 class="card-title">詳細検索</h4>
    <form class="d-flex" method="GET" action="{{ route('searchFunction') }}">
    <div>
      <input class="form-control me-2" id="keyword" name="keyword" type="text" placeholder="キーワードを検索" aria-label="Search">
        <div class="mt-3">
          <select class="form-select form-select-lg mb-3" id="category_id" aria-label=".form-select-lg" name="category_id">
          <option value="">カテゴリーを選択</option>
            @foreach ($categories as $category)
              <option value="{{$category->id}}" @if(old('category_id')=="$category->id") selected  @endif>{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div>
          <select class="form-select form-select-lg mb-3" id="product_condition"  aria-label=".form-select-lg" name="product_condition">
          <option value="">商品の状態を選択</option>
            @foreach ($productConditions as $productCondition)
              <option value="{{$productCondition->id}}" @if(old('product_condition')=="$productCondition->id") selected  @endif>{{$productCondition->condition}}</option>
            @endforeach
          </select>
        </div>
        <div>
          <select class="form-select form-select-lg mb-3" id="price" aria-label=".form-select-lg" name="price">
          <option value=""> 価格</option>
          <option value="1"> 0〜500円</option>
          <option value="2"> 501〜1000円</option>
          <option value="3"> 1001〜2000円</option>
          <option value="4"> 2001〜3000円</option>
          <option value="5"> 3001〜5000円</option>
          <option value="6"> 5001〜10000円</option>
          <option value="7"> 10001〜50000円</option>
          <option value="8"> 50001〜100000円</option>
          <option value="9"> 100001円以上</option>
          </select>
        </div>
        <div class="mt-3">
          <button class="btn btn-outline-success" type="submit">検索</button>
          <button name="action" value="clear" type="button" class="btn btn-outline-success" onclick="clearForm(this);">クリア</button>
        </div>
    </div>
    </form>
  </div>
</div>

<script src="{{ asset('/js/seachForm.js') }}"></script>