<div class="genre">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">ジャンル一覧</li>
    </ol>
  </nav>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      @foreach ($categories as $category)
        <li class="breadcrumb-item"><a href="{{ route('searchFunction',['category_id'=> $category->id]) }}">{{$category->name}}</a></li>
      @endforeach
    </ol>
  </nav>
</div>


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


@push('css')

<link rel="stylesheet" href="{{ asset('css/genreSarch.css') }}">

@endpush