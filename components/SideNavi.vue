<template>
  <div>
    <img src="@/assets/img/logo.png" />
    <div>
      <img src="@/assets/img/home.png" />
      <p>ホーム</p>
    </div>
    <div>
      <img src="@/assets/img/logout.png" />
      <p @click="logout">ログアウト</p>
    </div>
    <p>シェア</p>
    <textarea name="post" v-model="post"></textarea>
    <button @click="share">シェアする</button>
  </div>
</template>

<script>
import firebase from "~/plugins/firebase";
export default {
  data() {
    return {
      post: null,
      uid: null
    };
  },
  methods: {
    logout() {
      firebase
        .auth()
        .signOut()
        .then(() => {
          alert("ログアウトが完了しました");
          this.$router.replace("login");
        });
    },
    async share() {
      firebase.auth().onAuthStateChanged(user => {
        if (user) {
          console.log(this.post.id);
          const sendData = {
            post: this.post,
            user_id: user.uid
          };
          this.$axios.post("http://127.0.0.1:8000/api/post", sendData);
          this.$emit("getPostData");
        }
      });
    }
  }
};
</script>
