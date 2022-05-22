<div class="messageInputForm">
  <form method="post" action="{{ route('chat.store' ,$to_user_id) }}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">メッセージ</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="メッセージを入力して下さい" name="message">
    </div>
      <button type="submit" class="btn btn-primary">メッセージ送信</button>
  </form>
</div>

@if($chat_messages)
  <div class="messagesArea messages">
      @foreach($chat_messages as $message)
        <div>
          {{$message->message}}
        </div>
      @endforeach
  </div>
@else
  <div class="mt-5">
    <h5>※ メッセージはありません。</h5>
  </div>
@endif