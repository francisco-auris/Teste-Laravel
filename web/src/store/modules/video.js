import { http } from '@/http'
import category from './category';

const state = {
  all: []
}

const getters = {
  getAll(state){
    return state.all;
  },
  detail: (state) => id => {
    return state.all.find(el => el.id == id)
  }
}

const mutations = {
  SET_ALL (state, videos) {
    state.all = videos
  }
}

const actions = {

  getAllVideos({commit}, idcategory) {
    return new Promise((resolve, reject) => {

      http.get(`api/videos-category/${idcategory}`).then(res => {
        commit('SET_ALL', res.data)
        resolve(res)
      })
      .catch(err => {
        reject(err)
      })

    })
  },

  saveAction({commit}, data){
    return new Promise((resolve, reject) => {
      http.post('api/video', data).then(res => {
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
