import { http } from '@/http'

const state = () =>({
  all: []
})

const getters = {
  getAll( state ) {
    return state.all;
  }
}

const mutations = {

  SET_ALL (state, categories) {
    state.all = categories
  }

}

const actions = {

  getAllCategories({commit}) {
    return new Promise((resolve, reject) => {
      http.get('api/categories').then(res => {
        commit('SET_ALL', res.data)
        resolve(res)
      })
      .catch(err => {
        reject(err)
      })
    })
  },

  saveAction( {commit}, data ){
    //console.log(data)
    return new Promise((resolve, reject) => {
      http.post('api/category', data).then(res => {
        if( res.status == 200 ){
          this.dispatch('category/getAllCategories')
        }
        resolve(res)
      })
      .catch(err => {
        reject(err)
      })
    })
  }

}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
