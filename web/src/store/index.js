import Vue from 'vue'
import Vuex from 'vuex'
import category from './modules/category'
import video from './modules/video'
import comment from './modules/comment'


Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    category,
    video,
    comment
  }
})
