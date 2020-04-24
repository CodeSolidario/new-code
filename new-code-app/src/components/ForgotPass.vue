<template>
  <main class="page login-page">
    <section class="clean-block clean-form dark">
      <div class="container">
        <div class="block-heading">
          <h2 class="text-info">Esqueceu a senha?</h2>
        </div>
        <form v-on:submit.prevent="resetPass">
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control item" type="email" id="email" v-model="email"/>
          </div>

          <div class="form-group"></div>
          <button class="btn btn-primary btn-block" type="submit">Resgatar</button>
                  <p>
          Ou,
          <router-link tag="a" to="/login">
            <span>faça login.</span>
          </router-link>
        </p>
           <div class="alert alert-danger" role="alert" v-if="error">
            {{ error }}
          </div>
        </form>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  data () {
    return {
      error: null,
      email: null,
    }
  },
  methods:{
    resetPass () {
      this.$store.dispatch('resetPass', {email: this.email}).then(response => {
        console.log(response)
        this.$router.push('/')
      }, err => {
        console.log(err)
        this.error = 'email não localizado'
      })
    }
  }
};
</script>

<style>
</style>