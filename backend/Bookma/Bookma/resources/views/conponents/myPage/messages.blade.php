<div class="mb-3">
  <h3>メッセージ一覧</h3>
</div>


@foreach($chat_users as $chat_user)
  <div class="card mt-3">
    <div class="row g-0">
      <a href="{{ route('user.show', ['id' => $chat_user->User->id]) }}">
      @if(is_null( $chat_user->user->UserProfile->profile_image ))
      <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle mt-1 ml-4" style="width: 100px;">
      @else
      <img src="{{ $chat_user->User->UserProfile->profile_image }}" class="rounded-circle mt-1 ml-4" style="width: 100px;">
      @endif
      </a>
      <a href="{{ route('user.show', ['id' => $chat_user->User->id]) }}">
        <div class="mt-2 ml-3"><h4>{{ $chat_user->user->name }}</h4></div>
      </a>
    </div>
    <a type="submit" href="{{ route('chat.room', $chat_user->User->id) }}" class=" btn btn-primary btn-lg">チャットする</a>
  </div>
@endforeach
