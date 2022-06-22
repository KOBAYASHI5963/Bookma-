<div class="mb-3">
  <h3 class="follow_list">フォローリスト</h3>
</div>

<div class="follow">
  @if($followers->count())
    @foreach($followers as $follower)
    <div class="card mt-3 mb-3">
      <div class="follow_list row">

          <div class="col-4 col-sm-2">
            <a href="{{ route('user.show', ['id' => $follower->id]) }}">
              @if(is_null( $follower->UserProfile->profile_image ))
                <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle profile_image ml-1 my-1">
              @else
              <div class="follow_image">
                <img src="{{ $follower->UserProfile->profile_image }}" class="rounded-circle profile_image ml-1 my-1">
              </div>
              @endif
            </a>
          </div>

          <div class="col-4 col-sm-5 d-flex align-items-center justify-content-strat follwer_name_black">
            <a href="{{ route('user.show', ['id' => $follower->id]) }}">
              <div>
                <h2 class="follower_name">{{ $follower->name }}</h2>
              </div>
            </a>
          </div>

          <div class="col-4 col-sm-5 d-flex align-items-center justify-content-end">
            <form class="mr-2" method="post" action="{{ route('user.unfollow', $follower->id) }}">
            @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger btn follow_delete">フォロー解除</button>
            </form>
          </div>

      </div>
    </div>
    @endforeach
  {{ $followers->links() }}
  @else
    <div class="mt-4">
      <h5 class="notFollower">※現在フォローしているユーザーはいません。</h5>
    </div>
  @endif
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/follow.css') }}">

@endpush