@if (Auth::id() != $to_user_id)
  <div class="messageInputForm">
    <form method="post" action="{{ route('chat.store' ,$to_user_id) }}">
      @csrf
      <div class="mb-2">
        <h3>{{ $to_user }}とのチャット</h3>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="メッセージを入力して下さい" name="message">
      </div>
        <button type="submit" class="btn btn-primary">メッセージ送信</button>
    </form>
  </div>
@endif

<div class="mt-5">
  @if($chat_messages)
    <div class="messagesArea messages">
        @foreach($chat_messages as $message)
        <div class="card mt-2">
            <div class="row g-0">
            <a href="{{ route('user.show', ['id' => $message->User->id]) }}">
              @if(is_null( $message->User->UserProfile->profile_image ))
              <img src="https://photo-chips.com/user_data/00002805.jpg" class="rounded-circle mt-1 ml-4" style="width: 100px;">
              @else
              <img src="{{ $message->User->UserProfile->profile_image }}" class="rounded-circle mt-1 ml-4" style="width: 100px;">
              @endif
              </a>
              <a href="{{ route('user.show', ['id' => $message->User->id]) }}">
                <div class="mt-2 ml-3"><h4>{{ $message->User->name }}</h4></div>
              </a>
              <div class="ml-2 message-created-at"><span>{{ $message->created_at->format('m/d H:i') }}</span></div>
              <form action="{{ route('chat.destroy', ['id' => $message->id]) }}" method="post" id="delete_{{ $message->id }}">
          @method('DELETE')
          @csrf
            <input type="hidden" name="matching_user_id" value="{{ $to_user_id }}">
            <button class="btn btn-danger" type="button" onclick="deletePost(this);" data-id="{{ $message->id }}">削除</button>
          </form>
            </div>
            
            <div class="mt-3 ml-5">
              <h5>{{$message->message}}</h5>
            </div>
        </div>
        @endforeach
    </div>
  @else
    <div class="mt-5">
      <h5>※ メッセージはありません。</h5>
    </div>
  @endif
</div>

<script>
function deletePost(e) {
  if (confirm('本当に削除していいですか?')) {
  document.getElementById('delete_' + e.dataset.id).submit();
  }
}
</script>

@push('css')

<link rel="stylesheet" href="{{ asset('css/room.css') }}">

@endpush