<div id="chat">

  <div>
    <h5 class="chat-user">@{{ to_user.name }}とのチャット</h5>
  </div>

  <form @submit.prevent="postMessage">
    <div class="form-group">
      <textarea v-model="message" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="メッセージを入力してください"></textarea>
    </div>
    <div class="alert alert-danger" role="alert" v-if="blank_flg">
      メッセージは必須です！
    </div>
    <div class="alert alert-danger" role="alert" v-if="message_number_flg">
      文字は100文字以内で設定してください！
    </div>
    <button type="submit" class="btn btn-primary">メッセージ送信</button>
  </form>

  <div v-if="chatMessages.length !== 0">
    <div class="card my-3" v-for="(chatMessage, i) in chatMessages" :key="i">
      <div class="card-body">
        <h5 class="user">@{{ chatMessage.user.name }}</h5>
        <p class="message">@{{ chatMessage.message }}</p>
        <div class="row">
          <p class="time">@{{ chatMessage.created_at }}</p>
          <div v-if="auth_id == chatMessage.user_id">
            <button type="button" class="btn btn-danger delite-btn" @click="deleteMessage(chatMessage.id,chatMessage.user_id)">削除</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div v-else class="mt-5 notMessage">
    <h5>※ メッセージはありません。</h5>
  </div>
</div>

<script src="/js/app.js"></script>

<script>

new Vue({
    el: '#chat',
    data: {
        chatMessages: [],
        to_user: {},
        to_user_id: null,
        message:"",
        auth_id:"",
        blank_flg: false,
        message_number_flg: false
    },
    methods: {
      async getChatMessagesJson() {
        await this.getToUserId();
        await axios.get(`/ChatRoom/user/${this.to_user_id}/json`)
            .then((res) => {
              console.log(res.data);
              this.chatMessages = res.data.chat_messages;
              this.to_user = res.data.to_user;
              this.auth_id = res.data.auth_id;
            });
      },
      async deleteMessage(id,userId) {
        if (confirm('本当に削除していいですか?')) {
          await axios.delete(`/ChatRoom/user/${id}/destroy/${userId}`)
            .then((res) => {
              console.log("削除成功");
            });
        }
        this.getChatMessagesJson();
      },
      getToUserId() {
        let pathName = location.pathname;
        let pathNameArry = pathName.split("/");
        this.to_user_id = pathNameArry.pop();
      },
      async postMessage() {
        // バリデーションチェック
        this.isBlank();
        this.isMessageNumberOver();
        if(this.blank_flg || this.message_number_flg) {
          return
        }

        await axios.post(`/ChatRoom/user/${this.to_user_id}/store`,{
                message : this.message
            })
            .then((res) => {
              console.log("送信成功");
              this.message = "";
              this.blank_flg = false;
              this.message_number_flg = false;
              this.getChatMessagesJson();
            });
      },
      isBlank() {
        if(this.message.length == 0) {
          this.blank_flg = true
        }
      },
      isMessageNumberOver() {
        if(this.message.length > 100) {
          this.message_number_flg = true
        }
      }
    },
    created() {
    this.getChatMessagesJson();
     Echo.channel('ChatRoomChannel')
        .listen('ChatPusher', (e) => {
          console.log('received a message');
          console.log(e);
          this.getChatMessagesJson();
        });
     },
});

</script>

@push('css')

<link rel="stylesheet" href="{{ asset('css/room.css') }}">

@endpush