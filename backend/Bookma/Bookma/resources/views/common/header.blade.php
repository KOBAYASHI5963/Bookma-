<header class="header">
    <nav class="navbar navbar-light bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('top') }}">Bookma! ʕ•ᴥ•ʔ</a>
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav text-white">
          @if (Auth::check())
          <div class="d-flex justify-content-end">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-alt text-white"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('users.show',Auth::id()) }}">マイページ</a>
              <a class="dropdown-item" href="{{ route('logout.get') }}">ログアウト</a>
            </div>
          </li>
          <li class="nav-item"><a href="#" class="nav-item nav-link text-white" style="padding-left: 0;"><i class="far fa-star text-white mr-2"></i>お気に入り</a></li>
          <li class="nav-item"><a href="#" class="nav-item nav-link text-white"><i class="fas fa-book-open"></i>出品する</a></li>
          </div>
          @else
          <div class="d-flex justify-content-end">
            <li class="nav-item"><a href="{{ route('signup.get')}}" class="btn btn-danger btn-sm" tabindex="-1" role="button" aria-pressed="true">新規会員登録</a></li>
            <li class="nav-item"><a href="{{ route('login')}}" class="btn btn-primary btn-sm" tabindex="-1" role="button" aria-pressed="true">ログイン</a></li>
          </div>
          @endif
        </ul>
      </div>
    </nav>
</header>