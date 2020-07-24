<template>
  <v-app>
    <v-main>
      <v-container>
        <h1><v-icon large color="#000">movie</v-icon> My Videos </h1>
        <br>
        <v-divider />
        <br>
        <router-view />
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: 'App',

  data: () => ({
    //
  }),
};
</script>
<style>

</style>
