<div class="mypage-menu-left">
    <div class="user_image d-flex justify-content-center mb-3">
      @if(is_null( Auth::user()->UserProfile->profile_image ))
      <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle" style="width: 250px;">
      @else
      <img src="{{ Auth::user()->UserProfile->profile_image }}" class="rounded-circle" style="width: 250px;">
      @endif
    </div>
</div>

<div class="card my-3">
    <ul class="list-group list-group-flush accout_setting">
      <a href="{{ route('profileEdit') }}"><li class="list-group-item">プロフィール編集</li></a>
      <a href="{{ route('purchaseHistory_transaction') }}"><li class="list-group-item">購入履歴</li></a>
      <a href="{{ route('favorites') }}"><li class="list-group-item">お気に入り一覧</li></a>
      <a href="{{ route('followList') }}"><li class="list-group-item">フォローリスト</li></a>
      <a href="{{ route('messagesList') }}"><li class="list-group-item">メッセージ</li></a>
    </ul>
</div>
