<div class="mb-3">
  <h3>購入した商品</h3>
</div>

  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="pills-home-tab" data-bs-toggle="pill" href="{{ route('purchaseHistory_transaction') }}" role="tab" aria-controls="pills-home" aria-selected="true">取引中</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" href="{{ route('purchaseHistory_past_transaction') }}" role="tab" aria-controls="pills-profile" aria-selected="false">過去の取引</a>
    </li>
  </ul>
<div  id="pills-tabContent">
  <div id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">過去の取引はありません。</div>
</div>


<div class="card mb-3" style="max-width: 540px;">
<a class="page-link" href="{{ route('transaction.show', ['id' => 1]) }}">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">呪術廻戦1巻</h5>
        <p class="card-text">¥350</p>
        <p class="card-text">ほぼ新品</p>
        <p class="card-text"><small class="text-muted">2019年11月17日 15:06</small></p>
      </div>
    </div>
  </div></a>
</div>


<div class="card mb-3" style="max-width: 540px;">
<a class="page-link" href="{{ route('book.show', ['id' => 2]) }}">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">るるぶ沖縄ドライブ'22</h5>
        <p class="card-text">¥750</p>
        <p class="card-text">やや汚れあり</p>
        <p class="card-text"><small class="text-muted">2020年1月30日 0:43</small></p>
      </div>
    </div>
  </div></a>
</div>


<div class="card mb-3" style="max-width: 540px;">
<a class="page-link" href="{{ route('book.show', ['id' => 3]) }}">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">旺文社国語辞典</h5>
        <p class="card-text">¥1200</p>
        <p class="card-text">新品</p>
        <p class="card-text"><small class="text-muted">2020年4月8日 10:29</small></p>
      </div>
    </div>
  </div></a>
</div>


<div class="card mb-3" style="max-width: 540px;">
<a class="page-link" href="{{ route('book.show', ['id' => 4]) }}">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">リアル鬼ごっこ</h5>
        <p class="card-text">¥300</p>
        <p class="card-text">汚れ傷あり</p>
        <p class="card-text"><small class="text-muted">2021年5月3日 12:32
        </small></p>
      </div>
    </div>
  </div></a>
</div>



<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <span class="page-link"><</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <span class="page-link">2</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">></a>
    </li>
  </ul>
</nav>
