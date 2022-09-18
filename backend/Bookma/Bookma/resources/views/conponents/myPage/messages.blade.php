<div class="mb-3">
  <h3 class="font">メッセージ一覧</h3>
</div>

<div class="messages">
  @if($chat_users->count())
    @foreach($chat_users as $chat_user)
      <div class="row g-0">
        <a href="{{ route('user.show', ['id' => $chat_user->User->id]) }}">
        @if(is_null( $chat_user->user->UserProfile->profile_image ))
        <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle mt-1 ml-4">
        @else
        <img src="{{ $chat_user->User->UserProfile->profile_image }}" class="rounded-circle mt-1 ml-4">
        @endif
        </a>
        <a href="{{ route('user.show', ['id' => $chat_user->User->id]) }}">
          <div class="user"><h4>{{ $chat_user->user->name }}</h4></div>
        </a>
        <div>
          <a type="submit" href="{{ route('chat.room', $chat_user->User->id) }}" class=" btn btn-primary chat">チャットする</a>
        </div>
      </div>
      <script>
        var user_id = "{{ $chat_user->user->name }}";
        var current_user_name = "{{ $chat_user->user->name }}";
      </script>
    @endforeach
  @else
    <div class="mt-4">
      <h5 class="notMessage">※メッセージはありません。</h5>
    </div>
  @endif
</div>

@push('css')

<link rel="stylesheet" href="{{ asset('css/messages.css') }}">

@endpush


