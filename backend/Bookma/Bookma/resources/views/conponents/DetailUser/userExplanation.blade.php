<div class="introduce">
  <div class="row g-0">
    <div class="col-5">
      @if(is_null( $user->UserProfile->profile_image ))
        <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle">
      @else
        <img src="{{ $user->UserProfile->profile_image }}" class="rounded-circle">
      @endif
    </div>
    <div class="col-3 d-flex align-items-center justify-content-strat follwer_name_black">
      <h1 class="user_name">{{ $user->name }}</h1>
    </div>
    <div class="col-4 d-flex align-items-center justify-content-end">
    @auth
      @if (Auth::id() != $user->id)
        @if (Auth::user()->is_following($user->id))
          <form class="mb-2" method="post" action="{{ route('user.unfollow', $user->id) }}">
            @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger btn">フォロー中</button>
          </form>
        @else
          <form class="mb-2" method="post" action="{{ route('user.follow', $user->id) }}">
            @csrf
              <button type="submit" class=" btn btn-primary btn">フォロー</button>
          </form>
        @endif
      @endif
    @endauth
    </div>
  </div>


  <div class="row g-0">

    <div class="col-3 col-sm-3">
        <p class="count"> フォロワー {{ $user->followers()->count() }}</p>
    </div>
    <div class="col-4 col-sm-4">
        <p class="count"> フォロー中 {{ $user->followings()->count() }}</p>
    </div>
    @auth
    @if (Auth::id() != $user->id)
    <div class="col-5 col-sm-5 mt-2">
      <a type="submit" href="{{ route('chat.room', $user->id) }}" class="btn btn-primary btn">チャットする</a>
     </div>
     @endif
     @endauth
  </div>

  <div class="mt-4">
    <h4 class="introduce-user">{!! nl2br(e($user->UserProfile->introduce)) !!}</h4> 
  </div>
</div>


<div class="mt-5">
  <h2 class="book-list">{{ $user->name }}の出品本一覧</h2>
</div>

@if($books->count())
  @foreach($books as $book)
      <div class="card">
        <div class="row g-0">
          <div>
          <a href="{{ route('book.show', ['id' => $book->id]) }}" ><img src="{{ $book->BookImages[0]->book_images_url }}" class="book_images my-3 ml-3"></a>
          </div>
          <div>
            <div class="card-body">
              <h5 class="card-title"><a class="books-title" href="{{ route('book.show', ['id' => $book->id]) }}" >{{ $book->title }}</a></h5>
              <p class="card-price">{{ $book->price }}円</p>
              <div>
              <p class="card-text"><small class="text-muted">出品日時：{{ $book->created_at }}</small></p>
            </div>
          </div>
        </div>
      </div>
  @endforeach
{{ $books->links() }}
@else
  <div class="notSellBook mt-5">
    <h5>※現在出品されている本はありません。</h5>
  </div>
@endif


@push('css')

<link rel="stylesheet" href="{{ asset('css/userExplanation.css') }}">

@endpush