<div class="mypage-menu-left">
  <div class="mypage-menu">
      <div class="user_image mb-3">
        @if(is_null( Auth::user()->UserProfile->profile_image ))
        <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle">
        @else
        <img src="{{ Auth::user()->UserProfile->profile_image }}" class="rounded-circle">
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
        <a href="{{ route('shippingAddressList') }}"><li class="list-group-item">お届け先住所設定</li></a>
      </ul>
  </div>
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/purchaserMenu.css') }}">

@endpush