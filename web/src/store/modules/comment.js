import { http } from '@/http'

const state = {
  all: []
}

const getters = {
  getAll( state ){
    return state.all
  }
}

const mutations = {
  SET_ALL (state, comments) {
    state.all = comments
  },
  ADD_COMMENT (state, datas) {
    state.all.push(datas)
  }
}

const actions = {

  getAllComments({commit}, idvideo){
    return new Promise((resolve, reject) => {
      http.get(`api/comments/${idvideo}`).then(res => {
        commit('SET_ALL', res.data)
        resolve(res)
      })
      .catch(err => {
        reject(err)
      })
    })
  },

  actionSave( {commit}, data){
    //console.log(data)
    return new Promise((resolve, reject) => {
      http.post(`api/comment`, data).then(res => {
        if( res.status == 200 ){
          this.dispatch('comment/getAllComments', data.video_id)
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

