<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">プロフィール編集</label>

  <h3>基本情報</h3>

  <form method="POST" action="{{ route('profileEditStore') }}" enctype="multipart/form-data">
   {{ csrf_field() }}
    <label for="exampleInputEmail1" class="form-label">ニックネーム</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}" name="name">
    <p>※20文字以内</p>
    @if($errors->has('name'))
    <div class="alert alert-success" role="alert">
        {{ $errors->first('name') }}
    </div>
    @endif


    <label for="exampleInputEmail1" class="form-label">自己紹介</label>
    <p>
      <textarea cols="100" rows="10" name='introduce'>{{$userProfile->introduce}}</textarea>
    </p>
    <p>※1000文字以内</p>
    @if($errors->has('introduce'))
    <div class="alert alert-success" role="alert">
        {{ $errors->first('introduce') }}
    </div>
    @endif

    <h3>プロフィールアイコン</h3>
    <div class="mypage-profileEdit-left">
      <div class="user_image mb-3">
        @if(isset( $userProfile->profile_image ))
        <img src="{{$userProfile->profile_image}}" class="rounded-circle" style="width: 250px;">
        @else
        <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle" style="width: 250px;">
        @endif
      </div>
    </div>


    <input id="file-sample" type="file" name="profile_image">
    <img id="file-preview" class="my-4">
    @if($errors->has('profile_image'))
    <div class="alert alert-success" role="alert">
        {{ $errors->first('profile_image') }}
    </div>
    @endif
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