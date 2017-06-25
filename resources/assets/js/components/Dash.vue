<template>
  <v-app id="dashboard">
    <v-navigation-drawer persistent light :mini-variant.sync="mini" v-model="drawer">
      <v-list class="pa-0">
        <v-list-item>
          <v-list-tile avatar tag="div">
            <v-list-tile-avatar>
              <img src="https://randomuser.me/api/portraits/men/85.jpg" />
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>{{ username }}</v-list-tile-title>
            </v-list-tile-content>
            <v-list-tile-action>
              <v-btn icon @click.native.stop="mini = !mini">
                <v-icon>chevron_left</v-icon>
              </v-btn>
            </v-list-tile-action>
          </v-list-tile>
        </v-list-item>
      </v-list>
      <v-list class="pt-0" dense>
        <v-divider></v-divider>
        <v-list-item v-for="item in sidebarmenus" :key="item.title">
          <router-link :to="item.link" class="list__tile" :exact="item.exact">
            <v-list-tile>
              <v-list-tile-action>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                <v-list-tile-title> {{ item.title }}</v-list-tile-title>
              </v-list-tile-content>
            </v-list-tile>
          </router-link>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar fixed class="indigo darken-4" light>
      <v-toolbar-side-icon light @click.native.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>Task Manager</v-toolbar-title>
      <v-toolbar-items>
        <v-menu left bottom origin="bottom right" transition="v-scale-transition">
          <v-btn light icon slot="activator">
            <v-icon>more_vert</v-icon>
          </v-btn>
          <v-list>
            <v-list-item>
              <v-list-tile>
                <v-list-tile-title>My Account</v-list-tile-title>
              </v-list-tile>
              <v-list-tile>
                <v-list-tile-title>Log Out</v-list-tile-title>
              </v-list-tile>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-toolbar-items>
    </v-toolbar>
    <main>
      <v-container fluid>
        <div class="title"><router-view></router-view></div>
        <!--v-router-->
      </v-container>
    </main>
  </v-app>
</template>
<script>

    export default {
        data() {
            return {
              drawer: true,
              sidebarmenus: [
                { title: 'Home', icon: 'dashboard', link: '/', exact: true },
                { title: 'Tasks', icon: 'question_answer', link: '/tasks', exact: false }
              ],
              mini: false,
              right: null,
              username: username
            }
        }
    }
</script>