<template>
<div>
  <SideNavi @click="countLikes" />
    <div>
      <p>コメント</p>
      <div>
        <p>{{ postLists.name }}</p>
        <img  src="@/assets/img/heart.png" @click="like(item.id)" />
        <p>{{ postLists.count }}</p>
        <img src="@/assets/img/cross.png" @click="deletePost(item.id)" />
        <p>{{ postLists.post }}</p>
      </div>
      <p>シェア</p>
      <textarea name="comment" v-model="comment"></textarea>
      <button @click="postComment(postLists.id, postLists.user_id)">コメントする</button>
        <div v-for="item in commentLists" :key="item.id">
        <p>{{ item.name }}</p>
        <p>{{ item.comment }}</p>
      </div>
    </div>
</div>
</template>

<script>
import firebase from "~/plugins/firebase";
export default {
  data() {
    return {
      postLists: [],
      uid: null,
      commentLists: [],
      comment: null
    };
  },
  methods: {
    async getCommentData() {
      const sendData = {
        id: this.$route.params.id
      };
      const resData = await this.$axios.post(
        "http://127.0.0.1:8000/api/commentPost/", sendData
      );
      this.postLists = resData.data.post;
    },
    async getComment() {
      const resData = await this.$axios.get(
        "http://127.0.0.1:8000/api/showComment/");
      console.log(resData.data);
      this.commentLists = resData.data.comments;
    },
    async postComment(id, user) {
      const sendData = {
        post_id: id,
        user_id: user,
        comment: this.comment
      }
      console.log(sendData);
      const resData = await this.$axios.post("http://127.0.0.1:8000/api/createComment/", sendData);
      console.log(resData.data);
    }
  },
  created() {
    this.getCommentData();
    this.getComment();
  }
};
</script>