<!doctype html>
<html lang="ja">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

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
      <form>
        <div class="input-group input-group-sm">
          <input type="text" class="form-control" placeholder="キーワードを検索">
          <div class="input-group-btn">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </nav>
  </header>


<div class="example">
    <img src="https://t4.ftcdn.net/jpg/02/57/62/15/240_F_257621504_iTEdInhbLzmfLWVvHtXI5GCC80yocQtB.jpg" class="d-block w-100" alt="">
    <div>
      <h1>BOOKマーケットで</h1>
      <h1>気軽に出品できる</h1>
      <h1>あなたのほしい本が見つかる</h1>
    </div>
</div>

<style>
.example{
    position: relative;
}
.example img{
    width: 100%;
    height: auto;
}
.example div{
    position: absolute;
    left: 20%;
    top: 40%;
    /*コレ*/transform: translate(-50%,-50%);
    color: #EEEEEE;
    font-size: 200%;
    font-weight: bold;
}
</style>

 
  <!--詳細-->
  <div class="new-book">
      <div id="column">
        <h5 class=" py-3">新しく出品された本</h5>
      </div>

      <div class="row">
        <div class="col-md-2 col-12 ">
          <img  src="https://images-na.ssl-images-amazon.com/images/I/61iQ1gOJ7kL._SX316_BO1,204,203,200_.jpg" style="width:200px; height:50;" alt="">
        </div>

        <div class="col-md-2 col-12 ">
          <img src="https://images-na.ssl-images-amazon.com/images/I/81wKgx+I5fL.jpg" style="width:200px; height:50;" alt="">
        </div>

        <div class="col-md-2 col-12 ">
          <img src="https://hr-engagement.jp/wp-content/uploads/2020/05/29043be388f971cef4025ecbcc5c9c57.jpg" style="width:200px; height:50;" alt="">
        </div>

        <div class="col-md-2 col-12 ">
          <img src="https://images-na.ssl-images-amazon.com/images/I/51sPGsTuF0L._SX350_BO1,204,203,200_.jpg" style="width:200px; height:50;" alt="">
        </div>

        <div class="col-md-2 col-12 ">
          <img src="https://images-na.ssl-images-amazon.com/images/I/51VPFSM57AL.jpg" style="width:200px; height:50;" alt="">
        </div>

        <div class="col-md-2 col-12 ">
          <img src="https://images-na.ssl-images-amazon.com/images/I/71AaRkqJI8L.jpg" style="width:200px; height:50;" alt="">
        </div>

      </div>
      </div>

      <div id="column">
        <h5 class=" py-3">出品一覧</h5>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ジャンル
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">漫画</a></li>
                <li><a class="dropdown-item" href="#">小説</a></li>
                <li><a class="dropdown-item" href="#">ビジネス本</a></li>
              </ul>
      </div>

      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>

<ul class="nav flex-column">
  <ol class="breadcrumb">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>

  

    <div class="container">

      <div class="content-top-title">
        <h1>人生にもっと本を。</h1>
      </div>
      
      <div class="mt-5 explanation">
        <div class="card-deck row">
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">検索する</h4>
                <p class="card-text">検索ボックスにて、「ジャンル」、「著者」、「出版社」などから選び、または気になるワードで自由に検索してみてください。</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">購入</h4>
                <p class="card-text">本詳細画面から、好きな本を購入できます。まずは会員登録し、気になる本をお気に入り登録するなど、自身のタイミングで購入しましょう。</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">リクエスト</h4>
                <p class="card-text">自身が欲しい本をリクエストすることができます。出品者の方は気になるリクエストがあればその方にメッセージを送ってやりとりができます。</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card-deck row">
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">検索する</h4>
                <p class="card-text">検索ボックスにて、「ジャンル」、「著者」、「出版社」などから選び、または気になるワードで自由に検索してみてください。</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">購入</h4>
                <p class="card-text">本詳細画面から、好きな本を購入できます。まずは会員登録し、気になる本をお気に入り登録するなど、自身のタイミングで購入しましょう。</p>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">リクエスト</h4>
                <p class="card-text">自身が欲しい本をリクエストすることができます。出品者の方は気になるリクエストがあればその方にメッセージを送ってやりとりができます。</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


<script>
export default {
  data() {
    return {
    }
  },
}
</script>

<style scoped>
.new-book {
  height: auto;
  background: #F6F6F4;
}
.content-top-title {
  text-align: center;
  margin-top: 60px;
}
.content-top-title h1{
  font-weight: bold;
  color: #566985;
}
.card .card-title{
  font-weight: bold;
  text-align: center;
}
.explanation {
  margin-bottom: 120px;
}
</style>



  
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

<footer>

<div class="footer py-2">
  <p class="text-white">by kobayashi.</p>
</div>

<style scoped>
.footer {
  background-color: #25324F;
  text-align: center;
}
</style>

</footer>

</html>

