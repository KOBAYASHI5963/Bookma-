<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">プロフィール編集</label>

  <h3>基本情報</h3>

  <form method="POST" action="{{ route('profileEditStore') }}">
  @csrf

    <label for="exampleInputEmail1" class="form-label">ニックネーム</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}" name="name">
    <p class="mt-3">※20文字以内</p>


    <label for="exampleInputEmail1" class="form-label">自己紹介</label>
    <p>
      <textarea cols="100" rows="10" name='introduce'>{{$userProfile->intoroduce}}</textarea>
    </p>
    <p>※1000文字以内</p>

    <h3>プロフィールアイコン</h3>
    <div class="mypage-profileEdit-left">
      <div class="user_image mb-3">
        <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle" style="width: 250px;">
      </div>
    </div>


    <input id="file-sample" type="file">
    <img id="file-preview" class="my-4">
    <div class="d-grid col-3 mx-auto">
      <button class="btn btn-warning" type="submit">変更する</button>
    </div>
  </form>

</div>



<script>
  document.getElementById('file-sample').addEventListener('change', function(e) {
    // 1枚だけ表示する
    var file = e.target.files[0];

    // ファイルのブラウザ上でのURLを取得する
    var blobUrl = window.URL.createObjectURL(file);

    // img要素に表示
    var img = document.getElementById('file-preview');
    img.src = blobUrl;
  });
</script>