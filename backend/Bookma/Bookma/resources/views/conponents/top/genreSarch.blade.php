<div class="genre">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">ジャンル一覧</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'1']) }}">小説・文学</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'2']) }}">経済・ビジネス</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'3']) }}">漫画・コミック</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'4']) }}">ライトノベル</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'5']) }}">暮らし・実用</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'6']) }}">雑誌</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'7']) }}">文庫</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'8']) }}">エッセイ・自伝・ノンフィクション</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'9']) }}">歴史・地理・民俗</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'10']) }}">新書・選書・ブックレット</a></li>
  </ol>

  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'11']) }}">言語・語学・辞典</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'12']) }}">コンピュータ・IT・情報科学</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'13']) }}">自然科学・環境</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'14']) }}">技術・工学・農学</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'15']) }}">医学</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'16']) }}">社会・時事・政治・行政</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'17']) }}">哲学・思想・宗教・心理</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'18']) }}">法学・法律</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'19']) }}">資格・検定・就職</a></li>
  </ol>

  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'20']) }}">教育・学習参考書</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'21']) }}">趣味・ホビー</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'22']) }}">旅行・地図</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'23']) }}">エンタメ・テレビ・タレント</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'24']) }}">芸術・アート</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'25']) }}">ゲーム・アニメ・サブカルチャー</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'26']) }}">スポーツ</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'27']) }}">児童書・絵本</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'28']) }}">写真集</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'29']) }}">ラブロマンス</a></li>
  </ol>

  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'30']) }}">BL（ボーイズラブ）</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'31']) }}">TL（ティーンズラブ）</a></li>
    <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=>'32']) }}">オーディオブック</a></li>
  </ol>

</nav>

</div>

<style>

.genre {
  margin-top:100px;
}
</style>

<div class="search py-2">
  <form class="d-flex" method="GET" action="{{ route('searchFunction') }}">
    <div class="input-group input-group-sm">
      <input class="form-control me-2" id="keyword" name="keyword" type="text" placeholder="キーワードを検索" aria-label="Search">
      <div class="input-group-btn">
        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </form>
</div>

  <style scoped>
  .search {
    background-color: #25324F;
    text-align: center;
  }
  </style>
