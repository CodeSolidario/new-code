import Vue from 'vue'
import Vuex from 'vuex'
import { userRegister, userLogin, userResource, getHeader, projectResource, postResource, commentResource,
 goProject, resetPass, verifyToken, alterPass} from './config'
// getHeader, getHeaderFile, , userResource

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        user : { 
        },
        users: [],
        projects: [
        ],
        project:{

        }
    },
    mutations: {
        setUser (state, data) {
            state.user = data
        },
        setUsers (state, data) {
            state.users = data
        },
        setProjects (state, data) {
            state.projects = data
        },
        setProject (state, data) {
            state.project = data
        }
    },
    actions: {
        userLogin (context, params) {
            return Vue.http.post(userLogin, params).then(response => {
                return response
            })
        },
        resetPass (context, params) {
            return Vue.http.post(resetPass, params).then(response => {
                return response
            })
        },
        verifyToken (context, params) {
            return Vue.http.post(verifyToken, params).then(response => {
                return response
            }) 
        },
        alterPass (context, params) {
            return Vue.http.post(alterPass, params).then(response => {
                return response
            }) 
        },
        createUser (context, params) {
            return Vue.http.post(userRegister, params).then(response => {
                return response
            })
        },
        getUsers({commit}) {
            return Vue.http.get(userResource, {headers: getHeader()}).then(response => {
                if (response.status === 200) {
                    commit('setUsers', response.body)
                }
                return response
            })
        },
        getUser ({commit}, params) {
            return Vue.http.get(userResource + params, {headers: getHeader()}).then(response => {
                if (response.status === 200) {
                    commit('setUser', response.body)
                }
                return response
            })
        },
        getProjects ({commit}) {
            return Vue.http.get(projectResource, {headers: getHeader()}).then(response => {
                if (response.status === 200) {
                    commit('setProjects', response.body)
                }
                return response
            })
        },
        getProject ({commit}, params) {
            return Vue.http.get(projectResource + params, {headers: getHeader()}).then(response => {
                if (response.status === 200) {
                    commit('setProject', response.body)
                }
                return response
            })
        },
        createProject ({commit}, params) {
            return Vue.http.post(projectResource, params, {headers: getHeader()}).then(response => {
                if (response.status === 200) {
                    commit('setProject', response.body)
                }
                return response
            })
        },
        updateProject ({commit}, params) {
            return Vue.http.put(projectResource + params.id, params, {headers: getHeader()}).then(response => {
                if (response.status === 200) {
                    commit('setProject', response.body)
                }
                return response
            })
        },
        createPost(context, params) {
            console.log(params)
            return Vue.http.post(postResource, params, {headers: getHeader()}).then(response => {
                return response
            })
        },
        createComment(context, params) {
            return Vue.http.post(commentResource, params, {headers: getHeader()}).then(response => {
                return response
            })
        },
        deleteProject ({commit}, params) {
            return Vue.http.delete(projectResource + params, {headers: getHeader()}).then(response => {
                if (response.status === 200) {
                    commit('setProject', {})
                }
                return response
            })
        },
        goProject (context, params) {
            return Vue.http.post(goProject, params, {headers: getHeader()}).then(response => {
                return response
            })
        }
    }
})