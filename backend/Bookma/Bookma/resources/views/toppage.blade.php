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
          <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Myページ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white " href="#">My本棚</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">ほしい本</a>
              </li>
            </ul>
            <form>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="キーワードを検索">
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                   </div>
              </div>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <!--スライドショー-->
    <div class="keyvisual"> 
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://img2.finalfantasyxiv.com/accimg2/00/48/0048be4c4298913db22486822bdb22230bf853cb.jpg" class="d-block " style="width:100%"  alt="...">
                <div class="carousel-caption d-none d-md-block">
                      <h class="display-4">欲しい本がきっと見つかる！</h>
                    <p class="display-4">さあ、探してみよう！</p>
                </div>
            </div>
            
            <div class="carousel-item">
              <img src="https://lh3.googleusercontent.com/proxy/2OnAQhe6GkEtKN_eTl1mLM32LcoCTwq-XjTOdhmw-YmT1_O6VetIJOWP_2B7eMiPRBG5trqhZsGE2L9WCdDfoU9rUI-esAVCO1vZ5dldrmatDQ" class="d-block" style="width:100%" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h class="display-6">あっ！</h>
                    <p class="display-6">これだ！</p>
                </div>
            </div>

            <div class="carousel-item">
              <img src="http://livedoor.blogimg.jp/momovie2/imgs/5/3/5367bd17.jpg" class="d-block " style="width:100%" alt="...">
                <div class="carousel-caption d-none d-md-block ">
                <h class="display-3 text-dark">今すぐ購入だ！</h>
                <p class="display-4 text-dark">出品もしてみよう！</p>
                </div>
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
    </div>

    <div class="container bg-whte py-5 my-5">
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