<template>
  <header id="main-toolbar">
    <v-toolbar class="green toolbar--fixed">
      <v-toolbar-side-icon @click.native.stop="nav1 = !nav1" class="hidden-sm-and-up"/>
      <v-toolbar-title>Task Manager - Dashboard</v-toolbar-title>
      <v-toolbar-items>
        <v-toolbar-item>{{ username }}</v-toolbar-item>
        <v-menu bottom origin="top right" transition="v-scale-transition">
          <v-btn dark icon slot="activator">
            <v-icon>more_vert</v-icon>
          </v-btn>
          <v-list>
            <v-list-item>
              <v-list-tile>
                <v-list-tile-title>Log Out</v-list-tile-title>
              </v-list-tile>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-toolbar-items>
    </v-toolbar>
  </header>
</template>
<script>
  export default {
      data() {
          return {
              nav1: true,
              username: username
          }
      }
  }
</script>