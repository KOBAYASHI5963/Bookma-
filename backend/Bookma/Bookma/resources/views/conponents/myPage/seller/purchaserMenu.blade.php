<div class="mypage-menu-left">
    <div class="user_image d-flex justify-content-center mb-3">
      @if(is_null( Auth::user()->UserProfile->profile_image ))
      <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle">
      @else
      <img src="{{ Auth::user()->UserProfile->profile_image }}" class="rounded-circle">
      @endif
    </div>
</div>

<div class="card my-3">
    <ul class="list-group list-group-flush accout_setting">
      <a class="pointer" href="{{ route('sellerbooks') }}"><li class="list-group-item">出品本</li></a>
      <a class="pointer" href="{{ route('sellerTransferAccountSetting') }}"><li class="list-group-item">振込口座設定</li></a>
      <a class="pointer" href="{{ route('sellerSalesHistory') }}"><li class="list-group-item">売上履歴</li></a>
      <a class="pointer" href="{{ route('sellerTransferApplicationHistory') }}"><li class="list-group-item">振込申請履歴</li></a>
      <a class="pointer" href="{{ route('sellerTransferApplication') }}"><li class="list-group-item">振込申請</li></a>
      <a class="pointer" href="{{ route('sellerCommission') }}"><li class="list-group-item">手数料等について</li></a>
      <a class="pointer" href="{{ route('sellerSalesBooks') }}"><li class="list-group-item">出品する</li></a>
    </ul>
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/purchaserMenu.css') }}">

@endpush