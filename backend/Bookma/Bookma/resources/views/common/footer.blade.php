<footer id="footer" class="footer outer-block">
  <div class="inner-block">
          <div class="wrap">
            <div class="logo">
              <a href="{{ route('top') }}">Bookma! ʕ•ᴥ•ʔ</a>
            </div>
            <div class="cont">
                <div class="c-btn">
                  <a href="{{ route('sellerSalesBooks') }}">出品する</a>
                </div>
                <ul class="nav">
                  <li><a href="#">会員登録</a></li>
                  <li><a href="#">カートを見る</a></li>
                  <li><a href="{{ route('favorites') }}">お気に入り</a></li>
                  <li><a href="#">My本棚</a></li>
                </ul>
            </div>
          </div>
  </div><!-- /inner-block -->
      <div class="copyright">
        COPYRIGHT © Bookma Inc. All rights Reserved.
      </div>
</footer>



    <style scoped>
  
#footer {
  background: #222;
}
 
#footer .logo a {
  display: inline-block;
  width: 120px;
  color: #ffffff
}
 
#footer .nav li a {
  padding: 15px;
  color: #ffffff
}
 
#footer .c-btn {
  margin-left: 25px;
}
 
  #footer .wrap {
    padding: 20px 0;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
 
  #footer .cont {
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
  }
 
  #footer .nav {
    display: inline-block;
  }
 
  #footer .nav li {
    display: inline-block;
  }
 
  #footer .nav li a:hover {
    color: #ca353b;
  }

  #footer .copyright {
    color: #ffffff;
    text-align: center
    
  }

  </style>
