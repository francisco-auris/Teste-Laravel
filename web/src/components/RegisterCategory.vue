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
          <v-icon large>add_circle</v-icon> Nova categoria
        </v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">Nova categoria</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field label="Titulo da categoria" required v-model="dados.title"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-checkbox
                  v-model="dados.favorite"
                  false-value="N"
                  true-value="Y"
                  label="Favorito?"
                  required
                  off-icon="check_box_outline_blank"
                  on-icon="check_box"
                ></v-checkbox>
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
export default {
  data: () => ({
    dialog: false,
    dados: {},
  }),
  methods: {
    save(){
      if( this.dados.title.length > 0 ){
        let res = this.$store.dispatch('category/saveAction', this.dados)
        this.dados.title=''
        this.dialog = false
      }
      else {
        alert('Favor preencher campo de Titulo')
      }
    }
  }
}
</script>
