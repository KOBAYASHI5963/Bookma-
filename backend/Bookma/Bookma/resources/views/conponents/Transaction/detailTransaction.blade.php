<div>
  <h3 class="font">取引決済完了</h3>
</div>

<div class="mt-3">
  <h5 class="complete">取引が完了しました。</h>
  <h6 class="thanks">この度はブックマのご利用ありがとうございました。</h>
</div>

<div class="mt-3">
  <a class="top" href="{{ route('top') }}" >トップにもどる</a>
</div>

<div class="mt-5">
  <h3 class="font">出品者情報</h3>
</div>

<div class="mb-3" >
<a href="{{ route('user.show', ['id' => $book->User->id]) }}">
  <div class="row g-0">
    <div class="">
      @if(is_null( $book->User->UserProfile->profile_image ))
      <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle">
      @else
      <img src="{{ $book->User->UserProfile->profile_image }}" class="rounded-circle">
      @endif
    </div>
    <div class="">
      <div class="card-body">
        <h5 class="card-name">{{ $book->User->name }}</h5>
      </div>
    </div>
  </div>
  </a>
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/detailTransaction.css') }}">

@endpush