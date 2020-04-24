<template>
  <div id="app">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
      <div class="container">
        <router-link tag="a" to="/" class="navbar-brand logo" href="#">
          <img src="./assets/img/logo_v.png" alt />
        </router-link>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item" role="presentation">
              <a class="nav-link" href @click="$router.push('/')">Home</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#info">Sobre</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#how-it-works">Como Funciona</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href @click="$router.push('/contact')">Contato</a>
            </li>
            <router-link v-if="!auth" tag="li" to="/login" class="nav-item" role="presentation">
              <button class="btn btn-primary">Entrar</button>
            </router-link>
            <!-- <button v-else class="btn btn-primary" @click="logout">Sair</button> -->
            <div class="dropdown" v-else>
              <a
                class="btn btn-link dropdown-toggle"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <img src="./assets/img/avatars/avatar2.jpg" class="avatar" alt />
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a
                  class="dropdown-item"
                  href
                  @click="$router.push('/user-page/' + auth.user.id)"
                >Minha conta</a>
                <a class="dropdown-item" href @click="logout">Sair</a>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </nav>
    <router-view></router-view>
    <footer class="page-footer dark" style="position: fixed; bottom: 0; width: 100%; margin-top: 150px;">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <img src="./assets/img/logo.png" alt />
            <p>
              <a
                href="https://www.facebook.com/codesolidario"
                target="_blank"
                class="btn btn-primary btn-custom"
              >
                <i class="icon-social-facebook"></i>
              </a>

              <a
                href="https://github.com/codeSolidario"
                target="_blank"
                class="btn btn-primary btn-custom"
              >
                <i class="icon-social-github"></i>
              </a>

              <a
                href="https://www.instagram.com/codesolidario/"
                target="_blank"
                class="btn btn-primary btn-custom"
              >
                <i class="icon-social-instagram"></i>
              </a>
              <a
                href="https://www.linkedin.com/company/code-solidário"
                target="_blank"
                class="btn btn-primary btn-custom"
              >
                <i class="icon-social-linkedin"></i>
              </a>
            </p>
          </div>
          <div class="col-sm-3">
            <h5>About us</h5>
            <ul>
              <li>
                <a href="#">Sobre nós</a>
              </li>
              <li>
                <a href="#">Blog</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h5>Support</h5>
            <ul>
              <li>
                <a href="#">FAQ</a>
              </li>
              <li>
                <a href="#">Contato</a>
              </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h5>Legal</h5>
            <ul>
              <li>
                <a href="#">Termos de uso</a>
              </li>
              <li>
                <a href="#">Política de privacidade</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <p>© 2020 | Code Solidário | Todos os direitos reservados.</p>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      auth: null
    };
  },
  methods: {
    logout() {
      window.localStorage.removeItem("auth");
      this.$router.go(0);
    }
  },
  created() {
    this.auth = JSON.parse(window.localStorage.getItem("auth"));
  }
};
</script>

<style>
@import "./assets/bootstrap/css/bootstrap.min.css";
@import "./assets/css/smoothproducts.css";

.btn-custom {
  border: none !important;
  margin: 2px;
}
.btn-primary {
  background-color: rgb(138, 43, 226) !important;
  color: #fff !important;
}
.navbar {
  padding-top: 5px;
  padding-bottom: 5px;
}
.navbar a {
  color: rgb(138, 43, 226) !important;
}
.text-info {
  color: rgb(138, 43, 226) !important;
}
.icon {
  color: rgb(138, 43, 226) !important;
}
.avatar {
  vertical-align: middle;
  width: 25px;
  height: 25px;
  border-radius: 50%;
}
</style>
