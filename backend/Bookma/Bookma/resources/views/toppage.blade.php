<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Bookma!</title>
  </head>
  <body class="bg-light"> 
    
    <header>
      <nav class="navbar navbar-light bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Bookma! ʕ•ᴥ•ʔ</a>
          <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav text-white">
              @if (Auth::check())
                <li class="dropdown-item"><a href="{{ route('users.index') }}"></a></li>
                <li class="dropdown-item"><a href="{{ route('users.show',Auth::id()) }}">マイページ</a></li>
                <li class="dropdown-item"><a href="{{ route('logout.get') }}">ログアウト</a></li>
              @else
                <li class="nav-item dropdown">
                <li class="nav-item"><a href="{{ route('signup.get')}}" class="nav-link">新規会員登録</a></li>
                <li class="nav-item"><a href="{{ route('login')}}" class="nav-link">ログイン</a></li>
              @endif
            </ul>
        </div>
      </nav>
    </header>
    
    <!--詳細-->
      <div id="column">
        <h5 class=" py-3">新しく出品された本</h5>
      </div>
      <div class="row">
        <div class="col-md-2 col-12 ">
          <img src="https://amd-pctr.c.yimg.jp/r/iwiz-amd/20210902-00000035-san-000-8-view.jpg" style="width:200px; height:50;" alt="">
        </div>
        <div class="col-md-2 col-12 ">
          <img src="https://images-na.ssl-images-amazon.com/images/I/81wKgx+I5fL.jpg"  style="width:200px; height:50;" alt="">
        </div>
        <div class="col-md-2 col-12 ">
          <img src="https://hr-engagement.jp/wp-content/uploads/2020/05/29043be388f971cef4025ecbcc5c9c57.jpg" style="width:200px; height:50;" alt="">
        </div>
        <div class="col-md-2 col-12 ">
          <img src="https://images-na.ssl-images-amazon.com/images/I/51sPGsTuF0L._SX350_BO1,204,203,200_.jpg" style="width:200px; height:50;" alt="">
        </div>
        <div class="col-md-2 col-12 ">
          <img src="https://images-na.ssl-images-amazon.com/images/I/51VPFSM57AL.jpg"  style="width:200px; height:50;" alt="">
        </div>
        <div class="col-md-2 col-12 ">
          <img src="https://images-na.ssl-images-amazon.com/images/I/71AaRkqJI8L.jpg"  style="width:200px; height:50;" alt="">
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>