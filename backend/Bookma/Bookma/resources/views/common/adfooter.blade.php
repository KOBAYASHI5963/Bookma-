<footer class="footer">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2">
    <a class="navbar-brand text-white ml-4" href="{{ route('top') }}">Bookma! ʕ•ᴥ•ʔ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a href="{{ route('cart.show') }}" class="nav-item nav-link text-white">カート一覧</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('favorites') }}" class="nav-item nav-link text-white"><i class="far fa-star text-white mr-2"></i>お気に入り</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('sellerSalesBooks') }}" class="nav-item nav-link text-white"><i class="fas fa-book-open mr-2"></i>出品する</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="copyright navbar-dark bg-dark text-white justify-content-center d-flex align-items-center">
        COPYRIGHT © Bookma Inc. All rights Reserved.
  </div>
  
</footer>
