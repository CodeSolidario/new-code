<template>
  <main class="page login-page">
    <section class="clean-block clean-form dark">
      <div class="container">
        <div class="block-heading">
          <h2 class="text-info">Login</h2>
        </div>
        <form v-on:submit.prevent="userLogin">
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control item" type="email" id="email" v-model="user.email" />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" v-model="user.password" />
            <router-link tag="a" to="/forgot-password">
              <span>Esqueceu a senha?</span>
            </router-link>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="checkbox" />
              <label class="form-check-label" for="checkbox">Remember me</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Login</button>
           <p>
          Não tem uma conta?
          <router-link tag="a" to="/register">
            <span>Registre-se.</span>
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
        userLogin () {
            window.localStorage.removeItem('auth')
            this.$store.dispatch('userLogin', this.user).then(response => {
                window.localStorage.setItem('auth', JSON.stringify(response.body))
                this.user = {}
                this.$router.push('/user-page/' + response.body.user.id)
            }, err => {
              console.log(err)
              this.error = "Email ou senha inválidos!"
            })
        }
    },
    created() {
      let auth = JSON.parse(window.localStorage.getItem('auth'))
      if (auth) {
        this.$router.push('/user-page/' + auth.user.id)
      }
    }
};
</script>

<style>
</style>