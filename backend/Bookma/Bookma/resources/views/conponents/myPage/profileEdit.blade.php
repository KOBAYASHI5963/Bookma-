<div class="profileEdit mb-3">
  <h5 class="form-label">プロフィール編集</h5>

  <h3 class="font">基本情報</h3>

  <form method="POST" action="{{ route('profileEditStore') }}" enctype="multipart/form-data">
   {{ csrf_field() }}
    <h5 class="form-label">ニックネーム</h5>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}" name="name">
    <p class="limit">※20文字以内</p>
    @if($errors->has('name'))
    <div class="alert alert-success" role="alert">
        {{ $errors->first('name') }}
    </div>
    @endif


    <div class="form-group">
      <h5 class="form-label">自己紹介</h5>
      <textarea class="form-control" name='introduce' id="exampleFormControlTextarea1" rows="3">{{$userProfile->introduce}}</textarea>
      <p class="limit">※1000文字以内</p>
      @if($errors->has('introduce'))
      <div class="alert alert-success" role="alert">
          {{ $errors->first('introduce') }}
      </div>
      @endif
    </div>
   

    <h3 class="font">プロフィールアイコン</h3>
    <div class="mypage-profileEdit-left">
      <div class="user_profile_image mb-3">
        @if(isset( $userProfile->profile_image ))
        <img src="{{$userProfile->profile_image}}" class="rounded-circle">
        @else
        <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle">
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
    <div class="text-center mx-auto">
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

@push('css')

<link rel="stylesheet" href="{{ asset('css/profileEdit.css') }}">

@endpush