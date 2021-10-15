<template>
  <div class="container mt-5">

    <!-- ローディング中 -->
    <div class="mt-5" v-if="loading">
      <Loader />
    </div>


        <div class="profile" v-if="!loading">
          <div class="profile_title">
              <h2>{{ userInformation.user.name }}さんのプロフィール</h2>
          </div>

          <!-- 自己紹介 -->
          <div class="card mt-5">
            <div class="card-header hh">
              自己紹介
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item" v-html="userInformation.user_information.introduce" style="white-space: pre-wrap; word-wrap:break-word; line-height:1.7"></li>
            </ul>
          </div>

          <!-- 使用機材 -->
          <div class="card mt-2">
            <div class="card-header hh">
              使用機材
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"  v-html="userInformation.user_information.instrument" style="white-space: pre-wrap; word-wrap:break-word; line-height:1.7"></li>
            </ul>
          </div>

        </div>



  </div>
</template>

<script>
export default {
  data() {
    return {
      userInformation: {},
      loading: false,
    }
  },
  methods: {
    async getUserData() {
      try{
        this.loading = true
        await this.$store.dispatch('auth/getUserInformation')
        // api通信でとってきたデータを代入
        this.userInformation = this.$store.state.auth.user
      }
      catch(e){
        console.log(e);
      }
      finally{
        this.loading = false
      }
    }
  },
  created() {
    Promise.all([
      this.getUserData(),
    ])
  },
}
</script>

<style scoped>
.profile_title h2 {
  color: #34495e;
  font-weight: bold;
}
.more {
  text-align: center;
}
.more .btn{
  color: white;
  font-weight: bold;
  padding: 12px 40px;
  border-radius: 20px;
}
.audio_title:hover {
  cursor: pointer;
  text-decoration: underline;
}
.user_image img {
  height: 160px;
}
.user_name h3 {
  text-align: center;
}
.hh {
  background-color: #D9F0FE;
  color: #34495e;
  font-weight: bold;
}
@media screen and (max-width:767px) {
    /*画面サイズが767px以下の場合読み込む（スマホ）*/
    .button button {
      font-size: 14px;
    }
}
@media screen and (min-width:768px){
    /*画面サイズが768px以上の場合読み込む（PC）*/
}
</style>