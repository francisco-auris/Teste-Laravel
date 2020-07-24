<template>
<div>
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="primary"
          text
          x-large
          v-bind="attrs"
          v-on="on"
        >
          <v-icon large>add_circle</v-icon> Novo video
        </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Novo video</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field label="Titulo da categoria" required v-model="dados.title"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field label="URL do video do YouTube" required v-model="dados.url"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-combobox
                  v-model="dados.category_id"
                  :items="categories"
                  item-text="title"
                  item-value="id"
                  label="Selecione a categoria do video"
                ></v-combobox>
              </v-col>


            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
          <v-btn color="blue darken-1" text @click="save()">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</div>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
  data: () => ({
    dialog: false,
    dados: {
      title: '',
      url: '',
      category_id: []
    }
  }),
  computed: {
    ...mapGetters({
      categories: ['category/getAll']
    }),

  },
  methods: {
    endDatas(){
      let novo = {
        title: this.dados.title,
        url: this.dados.url,
        category_id: this.dados.category_id.id
      }
      return novo
    },
    save(){
      if( this.dados.title.length > 0 && this.dados.url.length > 0 ){
        let sendDatas = this.endDatas()
        let res = this.$store.dispatch('video/saveAction', sendDatas)
        this.dados.title = ''
        this.dados.url = ''
        this.dados.category_id = []
        this.dialog = false
      }
      else {
        alert('Favor preencher todos os campos :)')
      }
    }
  }
}
</script>
