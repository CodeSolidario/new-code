<template>
  <main class="page registration-page">
    <section class="clean-block clean-form dark">
      <div class="container">
        <div class="block-heading">
          <h2 class="text-info">Cadastro</h2>
        </div>
        <form v-on:submit.prevent="createUser">
          <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control item" type="text" id="name" v-model="user.name" />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control item" type="email" id="email" v-model="user.email" />
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input class="form-control item" type="password" id="password" v-model="user.password" />
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirme a senha</label>
            <input class="form-control item" type="password" id="password_confirmation" v-model="user.password_confirmation" />
          </div>
          <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
                  <p>
          Já tem uma conta?
          <router-link tag="a" to="/login">
            <span>Faça login.</span>
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
      user: {},
      error: null
    }
  },
  methods: {
    createUser () {
      this.$store.dispatch('createUser', this.user).then(() => {
        this.user = {}
        this.$router.push('/login')
      }, err => {
        console.log(err)
        this.error = "Verifique os dados"
      })
    }
  }
};
</script>

<style>
</style>