<div class="mb-3">
  <h3>フォローリスト</h3>
</div>

@if($followers->count())
  @foreach($followers as $follower)
  <a href="{{ route('user.show', ['id' => $follower->id]) }}">
    <div class="card">
    <div class="row g-0">
        <div>
          @if(is_null( $follower->UserProfile->profile_image ))
            <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle ml-3" style="width: 220px;">
          @else
            <img src="{{ $follower->UserProfile->profile_image }}" class="rounded-circle ml-3" style="width: 220px;">
          @endif
        </div>
        <div class="mt-5 ml-5">
          <h2>{{ $follower->name }}</h2>
        </div>
        <div class="mt-5 ml-5">
                <form class="mb-4" method="post" action="{{ route('user.unfollow', $follower->id) }}">
                  @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-lg">フォロー解除</button>
                </form>
        </div>
    </div>
  </a>
  @endforeach
{{ $followers->links() }}
@else
  <div class="mt-5">
    <h5>※現在フォローしているユーザーはいません。</h5>
  </div>
@endif