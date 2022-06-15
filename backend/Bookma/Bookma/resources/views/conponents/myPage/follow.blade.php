<div class="mb-3">
  <h3>フォローリスト</h3>
</div>

<div class="follow">
  @if($followers->count())
    @foreach($followers as $follower)
    <div class="card mt-3 mb-3">
      <div class="follow_list row g-0">
        <a href="{{ route('user.show', ['id' => $follower->id]) }}">
          @if(is_null( $follower->UserProfile->profile_image ))
            <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle ml-3">
          @else
          <div class="follow_image">
            <img src="{{ $follower->UserProfile->profile_image }}" class="rounded-circle ml-3">
          </div>
          @endif
        </a>
        <a href="{{ route('user.show', ['id' => $follower->id]) }}">
          <div class="mt-5 ml-5">
            <h2>{{ $follower->name }}</h2>
          </div>
        </a>
          <div class="mt-5 ml-5">
            <form class="mb-4" method="post" action="{{ route('user.unfollow', $follower->id) }}">
            @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger btn">フォロー解除</button>
            </form>
          </div>
      </div>
    </div>
    @endforeach
  {{ $followers->links() }}
  @else
    <div class="mt-5">
      <h5>※現在フォローしているユーザーはいません。</h5>
    </div>
  @endif
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/follow.css') }}">

@endpush