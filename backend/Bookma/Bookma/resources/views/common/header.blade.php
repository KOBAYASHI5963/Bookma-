<header class="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
  <a class="navbar-brand text-white ml-4" href="{{ route('top') }}">Bookma! ʕ•ᴥ•ʔ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    @if (Auth::check())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-alt text-white"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('myPage',Auth::id()) }}">マイページ</a>
          <a class="dropdown-item" href="{{ route('logout.get') }}">ログアウト</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-item nav-link text-white"><i class="far fa-star text-white mr-2"></i>お気に入り</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-item nav-link text-white"><i class="fas fa-book-open mr-2"></i>出品する</a>
      </li>
    @else
      <li class="nav-item"><a href="{{ route('signup.get')}}" class="btn btn-danger btn-sm" tabindex="-1" role="button" aria-pressed="true">新規会員登録</a></li>
      <li class="nav-item ml-2"><a href="{{ route('login')}}" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-pressed="true">ログイン</a></li>
    @endif
    </ul>
  </div>
</nav>

</header>