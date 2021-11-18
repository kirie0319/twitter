<template>
  <div>
    <SideNavi @click="countLikes" />
    <div>
      <p>ホーム</p>
      <Message :postLists="postLists" :uid="uid" />
    </div>
  </div>
</template>

<script>
import firebase from "~/plugins/firebase";
export default {
  data() {
    return {
      postLists: [],
      uid: null
    };
  },
  methods: {
    async countLikes() {
      const resData = await this.$axios.get(
        "http://127.0.0.1:8000/api/countLikes/"
      );
      this.postLists = resData.data.posts;
    }
  },
  created() {
    this.countLikes();
  }
};
</script>
