<template>
<div>

    <v-btn
    text
    color="primary"
    @click="back()"
    >
    <v-icon class="mr-4">keyboard_backspace</v-icon> Voltar
    </v-btn>
    <br>
    <br>
    <h1>{{ datas.title }}</h1>
    <!--<v-img :src="urlImage()" />-->
    <iframe width="100%" height="443" src="http://www.youtube.com/embed/KWZGAExj-es" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

  <br>
  <v-row>
    <v-col cols="10">
      <v-text-field
        placeholder="Autor"
        append-icon="person"
        solo
        flat
        background-color="#EEE"
        v-model="data.author"
      />
      <v-text-field
        placeholder="Digite seu comentario aqui ..."
        append-icon="message"
        solo
        flat
        background-color="#EEE"
        v-model="data.comment"
      />
    </v-col>
    <v-col cols="2">
      <v-btn color="primary" x-large @click="saveComment()">Comentar</v-btn>
    </v-col>
  </v-row>

    <h3>Comentarios</h3>

    <v-row v-for="item in comments" :key="item.id">
      <v-col cols="12">
        <v-sheet  color="#EEE" rounded class="pa-5">
          <strong>{{ item.author }}</strong>
          <p>{{ item.comment }}</p>
          <small>{{ item.created_at }}</small>
        </v-sheet>
      </v-col>
    </v-row>
</div>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
  data: () => ({
    datas: {},
    data: {
      video_id: 0,
      author: '',
      comment: ''
    }
  }),
  created(){
    //
        this.$store.dispatch('comment/getAllComments', this.$route.params.id)
        this.data.video_id = this.$route.params.id
  },
  computed: {
    ...mapGetters({
      comments: ['comment/getAll']
    })
  },
  mounted() {

    this.datas = this.$store.getters['video/detail'](this.$route.params.id)
    //this.comments = this.$store.getters['comment/getAll'](this.$route.params.id)
  },
  methods: {
    urlImage(){
      let exp = this.datas.url.split('/')
      return `http://img.youtube.com/vi/${exp[exp.length - 1]}/0.jpg`;
    },
    back(){
      this.$router.push({name: 'home'})
    },
    saveComment(){
      if( this.data.author.length > 0 && this.data.comment.length > 0 ){
        let res = this.$store.dispatch('comment/actionSave', this.data)
        if( res.status == 200 ){
          this.$store.dispatch('comment/getAllComments', this.$route.params.id)
          this.data.author = ''
          this.data.comment = ''
        }
      }
      else {
        alert('Favor preencher campos de Autor e Comentario');
      }
    }
  }
}
</script>
<style scoped>

</style>
