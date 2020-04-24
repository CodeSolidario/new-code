<template>
  <form v-on:submit.prevent="saveUser">
    <div class="form-group">
      <label for="titleFormControlInput1">Nome</label>
      <input type="text" class="form-control" id="titleFormControlInput1" v-model="user.name" />
    </div>
    <div class="form-group">
      <label for="emailFormControlInput1">Email</label>
      <input type="email" class="form-control" id="emailormControlInput1" v-model="user.email" />
    </div>
    <div class="row">
      <div class="col form-group">
        <input type="password" class="form-control" placeholder="Nova Senha" v-model="user.password" />
      </div>
      <div class="col form-group">
        <input type="text" class="form-control" placeholder="Confirme a senha" v-model="user.password_confirmation" />
      </div>
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit">Salvar</button>
    </div>
  </form>
</template>

<script>
export default {
    props:[
        'user'
    ]
};
</script>

<style>
</style>