<template>
  <div class="container">
    <h1 class="text-center mt-5">Buy what you need, sell what you don't need!</h1>
    <div class="row">
      <div class="card mt-5 ml-4" style="width: 18rem;" v-for="post in posts" :key="post.id">
        <img class="card-img-top" :src="post.image" alt="Card image cap" />
        <div class="card-body">
          <h4>{{ post.title }}</h4>
          <p>{{ post.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: [{ title: "", description: "", image: "" }]
    };
  },

  created() {
    this.axios.get("/api/images", { image: this.image }).then(response => {
      this.posts = response.data;
    });
  }
};
</script>
