<template>
  <div class="hello">
    <main class="page landing-page">
      <section class="clean-block clean-hero" style="color:rgba(138, 43, 226, 0.85);">
        <div class="text">
          <h1>Como podemos melhorar a nossa sociedade hoje?</h1>
          <p>Ajude a desenvolver projetos que possam melhorar a vida das pessoas por meio da tecnologia.</p>
          <router-link
            to="/register"
            tag="button"
            class="btn btn-outline-light btn-lg"
            type="button"
          >Participe</router-link>
        </div>
      </section>
      <section class="clean-block clean-info dark" id="info">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Sobre nós</h2>
            <p>Somos uma plataforma de código aberto que reúne desenvolvedores para desenvolver projetos de interesse social.</p>
          </div>
          <div class="row align-items-center">
            <div class="col-md-6">
              <img class="img-thumbnail" src="../assets/img/scenery/image5.jpg" />
            </div>
            <div class="col-md-6">
              <h3>Qual o objetivo do Code Solidário?</h3>
              <div class="getting-started-info">
                <p>Ajudar a fazer uma sociedade melhor usando a tecnologia, este é o foco e a missão do nosso projeto, desenvolver soluções em tecnologia para melhorar a vida das pessoas e resolver problemas sociais. Como você pode contribuir para isso? Vem com a gente para fazer uma sociedade melhor!</p>
              </div>
              <button
                class="btn btn-outline-primary btn-lg"
                type="button"
                @click="$router.push('/register')"
              >Junte-se a nós</button>
            </div>
          </div>
        </div>
      </section>
      <section class="clean-block features" id="how-it-works">
        <div class="container">
          <div class="block-heading">
            <h2 class="text-info">Como Funciona</h2>
            <p>Descubra o que você pode fazer na plataforma do Code Solidário.</p>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-5 feature-box">
              <i class="icon-bulb icon"></i>
              <h4>Desenvolver suas idéias</h4>
              <p>Ao criar um projeto na plataforma você poderá receber ajuda de outros membros para desenvolvê-lo.</p>
            </div>
            <div class="col-md-5 feature-box">
              <i class="icon-eye icon"></i>
              <h4>Colabore com outros projetos</h4>
              <p>Encontre projetos que você se identifique e ajude da forma que puder.</p>
            </div>
            <div class="col-md-5 feature-box">
              <i class="icon-graduation icon"></i>
              <h4>Aprender</h4>
              <p>Ao colaborar com projetos você desenvolve e melhora suas habilidades profissionais.</p>
            </div>
            <div class="col-md-5 feature-box">
              <i class="icon-people icon"></i>
              <h4>Construir Networking</h4>
              <p>Conheça outros desenvolvedores, compartilhe conhecimentos e tire dúvidas.</p>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</template>

<script>
export default {};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.clean-hero {
  background-color: #8a2be2;
  background: url("../assets/img/tech/image4.jpg"),
    linear-gradient(rgba(138, 43, 226, 0.5), rgba(138, 43, 226, 0.5));
}
.btn-outline-primary {
  background-color: blueviolet !important;
  color: #fff !important;
}
h1 {
  font-family: "Cabin", sans-serif;
  text-transform: uppercase;
  font-weight: bolder;
}
h3 {
  margin: 40px 0 0;
  color: rgb(138, 43, 226);
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
</style>
