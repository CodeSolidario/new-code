<template>
      <main class="page product-page" v-if="load" >
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="block-heading">
                    <img src="../assets/img/avatars/avatar1.jpg" alt="Avatar" class="avatar">
                    <h2 class="text-info">{{ user.name }}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <div class="block-content">
                    <div class="product-info">
                        <div>
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" id="description-tab" href="#projects">Projetos</a></li>
                                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" id="specifications-tabs" href="#specifications">Meus projetos</a></li>
                                <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" id="reviews-tab" href="#reviews">Minha conta</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane active fade show" role="tabpanel" id="projects">
                                    <div class="reviews" v-for="project of projects" :key="project.id">
                                        <div class="review-item">
                                            <!-- <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg"></div> -->
                                            <router-link :to="'/project/'+ project.id"><h4>{{ project.title }}</h4></router-link><router-link :to="'/user-page/' + project.owner.id"><span class="text-muted">{{ project.owner.name }}</span></router-link>
                                            <p>{{ project.description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show specifications" role="tabpanel" id="specifications">
                                    <button class="btn btn-primary" @click="projectFormView = true">Criar projeto</button>
                                    <div v-if="!projectFormView">
                                    <div class="reviews" v-for="project of user.projects" :key="project.id">
                                        <div class="review-item">
                                            <!-- <div class="rating">
                                                <img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-empty.svg">
                                                </div> -->
                                           <router-link :to="'/project/'+ project.id"><h4>{{ project.title }}</h4></router-link>
                                            <p>{{ project.description }}</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="reviews" v-else>
                                    <project-form :owner_id = "user.id"></project-form>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" role="tabpanel" id="reviews">
                                    <div class="reviews">
                                     <user-form :user="user"></user-form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
import ProjectForm from './project/ProjectForm'
import userForm from './userForm'
export default {
    components:{
        'project-form' : ProjectForm,
        'user-form': userForm
    },
    data() {
        return {
            load: false,
            projectFormView: false
        }
    },
    computed: {
        projects () {
            return this.$store.state.projects
        },
        user () {
            return this.$store.state.user
        }
    },
    created() {
        this.$store.dispatch('getUser', this.$route.params.id).then(() => {
            this.$store.dispatch('getProjects').then(() => {
                this.load = true
            })
        })
    }
}
</script>

<style scoped>
 a {
     color:blueviolet !important;
 }
 .avatar {
  vertical-align: middle;
  width: 100px;
  height: 100px;
  border-radius: 50%;
}

</style>