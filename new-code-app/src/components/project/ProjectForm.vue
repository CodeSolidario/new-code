<template>
  <form v-on:submit.prevent="saveProject">
    <div class="form-group">
      <label for="titleFormControlInput1">Titulo</label>
      <input
        type="text"
        class="form-control"
        id="titleFormControlInput1"
        v-model="projectForm.title"
      />
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Descrição</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" v-model="projectForm.description"></textarea>
    </div>
    <div class="form-group">
      <label for="linkFormControlInput1">Link do repositório</label>
      <input
        type="text"
        class="form-control"
        id="linkFormControlInput1"
        v-model="projectForm.github_link"
      />
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Salvar</button>
    </div>
  </form>
</template>

<script>
export default {
    props: [
        'owner_id', 'project'
    ],
    data () {
        return {
            projectForm: {}
        }
    },
    methods: {
        saveProject() {
            if (this.projectForm.id) {
                this.$store.dispatch('updateProject', this.projectForm).then(() => {
                     this.$router.go(0)
                })
            } else {
                this.projectForm.owner_id = this.owner_id
                this.$store.dispatch('createProject', this.projectForm).then(() => {
                    this.$router.go(0)
                })
            }
        }
    },
    created () {
        if (this.project) {
            this.projectForm = this.project
        }
        console.log(this.project.id)
    }
};
</script>

<style>
</style>