<template>
<div>
   <v-row >
    <v-col cols="3">
      <btn-register-category />
    </v-col>
    <v-col cols="3">
       <btn-register-video />
    </v-col>
    <v-col cols="12">
      <v-sheet class="p-0">
        Categorias
        <v-chip-group
          column
          active-class="primary--text"

        >
          <v-chip v-for="category in categories" :key="category.id" @click="loadVideos(`${category.id}`)">
            {{ category.title }}
            <v-icon right v-if="category.favorite == 'Y'">star</v-icon>
          </v-chip>
        </v-chip-group>
      </v-sheet>
    </v-col>
  </v-row>

  <v-row>
    <v-col v-if="videos.length == 0">
      <h1 align="center" class="mt-10">Nenhum video cadastrado</h1>
    </v-col>
    <v-col cols="4" v-for="video in videos" :key="video.id">
      <v-card
        class="mx-auto"
        max-width="344"
      >
      <v-img
        class="white--text align-end"
        height="200px"
        :src='imageUrl(video.url)'
      >
      </v-img>

        <v-card-text>
          <div>Word of the Day</div>
          <p class="display-1 text--primary">
            {{ video.title }}
          </p>
          <div class="text--primary">
            {{ video.url }}

          </div>
        </v-card-text>
        <v-card-actions>
          <router-link :to="{name: 'video', params: { id: video.id }}">
          <v-btn
            text
            color="deep-purple accent-4"
          >
           Ver mais
          </v-btn>
          </router-link>
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
</div>
</template>
<script src="./script.js" />
<style scoped src="./style.css" />
