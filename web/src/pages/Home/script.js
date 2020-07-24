import { mapGetters } from 'vuex'
import RegisterCategory from '@/components/RegisterCategory'
import RegisterVideo from '@/components/RegisterVideo'

export default {

  components: {
    'btn-register-category': RegisterCategory,
    'btn-register-video': RegisterVideo
  },

  data: () => ({

  }),
  created() {
    this.$store.dispatch('category/getAllCategories')
    //
  },
  mounted() {

  },
  computed: {
    ...mapGetters({
      categories: ['category/getAll'],
      videos: ['video/getAll']
    }),


  },
  methods: {

    loadVideos( idcategory ) {
      this.$store.dispatch('video/getAllVideos', idcategory)
    },
    imageUrl( url ){
      let exp = url.split('/')
      let image = `http://img.youtube.com/vi/${exp[exp.length - 1]}/0.jpg`
      return image
    }

  },

}
