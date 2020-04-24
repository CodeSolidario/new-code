<template>
  <main class="page login-page">
    <section class="clean-block clean-form dark">
      <div class="container">
        <div class="block-heading">
          <h2 class="text-info">Criar senha</h2>
        </div>
        <form v-on:submit.prevent="resetPass" v-if="token">
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" v-model="password" />
          </div>
          <div class="form-group">
            <label for="password">Confirm Password</label>
            <input class="form-control" type="password" id="password" />
          </div>
          <div class="form-group"></div>
          <button class="btn btn-primary btn-block" type="submit">Cadastrar senha</button>
        </form>
        <div class="alert alert-danger" role="alert" v-if="error && !token">{{ error }}</div>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  data() {
    return {
      token: null,
      error: null,
      password: null
    };
  },
  methods: {
    resetPass() {
      this.$store
        .dispatch("alterPass", { password: this.password, token: this.token })
        .then(() => {
          this.$router.push("/login");
        });
    }
  },
  created() {
    let token = this.$route.params.token;
    this.$store.dispatch("verifyToken", { token: token }).then(
      response => {
        console.log(response);
        this.token = this.$route.params.token;
      },
      err => {
        console.log(err);
        this.error = "Token inválido ou expirado";
      }
    );
  }
};
</script>

<style>
</style>