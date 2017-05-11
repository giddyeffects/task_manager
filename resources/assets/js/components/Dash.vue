<template>
<v-app id="dashboard" left-fixed-sidebar bottom-footer top-fixed-toolbar>
  <header id="main-toolbar">
    <v-toolbar class="green toolbar--fixed">
      <v-toolbar-side-icon @click.native.stop="nav4 = !nav4" class="hidden-sm-and-up"/>
      <v-toolbar-title>Cytonn Task Manager - Dashboard</v-toolbar-title>
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
  <main>
    <v-sidebar v-model="nav4" class="mt-0 scroll-y" :mobileBreakPoint="576" fixed>
      <v-list>
        <v-list-item >
          <v-list-tile>
            <v-list-tile-title class="subheader">Dashboard</v-list-tile-title>
          </v-list-tile>
        </v-list-item>
        <v-list-item >
          <v-list-tile>
            <v-list-tile-title>Tasks</v-list-tile-title>
          </v-list-tile>
        </v-list-item>
      </v-list>
    </v-sidebar>
    <v-content>
      <v-container fluid>
        <div class="title"><task></task></div>
      </v-container>
    </v-content>
  </main>
  <footer>
    <v-footer class="footer green lighten-1 white--text">All rights reserved</v-footer>
  </footer>
</v-app>
</template>
<script>

    export default {
        data() {
            return {
                nav4: true,
                username: username
            }
        }
    }
</script>