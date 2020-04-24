<template>
  <main class="page product-page" v-if="project">
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">Você realmente deseja apagar este projeto?</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button
              type="button"
              class="btn btn-danger"
              data-dismiss="modal"
              @click="deleteProject"
            >Confirmar</button>
          </div>
        </div>
      </div>
    </div>
    <section class="clean-block clean-product dark" v-if="load">
      <div class="container">
        <div class="block-heading">
          <h2 class="text-info">{{ project.title }}</h2>
        </div>
        <div class="block-content">
          <div class="product-info">
            <div>
              <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    role="tab"
                    data-toggle="tab"
                    id="description-tab"
                    href="#description"
                  >Detalhes</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    role="tab"
                    data-toggle="tab"
                    id="specifications-tabs"
                    href="#specifications"
                  >Tarefas</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    role="tab"
                    data-toggle="tab"
                    id="reviews-tab"
                    href="#reviews"
                  >Fórum</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane active fade show" role="tabpanel" id="description">
                  <div class="reviews">
                    <div class="review-item">
                      <!-- <div class="rating">
                        <img src="assets/img/star.svg" />
                        <img src="assets/img/star.svg" />
                        <img src="assets/img/star.svg" />
                        <img src="assets/img/star.svg" />
                        <img src="assets/img/star-empty.svg" />
                      </div> -->
                      <h4>Descrição</h4>
                      <p>{{ project.description }}</p>
                      <h4>Proprietário</h4>
                      <p>
                        <span class="text-muted">
                          <a href="#">{{ project.owner.name }}</a>
                        </span>
                      </p>
                      <h4>Colaboradores</h4>
                      <p>
                        <span v-for="user of project.users" :key="user.id">
                          <router-link :to="'/user-page/' + user.id">
                            <img
                              src="../../assets/img/avatars/avatar1.jpg"
                              :title="user.name"
                              alt="Avatar"
                              class="avatar"
                            />
                          </router-link>
                        </span>
                      </p>
                      <button class="btn btn-primary" v-if="showCollaborate" @click="goProject">Colaborar</button>
                      <button class="btn btn-primary" v-if="showLeave">Deixar Projeto</button>
                      <button
                        @click="projectFormView = true"
                        class="btn btn-primary"
                        v-if="authUser.user.id === project.owner_id"
                      >Editar Projeto</button>
                      <button
                        class="btn btn-danger"
                        data-toggle="modal"
                        data-target="#exampleModal"
                        v-if="authUser.user.id === project.owner_id"
                      >Apagar Projeto</button>
                    </div>
                    <project-form v-if="projectFormView" :project="project"></project-form>
                  </div>
                </div>
                <div class="tab-pane fade show specifications" role="tabpanel" id="specifications">
                  <project-tasks></project-tasks>
                </div>
                <div class="tab-pane fade show" role="tabpanel" id="reviews">
                  <div class="reviews">
                    <div class="review-item">
                      <button @click="showNewPostForm = true" class="btn btn-primary">Novo post</button>
                      <form v-on:submit.prevent="createPost" v-if="showNewPostForm">
                        <div class="form-group">
                          <label for="titleFormControlInput1">Titulo</label>
                          <input
                            type="text"
                            class="form-control"
                            id="titleFormControlInput1"
                            v-model="newPost.title"
                          />
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Descrição</label>
                          <textarea
                            class="form-control"
                            id="exampleFormControlTextarea1"
                            rows="4"
                            v-model="newPost.description"
                          ></textarea>
                        </div>
                        <div class="form-group">
                          <button class="btn btn-primary" type="submit">Salvar</button>
                        </div>
                      </form>
                    </div>
                    <div class="review-item" v-for="post of project.posts" :key="post.id">
                      <h4>{{ post.title }}</h4>
                      <p>{{ post.user_name }}</p>
                      <p>{{ post.description }}</p>
                      <a class="btn btn-link" @click="showResponses = !showResponses">Respostas</a>
                      <div class="reviews" v-if="showResponses">
                        <div class="review-item" v-for="comment of post.comments" :key="comment.id">
                          <p>{{ comment.user_name }}</p>
                          <p>{{ comment.comment }}</p>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1"></label>
                          <textarea
                            class="form-control"
                            id="exampleFormControlTextarea1"
                            rows="4"
                            v-model="newComment.comment"
                          ></textarea>
                        </div>
                        <a @click="createComment(post.id)" class="btn btn-link">Comentar</a>
                      </div>
                    </div>
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
import ProjectTasks from "./ProjectTasks";
import ProjectForm from "./ProjectForm";
export default {
  components: {
    "project-tasks": ProjectTasks,
    "project-form": ProjectForm
  },
  data() {
    return {
      load: false,
      authUser: null,
      showCollaborate: true,
      showLeave: false,
      projectFormView: false,
      showResponses: false,
      showCommentForm: false,
      newComment: {},
      newPost: {},
      showNewPostForm: false,
    };
  },
  methods: {
    deleteProject() {
      this.$store.dispatch("deleteProject", this.$route.params.id).then(() => {
        this.$router.push("/user-page/" + this.authUser.user.id);
      });
    },
    createPost() {
      this.newPost.project_id = this.$route.params.id;
      this.newPost.user_id = this.authUser.user.id;
      this.newPost.user_name = this.authUser.user.name
      this.$store.dispatch("createPost", this.newPost).then(() => {
        this.$store.dispatch("getProject", this.$route.params.id)
        this.newPost = {}
        this.showNewPostForm = false
      })
    },
    createComment(post_id) {
      this.newComment.user_id = this.authUser.user.id
      this.newComment.post_id = post_id
      this.newComment.user_name = this.authUser.user.name
      this.$store.dispatch("createComment", this.newComment).then(() => {
        this.$store.dispatch("getProject", this.$route.params.id)
        this.newComment = {}
        this.showCommentForm = false
      })
    },
    goProject () {
      let data = {
        project_id: this.$route.params.id,
        user_id: this.authUser.user.id
      }
      this.$store.dispatch('goProject', data).then(() =>{
        this.$store.dispatch("getProject", this.$route.params.id)
      })
    }
  },
  computed: {
    project() {
      return this.$store.state.project;
    }
  },
  created() {
    this.$store.dispatch("getProject", this.$route.params.id).then(() => {
      this.load = true;
      this.authUser = JSON.parse(window.localStorage.getItem("auth"));
      let found = 0
      for (let user of this.project.users) {
        if (user.id === this.authUser.user.id) {
          found += 1
        }
      }
      if (
        found != 0 ||
        this.project.owner_id === this.authUser.user.id
      ) {
        this.showCollaborate = false;
      } 
      if (
        found != 0 &&
        this.project.owner_id !== this.authUser.user.id
      ) {
        this.showLeave = true;
      }
    });
    this.projectFormView = false;
  }
};
</script>

<style scoped>
.avatar {
  vertical-align: middle;
  width: 25px;
  height: 25px;
  border-radius: 50%;
}
a {
  color: blueviolet !important;
}
</style>