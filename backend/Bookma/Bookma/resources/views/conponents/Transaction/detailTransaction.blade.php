<div>
  <h3>取引決済完了</h3>
</div>

<div class="mt-3">
  <h5>取引が完了しました。</h>
  <h6>この度はブックマのご利用ありがとうございました。</h>
</div>

<div class="mt-3">
  <a href="{{ route('top') }}" >トップにもどる</a>
</div>

<div class="mt-5">
  <h3>出品者情報</h3>
</div>

<div class="mb-3" >
<a href="{{ route('user.show', ['id' => $book->User->id]) }}">
  <div class="row g-0">
    <div class="">
      @if(is_null( $book->User->UserProfile->profile_image ))
      <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle" style="width: 250px;">
      @else
      <img src="{{ $book->User->UserProfile->profile_image }}" class="rounded-circle" style="width: 250px;">
      @endif
    </div>
    <div class="">
      <div class="card-body">
        <h5 class="card-title">{{ $book->User->name }}</h5>
      </div>
    </div>
  </div>
  </a>
</div>