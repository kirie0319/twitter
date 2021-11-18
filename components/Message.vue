<template>
  <div>
    <div v-for="item in postLists" :key="item.id">
      <p>{{ item.name }}</p>
      <img  src="@/assets/img/heart.png" @click="like(item.id)" />
      <p>{{ item.count }}</p>
      <img src="@/assets/img/cross.png" @click="deletePost(item.id)" />
      <img src="@/assets/img/detail.png" @click="commentView(item.id)" />
      <p>{{ item.post }}</p>
    </div>
  </div>
</template>

<script>
import firebase from "~/plugins/firebase";
export default {
  props: {
    postLists: {
      type: Array
    },
    uid: {
      type: String
    }
  },
  methods: {
    async like(id) {
      firebase.auth().onAuthStateChanged(async user => {
        if (user) {
          const sendData = {
            post_id: id,
            user_id: user.uid
          };
          this.$axios.post("http://127.0.0.1:8000/api/judgeHasLike", sendData);
          this.$emit(countLikes);
        }
      });
    },
    async deletePost(id) {
      firebase.auth().onAuthStateChanged(async user => {
        if (user) {
          await this.$axios.post("http://127.0.0.1:8000/api/posting/" + id);
        }
      })
    },
    async commentView(id) {
      this.$router.push({name: 'comment-id', params: { id }})
    }
  }
};
</script>
