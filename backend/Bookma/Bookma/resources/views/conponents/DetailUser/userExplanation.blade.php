<div class="introduce">
  <div class="row g-0">
    <div>
      @if(is_null( $user->UserProfile->profile_image ))
        <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle" style="width: 250px;">
      @else
        <img src="{{ $user->UserProfile->profile_image }}" class="rounded-circle" style="width: 250px;">
      @endif
    </div>
    <div class="mt-5 ml-5">
      <h1>{{ $user->name }}</h1>
    </div>
    <div class="mt-5 ml-5">
    @auth
      @if (Auth::id() != $user->id)
          @if (Auth::user()->is_following($user->id))
            <form class="mb-4" method="post" action="{{ route('user.unfollow', $user->id) }}">
              @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-lg">フォロー中</button>
            </form>
          @else
            <form class="mb-4" method="post" action="{{ route('user.follow', $user->id) }}">
              @csrf
                <button type="submit" class=" btn btn-primary btn-lg">フォロー</button>
            </form>
          @endif
          <a type="submit" href="{{ route('chat.room', $user->id) }}" class=" btn btn-primary btn-lg">チャットする</a>
      @endif
    @endauth
    </div>
  </div>



  <div class="row g-0">
    <div class="mt-4 ml-5">
        <p> フォロワー {{ $user->followers()->count() }}</p>
    </div>
    <div class="mt-4 ml-4">
        <p> フォロー中 {{ $user->followings()->count() }}</p>
    </div>
  </div>

  <div class="mt-4">
    <h4 class="introduce-user">{!! nl2br(e($user->UserProfile->introduce)) !!}</h4> 
  </div>
</div>


<div class="mt-5">
  <h2>{{ $user->name }}の出品本一覧</h2>
</div>

@if($books->count())
  @foreach($books as $book)
      <div class="card">
        <div class="row g-0">
          <div>
          <a href="{{ route('book.show', ['id' => $book->id]) }}" ><img src="{{ $book->BookImages[0]->book_images_url }}" class="my-3 ml-3" style="height:190px; width:290px;"></a>
          </div>
          <div>
            <div class="card-body">
              <h5 class="card-title"><a href="{{ route('book.show', ['id' => $book->id]) }}" >{{ $book->title }}</a></h5>
              <p class="card-text">{{ $book->price }}円</p>
              <div>
              <p class="card-text"><small class="text-muted">出品日時：{{ $book->created_at }}</small></p>
            </div>
          </div>
        </div>
      </div>
  @endforeach
{{ $books->links() }}
@else
  <div class="mt-5">
    <h5>※現在出品されている本はありません。</h5>
  </div>
@endif


@push('css')

<link rel="stylesheet" href="{{ asset('css/userExplanation.css') }}">

@endpush