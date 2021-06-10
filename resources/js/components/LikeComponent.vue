<template>
  <div class="container">
    <div class="row justify-content-center mt-1">
      <div class="col-md-12">
        <div class="vue_like_container">
          <button
            class="border-0 vue_like_btn"
            type="button"
            v-if="status == false"
            @click.prevent="check()"
          >
            <i class="far fa-3x fa-heart"></i>
            <p>{{ count }}</p>
          </button>
          <button
            class="border-0 vue_like_btn"
            type="button"
            v-else
            @click.prevent="check()"
          >
            <i class="fas fa-3x fa-heart"></i>
            <p>{{ count }}</p>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post", "version"],

  // vue ないで使えるデータを持たせる
  data() {
    return {
      status: false,
      count: 0,
      // version: this.version,
    };
  },

  created() {
    this.firstCheck();
  },

  methods: {
    firstCheck() {
      axios
        .get("/like/" + this.version + "/" + this.post.id + "/firstCheck")
        .then((res) => {
          if (res.data[0] == 1) {
            this.status = true;
            this.count = res.data[1];
          } else {
            this.status = false;
            this.count = res.data[1];
          }
          console.log(res);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    check() {
      axios
        .get("/like/" + this.version + "/" + this.post.id + "/check")
        .then((res) => {
          if (res.data[0] == 1) {
            this.status = true;
            this.count = res.data[1];
          } else {
            this.status = false;
            this.count = res.data[1];
          }
          console.log(res.data);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
  },
};
</script>
